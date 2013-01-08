<?php

class Passwords_Controller extends Base_Controller
{
    public $restful = TRUE;

    public $messages = array(
        'required_with'      => ':attribute must be included',
        'required_unless'    => ':attribute must be included if contact name is empty',
        'integer'      => ':attribute must be a valid number',
    );


    public function __construct()
    {
//        Asset::add('clients', 'js/clients.js');
    }


    public function get_index(){

        $data = array(
           "global_projects" => static::getProjectList(),
           "clients" => Client::all(),
           "passwords"=> Password::with(array('client', 'project'))->order_by('name', 'asc')->get(),
           "title"=>"Passwords",
        );
        return View::make('passwords',$data);
    }

    public function get_show($id){
        $data = array(
            "projects"=> Project::where('status', '=', 'active')->get(),
            "client"=> Client::with("project")->find($id),
            "title"=>"Client",
        );
        return View::make('client',$data);
    }

    public function get_new()
    {
        
    }

    public function get_edit()
    {
        
    }

    public function post_create()
    {



        $v = Validator::make(Input::all(), array(
            'company_name'=> "unique:clients|required_unless:contact_name",
            'contact_email'=> "unique:clients|email",
            'hour_billable_rate'=> "numeric",
            'company_url'=> "active_url",
            'client_address'=> "required_with:client_zip",
            'client_logo_url'=> "active_url",
            'client_zip'=> "integer|required_with:client_address",
            'net'=> "integer"
        ),$this->messages);

        if (!Input::get('hour_billable_rate')){
            Input::merge(array(
                "hour_billable_rate"=>Config::get('application.client_rate', 75)
            ));
        }
        Input::merge(array(
            "by"=>Auth::user()->id
        ));

        if ($v->fails()) {
            return Redirect::to_route('clients')->with_errors($v)->with_input();
        };
        if($client = Client::create(Input::all())){
            if($client->company_name){
                $name = $client->company_name;
            } else {
                $name = $client->contact_name;
            }


            Session::flash('status_msg', $name." created successfully");
            Session::flash('type', 1);
        } else {
            Session::flash('type', 0);
            Session::flash('status_msg', 'Error creating client');
        }
        return Redirect::to_route('clients');
    }

    public function put_update($id)
    {

        $v = Validator::make(Input::all(), array(
            'company_name'=> "unique:clients,company_name,".$id."|required_unless:contact_name",
            'contact_email'=> "unique:clients,contact_email,".$id."|email",
            'hour_billable_rate'=> "numeric",
            'company_url'=> "active_url",
            'client_address'=> "required_with:client_zip",
            'client_logo_url'=> "active_url",
            'client_zip'=> "integer|required_with:client_address",
            'net'=> "integer"
        ),$this->messages);

        if (!Input::get('hour_billable_rate')){
            Input::merge(array(
                "hour_billable_rate"=>Config::get('application.client_rate', 75)
            ));
        }
        Input::merge(array(
            "by"=>Auth::user()->id
        ));

        if ($v->fails()) {

            return Redirect::to_route('client', array($id))->with_errors($v)->with_input();
        };
        $client = Client::find($id)->fill(Input::all());
        if($client->company_name){
            $name = $client->company_name;
        } else {
            $name = $client->contact_name;
        }

        if($client->save()){

            Session::flash('status_msg', $name." updated successfully");
            Session::flash('type', 1);
        } else {
            Session::flash('type', 0);
            Session::flash('status_msg', 'Error creating client');
        }
        return Redirect::to_route('client',array($id));
    }

    public function delete_destroy($id)
    {
        $client = Client::with(array('project', 'invoice'))->find($id);
        if($client->project || $client->invoice){
            Session::flash('status_msg', "Unable to delete.  Client has a project or invoice which would become orphaned.");
            Session::flash('type', 0);
            return Redirect::to_route('clients');
        } else {
            Session::flash('status_msg', "deleted successfully");
            Session::flash('type', 1);
            $client->delete();
            return Redirect::to_route('clients');
        }
    }
}