<?php

class Create_Invoices_Table {    

	public function up()
    {
		Schema::create('invoices', function($table) {
			$table->increments('id');
			$table->blob('description')->nullable();
			$table->float('offset')->nullable();
			$table->string('invoice_status');
			$table->integer('check_num')->nullable();
			$table->date('date_issued');
			$table->date('date_range_start')->nullable();
			$table->date('date_range_stop')->nullable();
			$table->blob('notes')->nullable();
			$table->integer('client_id');
			$table->date('date_paid')->nullable();
			$table->string('po')->nullable();
			$table->string('paid_with')->nullable();
			$table->string('proj_tracking_url')->nullable();
			$table->string('co_url')->nullable();
			$table->integer('net')->nullable();
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('invoices');

    }

}