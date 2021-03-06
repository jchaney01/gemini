<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
    return Redirect::to('projects');
});


Route::get('login', array('as' => 'login', 'uses' => 'login@index')); //LIST
Route::post('login', 'login@login'); //LIST
Route::get('logout', array('as' => 'logout', 'uses' => 'login@logout')); //LIST



//named routes are not full REST (meaning "projects/X/timesheets/Y") since we are omitting many individual record-views.
//This is done for simplicity.

//Projects
Route::group(array('before' => 'auth:50'), function()
{
    Route::get('projects', array('as' => 'projects', 'uses' => 'projects@index')); //LIST
    Route::get('projects/(:any)', array('as' => 'project', 'uses' => 'projects@index')); //READ - Also shows change orders and timesheets
    Route::get('projects/new', array('as' => 'new_project', 'uses' => 'projects@new')); // FORM TO CREATE
    Route::get('projects/(:any)edit', array('as' => 'edit_project', 'uses' => 'projects@edit')); //FORM TO EDIT
    Route::post('projects', 'projects@create'); //CREATE
    Route::put('projects/(:any)', 'projects@update'); //UPDATE
    Route::delete('projects/(:any)', 'projects@destroy'); //DELETE
});
//Change Orders
Route::group(array('before' => 'auth:50'), function()
{
    Route::get('co/(:any)', array('as' => 'co', 'uses' => 'changeorders@show')); // READ
    Route::get('co/new', array('as' => 'new_co', 'uses' => 'changeorders@new')); // FORM TO CREATE
    Route::get('co/confirm', array('as' => 'confirm_co', 'uses' => 'changeorders@confirm')); // Confirms submission
    Route::get('co/resend/(:any)', array('as' => 'resend_co', 'uses' => 'changeorders@resend'));
    Route::get('co/(:any)edit', array('as' => 'edit_co', 'uses' => 'changeorders@edit')); //FORM TO EDIT
    Route::post('co', array("as"=>"create_co","uses"=>'changeorders@create'));
    Route::put('co/(:any)', 'co@update'); //UPDATE
    Route::delete('co/(:any)', 'co@destroy'); //DELETE
});

//API
Route::group(array('before' => 'auth:50'), function()
{
    Route::get('api/projects', array('as' => 'api_projects', 'uses' => 'api@projects'));
    Route::get('api/timesheets', array('as' => 'api_projects', 'uses' => 'api@timesheets'));

});

//The below is not used to "read" a record.  It is the URL a client visits to approve or deny the change order.
Route::get('co/(:any)/(:any)', array('as' => 'co_response', 'uses' => 'changeorders@process_client_response')); // use /co/approve/coID

//Clients
Route::group(array('before' => 'auth:50'), function()
{
    Route::get('clients/(:any)', array('as' => 'client', 'uses' => 'clients@show')); // READ
    Route::get('clients', array('as' => 'clients', 'uses' => 'clients@index')); //LIST
    Route::get('clients/new', array('as' => 'new_client', 'uses' => 'clients@new')); // FORM TO CREATE
    Route::get('clients/(:any)edit', array('as' => 'edit_client', 'uses' => 'clients@edit')); //FORM TO EDIT
    Route::post('clients', 'clients@create'); //CREATE
    Route::put('clients/(:any)', 'clients@update'); //UPDATE
    Route::delete('clients/(:any)', 'clients@destroy'); //DELETE
});
//Users
Route::group(array('before' => 'auth:100'), function()
{
    Route::get('users', array('as' => 'users', 'uses' => 'users@index')); //LIST
    Route::get('users/new', array('as' => 'new_user', 'uses' => 'users@new')); // FORM TO CREATE
    Route::get('users/(:any)edit', array('as' => 'edit_user', 'uses' => 'users@edit')); //FORM TO EDIT
    Route::post('users', 'users@create'); //CREATE
    Route::put('users/(:any)', 'users@update'); //UPDATE
    Route::delete('users/(:any)', 'users@destroy'); //DELETE
});
Route::group(array('before' => 'auth:50'), function () {
    Route::get('users/pref/project_state/(:any)', array('as' => 'userPrefProjState', 'uses' => 'users@prefProjectState')); // sets session pref for project state.  Pass GET var with "redirect" and value of named route.
});
//Timesheets
Route::group(array('before' => 'auth:50'), function()
{
    Route::get('timesheets', array('as' => 'timesheets', 'uses' => 'timesheets@index')); //LIST
    Route::get('timesheets/(:any)edit', array('as' => 'edit_timesheet', 'uses' => 'timesheets@edit')); //FORM TO EDIT
    Route::post('timesheets', 'timesheets@create'); //CREATE
    Route::put('timesheets/(:any)', 'timesheets@update'); //UPDATE
    Route::delete('timesheets/(:any)', 'timesheets@destroy'); //DELETE
});
//Invoices
Route::group(array('before' => 'auth:100'), function()
{
    Route::get('invoices', array('as' => 'invoices', 'uses' => 'invoices@index')); //LIST
    Route::get('invoices/(:any)edit', array('as' => 'edit_invoice', 'uses' => 'invoices@edit')); //FORM TO EDIT
    Route::post('invoices', 'invoices@create'); //CREATE
    Route::put('invoices/(:any)', 'invoices@update'); //UPDATE
    Route::delete('invoices/(:any)', 'invoices@destroy'); //DELETE
});
//Labor Items
Route::group(array('before' => 'auth:100'), function()
{
    Route::get('laboritems/(:any)edit', array('as' => 'edit_laboritem', 'uses' => 'laboritems@edit')); //FORM TO EDIT
    Route::post('laboritems', 'laboritems@create'); //CREATE
    Route::put('laboritems/(:any)', 'laboritems@update'); //UPDATE
    Route::delete('laboritems/(:any)', 'laboritems@destroy'); //DELETE//Labor Items
});
//Material Items
Route::group(array('before' => 'auth:100'), function()
{
    Route::get('materialitems/(:any)edit', array('as' => 'edit_materialitem', 'uses' => 'materialitems@edit')); //FORM TO EDIT
    Route::post('materialitems', 'materialitems@create'); //CREATE
    Route::put('materialitems/(:any)', 'materialitems@update'); //UPDATE
    Route::delete('materialitems/(:any)', 'materialitems@destroy'); //DELETE
});
//Passwords
Route::group(array('before' => 'auth:50'), function()
{
    Route::get('passwords', array('as' => 'passwords', 'uses' => 'passwords@index')); // LIST
    Route::get('passwords/(:any)', array('as' => 'password', 'uses' => 'passwords@show')); // READ
    Route::get('passwords/(:any)edit', array('as' => 'edit_password', 'uses' => 'passwords@edit')); //FORM TO EDIT
    Route::post('passwords', 'passwords@create'); //CREATE
    Route::put('passwords/(:any)', 'passwords@update'); //UPDATE
    Route::delete('passwords/(:any)', 'passwords@destroy'); //DELETE
});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

Event::listen('laravel.query',function($sql){
    //var_dump($sql);
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

//Used on everything but dashboard
Route::filter('auth', function($lvl)
{
    if (Input::get('email') && Input::get('password')) {

        $credientials = array(
            "username" => Input::get('email'),
            "password" => Input::get('password')
        );
        if (Auth::attempt($credientials)) {

        } else {
            return Redirect::to('login');
        }
        ;
    } else {
        if (Auth::guest()) {
            return Redirect::to('login');
        }

        if (Auth::user()->access_lvl < $lvl) {
            return Redirect::to('login');
        }
    }
});