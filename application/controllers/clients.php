<?php

class Clients_Controller extends Base_Controller
{
    public $restful = TRUE;

    public function __construct()
    {
        //Registering a new validation rule that will make a field required unless
        //Another filed is populated
//        Validator::register('required_unless', function($attribute, $value, $parameters)
//        {
//            $filedThatMustBrePresentToPass = $parameters[0];
//            $sourceFieldValue = $value;
//            $sourceFieldName = $attribute;
//            $referencedValue = $this->attributes[$filedThatMustBrePresentToPass];
//            error_log('Jason:'.$this->attributes);
//
//        });
    }


    public function get_index(){
        $data = array(
          "projects"=> Project::where('status', '=', 'Active')->get(),
           "clients"=> Client::with("project")->order_by('company_name', 'asc')->get(),
           "title"=>"Clients",
        );
//        dd($data['clients'][0]->project);
        return View::make('clients',$data);
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

        $messages = array(
            'required_with'      => ':attribute must be included',
            'integer'      => ':attribute must be a valid number',
        );

        $v = Validator::make(Input::all(), array(
            'company_name'=> "unique:clients|required_unless:contact_name",
            'contact_email'=> "unique:clients|email",
            'hour_billable_rate'=> "numeric",
            'company_url'=> "active_url",
            'client_address'=> "required_with:client_zip",
            'client_zip'=> "integer|required_with:client_address"
        ),$messages);

        if (!Input::get('hour_billable_rate')){
            Input::merge(array(
                "hour_billable_rate"=>Config::get('application.client_rate', 75)
            ));
        }
        if ($v->fails()) {
            return Redirect::to_route('clients')->with_errors($v)->with_input();
        };
        if(Client::create(Input::all())){
            Session::flash('status_msg', 'Success');
        } else {
            Session::flash('status_msg', 'Failure');
        }
        return Redirect::to_route('clients');
    }

    public function put_update()
    {

    }

    public function delete_destroy()
    {

    }
}