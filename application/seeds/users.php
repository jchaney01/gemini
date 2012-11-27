<?php
    require_once path('app') . 'libraries/Faker/src/autoload.php';

    class Seed_Users extends \S2\Seed
    {
        public function grow()
        {
                $faker = Faker\Factory::create();
                $user = new User;
                    $user->first_name = "Admin";
                    $user->last_name = "Smith";
                    $user->email = "admin";
                    $user->password = Hash::make("goldeneye01");
                    $user->access_lvl = 100;
                    $user->hour_rate = 10; //Easy math
                    $user->api_key = $faker->md5;
                $user->save();

                $user = new User;
                    $user->first_name = "Contractor";
                    $user->last_name = "Dude";
                    $user->email = "dude@creativeacceleration.com";
                    $user->password = Hash::make("goldeneye01");
                    $user->access_lvl = 50;
                    $user->hour_rate = 10; //Easy math
                    $user->api_key = $faker->md5;
                $user->save();

                echo "Admin user email is admin with password goldeneye01.  Contractor email is dude with password goldeneye01";
        }

        // This is optional. It lets you specify the order each seed is grown.
        // Seeds with a lower number are grown first.
        public function order()
        {
            return 100;
        }
    }

