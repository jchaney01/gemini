<?php
    require_once path('app') . 'libraries/Faker/src/autoload.php';

    class Seed_Projects extends \S2\Seed
    {

        public function grow()
        {
            $faker = Faker\Factory::create();

            for ($i = 0; $i < 10; ++$i) {
                $project = new Project;
                $project->name = $faker->name;
                $project->status = "Active";
                $project->save();
            }
        }

        // This is optional. It lets you specify the order each seed is grown.
        // Seeds with a lower number are grown first.
        public function order()
        {
            return 100;
        }
    }

