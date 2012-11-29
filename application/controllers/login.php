<?php

class Login_Controller extends Base_Controller
{
    public $restful = TRUE;

    public function get_index(){

        if (Auth::check()){
            //return Redirect::to_route('projects');
        }
        $data = array(
            "title"=>"Gemini Login",
        );
        return View::make('login',$data);
    }

    public function post_login(){
        $credientials = array(
            "username"=>Input::get('email'),
            "password"=>Input::get('password')
        );
        $v = Validator::make($credientials,array(
            'username'=>"required|email",
            'password'=>"required",
        ));
        if($v->fails()){
            return Redirect::to_route('login')->with_errors($v);
        };
        if (Auth::attempt($credientials)){
            return Redirect::to_route('projects');
        } else {
            return Redirect::to_route('login')->with_errors($v);
        };
    }

    public function get_logout(){
        Auth::logout();
        return Redirect::to_route('login');
    }
}