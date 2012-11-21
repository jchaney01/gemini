<?php

class Create_Invoice_Labor_Items_Table {    

	public function up()
    {
		Schema::create('invoice_labor_items', function($table) {
			$table->increments('id');
			$table->blob('desc');
			$table->float('cost');
			$table->integer('invoice_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('items');

    }

}