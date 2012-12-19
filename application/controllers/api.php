<?php

class Api_Controller extends Base_Controller
{
    public $restful = TRUE;

    public function __construct()
    {

    }


    public function get_index(){

    }

    public function get_projects()
    {
        return Response::json(Project::with('Changeorder', 'Timesheet',"Client")->where('status', '=', 'Active')->get());
    }
    public function get_timesheets()
    {
        return Response::json(Timesheet::with('Project', 'User')->get());
    }
}