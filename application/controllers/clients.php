<?php

class Clients_Controller extends Base_Controller
{
    public $restful = TRUE;

    public function __construct()
    {
        //Asset::add('projects', 'js/projects.js');
    }


    public function get_index(){
        $data = array(
          "projects"=> Project::where('status', '=', 'Active')->get(),
           "clients"=> Client::with("project")->order_by('company_name', 'asc')->get(),
           "title"=>"Clients",
        );
//        dd($data['clients'][0]->project);
        return View::make('clients',$data);
    }

    public function get_show(){

    }

    public function get_new()
    {
        
    }

    public function get_edit()
    {
        
    }

    public function post_create()
    {
        $messages = array(
            'same'    => 'The :attribute and :other must match.',
            'size'    => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute must be between :min - :max.',
            'required_with'      => ':attribute must be included as well.',
        );

        $v = Validator::make(Input::all(), array(
            'company_name'=> "unique:clients",
            'contact_email'=> "unique:clients|email",
            'hour_billable_rate'=> "numeric|required",
            'company_url'=> "active_url",
            'client_address'=> "required_with:client_zip",
            'client_zip'=> "integer|required_with:client_address"
        ),$messages);
        if ($v->fails()) {
            return Redirect::to_route('clients')->with_errors($v);
        };
        if(Client::create(Input::all())){
            Session::flash('status_msg', 'Success');
        } else {
            Session::flash('status_msg', 'Failure');
        }
        return Redirect::to_route('clients');
    }

    public function put_update()
    {

    }

    public function delete_destroy()
    {

    }
}