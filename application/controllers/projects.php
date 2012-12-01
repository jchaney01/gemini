<?php

class Projects_Controller extends Base_Controller 
{
    public $restful = TRUE;

    public function __construct()
    {
        Asset::add('projects', 'js/projects.js');
    }


    public function get_index(){
        $data = array(
            "projects"=> Project::with(array('Changeorder', 'Timesheet','Timesheet.user'))->where('status', '=', 'Active')->get(),
            "clients"=> Client::all(),
            "users"=> User::all(),
            "title"=>"Projects",
        );
        return View::make('projects',$data);
    }

    public function get_pending()
    {
        $data = array(
            "projects"=> Project::with('Changeorder', 'Timesheet')->where('status', '=', 'Pending')->get(),
            "title"   => "Pending Projects",
        );
        return View::make('projects', $data);
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
        $projectData = array(
            "name"=> Input::get('name'),
            "client_id"=> Input::get('client_id')
        );
        $v = Validator::make($projectData, array(
            'name'=> "required",
            'client_id'=> "required",
        ));
        if ($v->fails()) {
            return Redirect::to_route('projects')->with_errors($v);
        };

        if(Project::create(array(
            'email' => 'example@gmail.com'
        ))){
            Session::flash('status_msg', 'Success');
        } else {
            Session::flash('status_msg', 'Failure');
        }
        return Redirect::to_route('projects');
    }

    public function put_update()
    {

    }

    public function delete_destroy()
    {

    }
}