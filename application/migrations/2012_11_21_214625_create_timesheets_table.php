<?php

class Create_Timesheets_Table {    

	public function up()
    {
		Schema::create('timesheets', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->time('time_stop');
			$table->time('time_start');
			$table->integer('project_id');
			$table->blob('work_performed')->nullable();
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('timesheets');

    }

}