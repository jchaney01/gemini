<?php

class Create_Projects_Table {    

	public function up()
    {
		Schema::create('projects', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('status'); //Uses case sensitive string for old legacy data import
			$table->integer('client_id');
			$table->date('due_date')->nullable();
			$table->blob('notes')->nullable();
			$table->blob('description')->nullable();
			$table->string('live_url')->nullable();
			$table->string('thumb_loc')->nullable();
			$table->integer('feature')->nullable();
			$table->integer('authrequired'); //Used to determine if the feature_key is required to see this project in a portfolio.
			$table->blob('personal_desc')->nullable();
			$table->string('po')->nullable();
			$table->integer('budgeted_dollars')->nullable();
			$table->integer('budgeted_hours')->nullable();
			$table->integer('tro')->default(0);
			$table->string('preview_image')->nullable();
			$table->string('full_image')->nullable();
			$table->string('repo_name')->nullable();
			$table->string('repo_URL')->nullable();
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