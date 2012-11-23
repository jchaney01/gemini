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
			$table->integer('access_lvl');
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