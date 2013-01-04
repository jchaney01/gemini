<?php

class Timesheets_Controller extends Base_Controller
{
    public $restful = TRUE;

    public $messages = array(
        'required_with' => ':attribute must be included',
        'required_unless' => ':attribute must be included if contact name is empty',
        'integer' => ':attribute must be a valid number',
    );

    public function __construct()
    {
        Asset::add('timesheets', 'js/timesheets.js');
    }
    public function get_index(){
        $data = array(
            "timesheets"=> Timesheet::with(array('project'))->where('user_id', '=', Auth::user()->id)->order_by('date', 'asc')->paginate()->get(),
            "projects"=> Project::where("status",'=','Active')->get(),
            "title"=>"Time Sheets",
        );
        return View::make('timesheets',$data);
    }
    public function get_pending()
    {

    }

    public function get_new()
    {
        
    }

    public function get_edit($id)
    {



    }

    public function post_create()
    {
        $v = Validator::make(Input::all(), array(
            'project_id' => "required",
            'time_start' => "required",
            'time_stop' => "required",
            'date' => "date",
        ), $this->messages);

        Input::merge(array(
            "user_id" => Auth::user()->id,
            "time_start"=> date("H:i:s", strtotime(Input::get('time_start'))),
            "time_stop"=> date("H:i:s", strtotime(Input::get('time_stop')))
        ));

        if ($v->fails()) {
            return Redirect::to_route('timesheets')->with_errors($v)->with_input();
        }
        ;
        if ($timesheet = Timesheet::create(Input::all())) {
            Session::flash('status_msg', "Timesheet for ".date("m/d/Y",$timesheet->date)." created successfully");
        } else {
            Session::flash('status_msg', 'Error creating timesheet');
        }
        return Redirect::to(URL::to_route('timesheets'));


    }

    public function put_update($id)
    {


    }

    public function delete_destroy()
    {

    }

}