<?php
    require_once path('app') . 'libraries/Faker/src/autoload.php';

    class Seed_Changeorders extends \S2\Seed
    {
        public function grow()
        {
            $faker = Faker\Factory::create();

            for ($i = 0; $i < 3; ++$i) { //Leave this set to 3 so status is set correctly.
                $changeorder = new Changeorder;
                    $changeorder->user_id = 1;
                    $changeorder->recipient = $faker->email;
                    $changeorder->desc = $faker->text($maxNbChars = 200);
                    $changeorder->issue_tracking_url = $faker->url;
                    $changeorder->status = $i + 1;
                    $changeorder->project_id = 1;
                    $changeorder->estimated_hours = $faker->randomDigit;
                $changeorder->save();
            }
        }

        // This is optional. It lets you specify the order each seed is grown.
        // Seeds with a lower number are grown first.
        public function order()
        {
            return 100;
        }
    }

