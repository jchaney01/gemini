<?php

class Projects_Controller extends Base_Controller 
{
    public $restful = TRUE;

    public function __construct()
    {
        Asset::add('projects', 'js/projects.js');
    }


    public function get_index($id = null){
        $data = array(
            "projects"=> Project::with(array('changeorder', 'timesheet','timesheet.user'))->where('status', '=', 'Active')->order_by('name', 'asc')->get(),
            "clients"=> Client::all(),
            "users"=> User::all(),
            "title"=>"Projects",
        );
        if ($id){
            $data['project'] = Project::with(array('changeorder', 'timesheet','timesheet.user'))->find($id);
        } else {
            $data['project'] = $data['projects'][0];
        }

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

    public function get_new()
    {
        
    }

    public function get_edit()
    {
        
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
            'client_id'=> "required",
            'name'=> "required|unique:projects",
            'budgeted_dollars'=> "numeric",
            'budgeted_hours'=> "numeric",
            'live_url'=>"active_url",
            'full_image_url'=>"active_url",
            'large_thumb_url'=>"active_url",
            'small_thumb_url'=>"active_url",
            'estimate_pad_percentage'=>"numeric|between:0,100",
            'client_rate_override'=>"numeric"
        ),$messages);

        if(Input::get('estimate_pad_percentage') == ""){
            Input::merge(array(
                "estimate_pad_percentage"=>10
            ));
        }

        if(Input::get('client_rate_override') == 0){
            Input::merge(array(
                "client_rate_override"=>null
            ));
        }

        Input::merge(array(
            "by"=>Auth::user()->id
        ));

        if ($v->fails()) {
            return Redirect::to_route('projects')->with_errors($v)->with_input();
        };
        if($project = Project::create(Input::all())){
            Session::flash('status_msg', $project->name." created successfully");
        } else {
            Session::flash('status_msg', 'Error creating project');
        }
        return Redirect::to(URL::to_route('project')."/".$project->id);
    }

    public function put_update()
    {

    }

    public function delete_destroy()
    {

    }

}