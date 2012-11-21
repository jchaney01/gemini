<?php

class Create_Changeorders_Table {    

	public function up()
    {
		Schema::create('changeorders', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->email('recipient');
			$table->blob('desc');
			$table->string('issue_tracking_id')->nullable();
			$table->string('status');
			$table->email('approved_by')->nullable();
			$table->timestamp('when_approved')->nullable();
			$table->integer('project_id');
			$table->integer('estimated_hours')->nullable();
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('changeorders');

    }

}