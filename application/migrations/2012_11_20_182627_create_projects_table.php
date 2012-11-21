<?php

class Create_Projects_Table {    

	public function up()
    {
		Schema::create('projects', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('status');
			$table->integer('client_id');
			$table->date('due_date');
			$table->blob('notes');
			$table->blob('description');
			$table->string('live_url');
			$table->string('thumb_loc');
			$table->integer('feature');
			$table->integer('authrequired');
			$table->blob('1_desc');
			$table->string('po');
			$table->integer('budget');
			$table->integer('tro');
			$table->string('preview_image');
			$table->string('full_image');
			$table->integer('group');
			$table->string('thumb_loc2');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('projects');

    }

}