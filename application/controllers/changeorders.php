<?php

class Changeorders_Controller extends Base_Controller
{
    public $restful = TRUE;

    public function __construct()
    {
//        Asset::add('projects', 'js/projects.js');
    }

    public function post_create()
    {
        $messages = array(
            'desc_required'      => 'Missing description'
        );

        $v = Validator::make(Input::all(), array(
            'project_id'=> "required",
            'recipient'=> "required|email",
            'desc'=> "required",
            'estimated_hours'=> "numeric|required"
        ),$messages);

        if ($v->fails()) {
            return Redirect::to(URL::to_route('projects').'#changeorders')->with_errors($v)->with_input();//Hash navigation for the slider
        };

        $project = Project::with(array('client'))->find(Input::get('project_id'));
        if($project->client_rate_override){
            $clientRate = $project->client_rate_override;
        } else {
            $clientRate = $project->client->hour_billable_rate;
        }
        $padPercentage = $project->estimate_pad_percentage;
        $totalHours = round(Input::get('estimated_hours')+(Input::get('estimated_hours')*($padPercentage/100)));
        $totalDollars = $clientRate*$totalHours;

        Input::merge(array(
            "estimated_hours"=>$totalHours,
            "user_id"=>Auth::user()->id,
            "approved_dollars"=>$totalDollars
        ));

        if($changeorder = Changeorder::create(Input::all())){
            Session::flash('status_msg',"created successfully");

            // Get the Swift Mailer instance
            $mailer = IoC::resolve('mailer');

            $HTMLbody = "<p>The following change order authorization request has been created for ".$project->name.".</p>";
            $plainBody = "The following change order authorization request has been created for ".$project->name.".\r\n\r\n";
            if(Input::get('issue_tracking_url')){
                $HTMLbody .= "<p>Reference: <a href=\"".Input::get('issue_tracking_url')."\">".Input::get('issue_tracking_url')."</a></p>";
                $plainBody .= "Reference: ".Input::get('issue_tracking_url')."\r\n\r\n";
            }
            $HTMLbody .= "<p>".Input::get('desc')."</p>";
            $plainBody .= Input::get('desc')."\r\n\r\n";
            $HTMLbody .= "<p>This request is expected to take approximately ".$totalHours." hours with a cost of $".number_format($totalDollars)."
                           . You may reply to this email for clarification.</p>";
            $plainBody .= "This request is expected to take approximately ".$totalHours." hours with a cost of $".number_format($totalDollars)."
                           . You may reply to this email for clarification.\r\n\r\n";
            $HTMLbody .= "<p><a href=\"".URL::to_route('co_response')."/approve/".$changeorder->id."/?recipient=".$changeorder->recipient."\">Approve this change</a><br/><a href=\"".URL::to_route('co_response')."/deny/".$changeorder->id."/?recipient=".$changeorder->recipient."\">Reject this change</a></p>";
            $plainBody .= "Approve this change : ".URL::to_route('co_response')."/approve/".$changeorder->id."/?recipient=".$changeorder->recipient."\r\nReject this change: ".URL::to_route('co_response')."/deny/".$changeorder->id."/?recipient=".$changeorder->recipient;
            if(Input::get('cant_move_forward')){
                $HTMLbody .= "*Project is unable to move forward without authorization of this request.";
                $plainBody .= "*Project is unable to move forward without authorization of this request.";
            }

            // Construct the message
            $message = Swift_Message::newInstance('Message From Website')
                ->setFrom(array(Auth::User()->email=>ucfirst(Auth::User()->first_name)." ".ucfirst(Auth::User()->last_name)))
                ->setTo(array('jason@creativeacceleration.com'=>'jason@creativeacceleration.com'))
                ->setCc(array('jason@creativeacceleration.com'=>'Jason Chaney'))
                ->setSubject('Change Order Authorization Request for '.$project->name)
                ->addPart($plainBody,'text/plain')
                ->setBody($HTMLbody,'text/html');
            
            // Create the Transport
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587,'tls')->setUsername('jason@creativeacceleration.com')->setPassword("Goldeneye05593135!");

            // Create the Mailer using your created Transport
            $mailer = Swift_Mailer::newInstance($transport);

            $result = $mailer->send($message);

            if (!$result){
                Log::write('error', 'Email failed to send');
                return Response::error('501');
            } else {
                //All went well.  Wrap it up.
                Session::flash('status_msg', 'Change order sent and created.');
                return Redirect::to(URL::to_route('projects').'#changeorders');
            }

        } else {
            Session::flash('status_msg', 'Error creating change order');
            return Redirect::to(URL::to_route('projects').'#changeorders')->with_errors($v)->with_input();//Hash navigation for the slider
        }
    }

    public function put_update()
    {

    }

    public function get_process_client_response($action,$id){
        $co = Changeorder::find($id);
        if ($co){
            $recipient = Input::get('recipient');
            if ($recipient == $co->recipient){ //Minor security check since we are not logging in users.

                switch ($action){
                    case "approve":
                        $co->status = 2;
                        $status = "approved";
                        break;
                    case "deny":
                        $co->status = 0;
                        $status = "denied";
                        break;
                    case "pending":
                        $co->status = 1;
                        $status = "held";
                        break;
                }
                if ($co->save()){
                    $data = array(
                        "title"=>"Change Order Management",
                        "co"=>$co,
                        "status"=>$status
                    );
                    return View::make('confirm_co',$data);  //Sending them here as opposed to their dashboard
                                                            //since there's no prior point to be certain they are authorized.
                                                            //Email forwarding and guessing are possible vulnerabilities so we don't take
                                                            //the chance.
                } else {
                    return Response::error('501');
                }
            } else {
                return Response::error('403');
            }
        }
        return Response::error('404');
    }

    public function delete_destroy()
    {

    }

    public function get_resend($id)
    {


        if($co = Changeorder::with("project")->find($id)){
            // Get the Swift Mailer instance
            $mailer = IoC::resolve('mailer');

            $HTMLbody = "<p>The following change order authorization request has been created for ".$co->project->name.".</p>";
            $plainBody = "The following change order authorization request has been created for ".$co->project->name.".\r\n\r\n";
            if($co->issue_tracking_url){
                $HTMLbody .= "<p>Reference: <a href=\"".$co->issue_tracking_url."\">".$co->issue_tracking_url."</a></p>";
                $plainBody .= "Reference: ".$co->issue_tracking_url."\r\n\r\n";
            }
            $HTMLbody .= "<p>".$co->desc."</p>";
            $plainBody .= $co->desc."\r\n\r\n";
            $HTMLbody .= "<p>This request is expected to take approximately ".$co->estimated_hours." hours with a cost of $".number_format($co->approved_dollars)."
                           . You may reply to this email for clarification.</p>";
            $plainBody .= "This request is expected to take approximately ".$co->estimated_hours." hours with a cost of $".number_format($co->approved_dollars)."
                           . You may reply to this email for clarification.\r\n\r\n";
            $HTMLbody .= "<p><a href=\"".URL::to_route('co_response')."/approve/".$co->id."/?recipient=".$co->recipient."\">Approve this change</a><br/><a href=\"".URL::to_route('co_response')."/deny/".$co->id."/?recipient=".$co->recipient."\">Reject this change</a></p>";
            $plainBody .= "Approve this change : ".URL::to_route('co_response')."/approve/".$co->id."/?recipient=".$co->recipient."\r\nReject this change: ".URL::to_route('co_response')."/deny/".$co->id."/?recipient=".$co->recipient;
            if(Input::get('cant_move_forward')){
                $HTMLbody .= "*Project is unable to move forward without authorization of this request.";
                $plainBody .= "*Project is unable to move forward without authorization of this request.";
            }

            // Construct the message
            $message = Swift_Message::newInstance('Message From Website')
                ->setFrom(array(Auth::User()->email=>ucfirst(Auth::User()->first_name)." ".ucfirst(Auth::User()->last_name)))
                ->setTo(array('jason@creativeacceleration.com'=>'jason@creativeacceleration.com'))
                ->setCc(array('jason@creativeacceleration.com'=>'Jason Chaney'))
                ->setSubject('Change Order Authorization Request for '.$co->project->name." RESEND")
                ->addPart($plainBody,'text/plain')
                ->setBody($HTMLbody,'text/html');

            // Create the Transport
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 587,'tls')->setUsername('jason@creativeacceleration.com')->setPassword("Goldeneye05593135!");

            // Create the Mailer using your created Transport
            $mailer = Swift_Mailer::newInstance($transport);

            $result = $mailer->send($message);

            if ($result){

                //All went well.  Wrap it up.
                Session::flash('status_msg', 'Change order resent.');
                return Redirect::to(URL::to_route('projects').'#changeorders');
            } else {

                Log::write('error', 'Email failed to send');
                return Response::error('501');
            }

        } else {
            Session::flash('status_msg', 'Error locating change order');
            return Redirect::to(URL::to_route('projects').'#changeorders');
        }
    }
}