<?php

class Base_Controller extends Controller {

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

    public function getProjectList(){
        if(Session::get('project_state')){
            return Project::with(array('changeorder', 'timesheet', 'timesheet.user'))->where('status', '=', Session::get('project_state'))->order_by('name', 'asc');
        } else {
            return Project::with(array('changeorder', 'timesheet', 'timesheet.user'))->where('status', '=', "active")->order_by('name', 'asc');
        }
    }

}