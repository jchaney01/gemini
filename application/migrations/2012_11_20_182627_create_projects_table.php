<?php

class Create_Projects_Table {    

	public function up()
    {
		Schema::create('projects', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('status');
			$table->integer('client_id');
			$table->date('due_date')->nullable();
			$table->blob('notes')->nullable();
			$table->blob('description')->nullable();
			$table->string('live_url')->nullable();
			$table->string('thumb_loc')->nullable();
			$table->integer('feature')->nullable();
			$table->integer('authrequired');
			$table->blob('1_desc')->nullable();
			$table->string('po')->nullable();
			$table->integer('budget')->nullable();
			$table->integer('tro')->default(0);
			$table->string('preview_image')->nullable();
			$table->string('full_image')->nullable();
			$table->integer('group')->nullable();
			$table->string('thumb_loc2')->nullable();
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('projects');

    }

}