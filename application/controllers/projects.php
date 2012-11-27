<?php

class Projects_Controller extends Base_Controller 
{
    public $restful = TRUE;
    public $layout = 'layouts.common';

    public function get_index(){
        $data = array(
            "changeorders"=>Changeorder::with(array('project','project.client'))->get()
        );
        dd($data);
        $this->layout->content = View::make('projects.projects',$data);
    }
}