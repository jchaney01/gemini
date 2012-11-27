<?php

class Create_Users_Table {    

	public function up()
    {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('email');
			$table->string('password');
			$table->string('last_name');
			$table->integer('access_lvl'); //In leu of groups, we use a number.  100 is admin, 50 is employee/contractor.  Clients use access codes.
			$table->integer('hour_rate');
			$table->text('api_key')->nullable();
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('users');

    }

}