<?php

class Create_Changeorders_Table {    

	public function up()
    {
		Schema::create('changeorders', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('recipient');
			$table->blob('desc');
			$table->integer('cant_move_forward')->default(0); //0 = Person CAN move forward
			$table->string('issue_tracking_url')->nullable();
			$table->integer('status')->default(1); //1 = pending, 2 = approved, 0 = denied
			$table->string('approved_by')->nullable();
			$table->integer('project_id');
			$table->integer('estimated_hours')->nullable();
			$table->integer('approved_dollars')->nullable(); //Storing a calculated value to capture an approval snapshot since rates can change mid-project
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('changeorders');

    }

}