<?php

class Create_Passwords_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('passwords', function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('status');
            $table->integer('client_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->string('access_url')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->blob('notes')->nullable();
            $table->date('expires')->nullable();
            $table->timestamps();
	    });
    }

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}