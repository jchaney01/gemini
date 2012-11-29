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
            "projects"=> Project::with('Changeorder', 'Timesheet')->where('status', '=', 'Active')->get(),
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
        
    }

    public function put_update()
    {

    }

    public function delete_destroy()
    {

    }
}