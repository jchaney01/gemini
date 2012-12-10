<?php
    require_once path('app') . 'libraries/Faker/src/autoload.php';

    class Seed_Clients extends \S2\Seed
    {
        public function grow()
        {
            $faker = Faker\Factory::create();
            
            for ($i = 0; $i < 70; ++$i) {
                $client = new Client;
                    $client->company_name = $faker->name;
                    $client->client_address = $faker->streetAddress;
                    $client->client_city = $faker->city;
                    $client->client_state = $faker->state;
                    $client->client_zip = $faker->postcode;
                    $client->contact_name = $faker->name;
                    $client->contact_phone = $faker->phoneNumber;
                    $client->company_phone = $faker->phoneNumber;
                    $client->hour_billable_rate = $faker->randomNumber($nbDigits = 2);
                    $client->contact_email = $faker->email;
                    $client->company_url = $faker->url;
                    $client->access_code = $faker->md5;
                    $client->notes = $faker->text($maxNbChars = 200);
                $client->save();
            }
        }

        // This is optional. It lets you specify the order each seed is grown.
        // Seeds with a lower number are grown first.
        public function order()
        {
            return 100;
        }
    }