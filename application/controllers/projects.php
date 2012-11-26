<?php

class Projects_Controller extends Base_Controller 
{
    public $restful = true;
    public $layout = 'layouts.common';

    public function get_index(){
        $data = array(
            "projects"=>Project::with('client')->where('status','=','Active')->get());
        dd($data);
        $this->layout->content = View::make('projects.projects',$data);
    }
}