# [Laravel](http://laravel.com) - A PHP Framework For Web Artisans
# Added Grunt workflow from https://github.com/johnnygreen/laravel-grunt

Laravel is a clean and classy framework for PHP web development. Freeing you
from spaghetti code, Laravel helps you create wonderful applications using
simple, expressive syntax. Development should be a creative experience that you
enjoy, not something that is painful. Enjoy the fresh air.

[Official Website & Documentation](http://laravel.com)

## Feature Overview

- Simple routing using Closures or controllers.
- Views and templating.
- Driver based session and cache handling.
- Database abstraction with query builder.
- Authentication.
- Migrations.
- PHPUnit Integration.
- A lot more.

## A Few Examples

### Hello World:

```php
<?php

Route::get('/', function()
{
	return "Hello World!";
});
```

### Passing Data To Views:

```php
<?php

Route::get('user/(:num)', function($id)
{
	$user = DB::table('users')->find($id);

	return View::make('profile')->with('user', $user);
});
```

### Redirecting & Flashing Data To The Session:

```php
<?php

return Redirect::to('profile')->with('message', 'Welcome Back!');
```

## Contributing to Laravel

Contributions are encouraged and welcome; however, please review the Developer
Certificate of Origin in the "license.txt" file included in the repository. All
commits must be signed off using the `-s` switch.

```bash
git commit -s -m "this commit will be signed off automatically!"
```

## License

Laravel is open-sourced software licensed under the MIT License.


Create migration
Run migration
---------------------
Create User model
---------------------
Hash::make("foo") returns the hashed version (don't really use this)
---------------------
Grab the values with Input::get("name of field")
---------------------
Auth::attempt(array); //Array must contain at least username and NON-hashed password and returns bool but can have other criteria like if active.  Also sets session.

Auth::check() Bool for isLoggedIn (returns true if logged in)
Auth::guest() Bool for is NOT Logged In (returns true if NOT logged in)


Auth::logout() to kill the session
Use Auth::guest() to return a bool if the user is NOT logged in

Use route groups to run a before filter on multiple routes (not in training) and use the guest check

$user = Auth::user();
$user->name;


Questions?
How to add custom data to session
Guessing Session::set("key", "value");



$post = Post::create(array(
    'title'  => 'Laravel is awesome!',
    'author' => 'Jason',
    'body'   => 'Laravel is awesome, you should use it if you aren\'t already!'
));

The Post::create() method does exactly the same as instantiating a new object, assigning the values, and calling the save method. The created object is returned, or false on failure.

=ATTACK=
Edit Client
Delete client
Edit projects
Delete projects
Change Orders
Time Sheets
Invoices
Budget Graph
Create Users
Edit Users
Delete users
Dashboard

V3
Social login