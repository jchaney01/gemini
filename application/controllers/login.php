<?php

class Login_Controller extends Base_Controller
{
    public $restful = TRUE;

    public function get_index(){

        $data = array(
            "title"=>"yo"
        );
        return View::make('login',$data);
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