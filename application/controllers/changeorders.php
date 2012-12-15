<?php

class Changeorders_Controller extends Base_Controller
{
    public $restful = TRUE;

    public function __construct()
    {
//        Asset::add('projects', 'js/projects.js');
    }

    public function post_create()
    {
        $messages = array(
            'required_with'      => ':attribute must be included',
            'required_unless'    => ':attribute must be included if contact name is empty',
            'integer'      => ':attribute must be a valid number',
            'client_id_required'      => 'You need to select a client',
        );

        $v = Validator::make(Input::all(), array(
            'project_id'=> "required",
            'recipient'=> "required",
            'desc'=> "required",
            'estimated_hours'=> "numeric",
            'issue_tracking_url'=>"unique"
        ),$messages);

        Input::merge(array(
            "user_id"=>Auth::user()->id
        ));

        if ($v->fails()) {
            return Redirect::to_route('projects')->with_errors($v)->with_input();
        };
        if($changeorder = Changeorder::create(Input::all())){
            Session::flash('status_msg',"created successfully");
        } else {
            Session::flash('status_msg', 'Error creating change order');
        }
        return Redirect::to(URL::to_route('projects').'#changeorders'); //Hash navigation for the slider
    }

    public function put_update()
    {

    }

    public function delete_destroy()
    {

    }
}