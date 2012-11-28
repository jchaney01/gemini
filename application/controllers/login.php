<?php

class Login_Controller extends Base_Controller
{
    public $restful = TRUE;
    public $layout = 'layouts.single_col_no_slide';

    public function get_index(){
        $data = array(
            "title"=>"Gemini Login"
        );
        $this->layout->content = View::make('projects.projects',$data);
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