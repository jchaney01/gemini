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
            'required_with'      => ':attribute must be included',
            'required_unless'    => ':attribute must be included if contact name is empty',
            'integer'      => ':attribute must be a valid number',
            'client_id_required'      => 'You need to select a client',
        );

        $v = Validator::make(Input::all(), array(
            'project_id'=> "required",
            'recipient'=> "required",
            'desc'=> "required",
            'estimated_hours'=> "numeric|required"
        ),$messages);

        Input::merge(array(
            "user_id"=>Auth::user()->id
        ));

        if ($v->fails()) {
            return Redirect::to(URL::to_route('projects').'#changeorders')->with_errors($v)->with_input();//Hash navigation for the slider
        };
        if($changeorder = Changeorder::create(Input::all())){
            Session::flash('status_msg',"created successfully");

            $project = Project::with(array('client'))->find(Input::get('project_id'));
            if($project->client_rate_override){
                $clientRate = $project->client_rate_override;
            } else {
                $clientRate = $project->client->hour_billable_rate;
            }
            $padPercentage = $project->estimate_pad_percentage;
            $totalHours = round(Input::get('estimated_hours')+(Input::get('estimated_hours')*($padPercentage/100)));
            $totalDollars = $clientRate*$totalHours;

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
            $HTMLbody .= "<p><a href=\"#\">Approve this change</a><br/><a href=\"#\">Reject this change</a></p>";
            $plainBody .= "Approve this change : http://example.com\r\nReject this change: http://example.com";
            if(Input::get('cant_move_forward')){
                $HTMLbody .= "*Project is unable to move forward without authorization of this request.";
                $plainBody .= "*Project is unable to move forward without authorization of this request.";
            }

            // Construct the message
            $message = Swift_Message::newInstance('Message From Website')
                ->setFrom(array(Auth::User()->email=>ucfirst(Auth::User()->first_name)." ".ucfirst(Auth::User()->last_name)))
                ->setTo(array('jason@creativeacceleration.com'=>'jason@creativeacceleration.com'))
                ->setBcc(array('jason@creativeacceleration.com'=>'Jason Chaney'))
                ->setSubject('Change Order Authorization Request for '.$project->name)
                ->addPart($plainBody,'text/plain')
                ->setBody($HTMLbody,'text/html');

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

    public function delete_destroy()
    {

    }
}