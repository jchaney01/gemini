<?php

    class Create_Clients_Table
    {

        public function up()
        {
            Schema::create('clients', function($table)
            {
                $table->increments('id');
                $table->text('company_name')->nullable();
                $table->text('client_address')->nullable();
                $table->text('client_city')->nullable();
                $table->text('client_state')->nullable();
                $table->text('client_zip')->nullable();
                $table->string('contact_name')->nullable();
                $table->integer('contact_phone')->nullable();
                $table->integer('company_phone')->nullable();
                $table->string('contact_email')->nullable();
                $table->string('company_url')->nullable();
                $table->string('access_code')->nullable();
                $table->blob('notes')->nullable();
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::drop('TABLE');

        }

    }