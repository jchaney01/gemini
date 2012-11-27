<?php

class Create_Changeorders_Table {    

	public function up()
    {
		Schema::create('changeorders', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('recipient');
			$table->blob('desc');
			$table->string('issue_tracking_url')->nullable();
			$table->integer('status')->default(1); //1 = pending, 2 = approved, 0 = denied
			$table->string('approved_by')->nullable();
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