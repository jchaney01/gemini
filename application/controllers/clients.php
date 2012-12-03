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

    }

    public function put_update()
    {

    }

    public function delete_destroy()
    {

    }
}