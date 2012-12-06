<?php

    class Create_Clients_Table
    {

        public function up()
        {
            Schema::create('clients', function($table)
            {
                $table->increments('id');
                $table->text('company_name')->nullable();
                $table->string('contact_name')->nullable();
                $table->string('contact_email')->nullable();
                $table->string('contact_phone')->nullable();
                $table->integer('hour_billable_rate');
                $table->string('company_url')->nullable();
                $table->string('company_phone')->nullable();
                $table->text('client_address')->nullable();
                $table->text('client_city')->nullable();
                $table->text('client_state')->nullable();
                $table->text('client_zip')->nullable();
                $table->text('by')->nullable();
                $table->integer('net')->default(30);
                $table->string('access_code');
                $table->blob('notes')->nullable();
                $table->string('client_logo_url')->nullable();
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::drop('clients');

        }

    }