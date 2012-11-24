<?php

class Create_Invoice_Materials_Items_Table {

	public function up()
    {
		Schema::create('invoice_material_items', function($table) {
			$table->increments('id');
			$table->blob('item');
			$table->float('price');
			$table->integer('qty');
			$table->integer('invoice_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('BLAH');

    }

}