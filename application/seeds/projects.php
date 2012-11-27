<?php
    require_once path('app') . 'libraries/Faker/src/autoload.php';

    class Seed_Projects extends \S2\Seed
    {
        public function grow()
        {
            $faker = Faker\Factory::create();

            for ($i = 0; $i < 20; ++$i) {
                $project = new Project;
                    $project->name = $faker->name;
                    $project->status = "Active";
                    $project->client_id = $i+1;
                    $project->due_date = $faker->date($format = 'Y-m-d');
                    $project->notes = $faker->sentence($nbWords = 6);
                    $project->description = $faker->sentence($nbWords = 10);
                    $project->live_url = $faker->url;
                    $project->thumb_loc = $faker->url;
                    $project->feature = 0;
                    $project->authrequired = 0;
                    $project->personal_desc = $faker->sentence($nbWords = 10);
                    $project->po = $faker->word;
                    $project->budgeted_dollars = $faker->randomNumber($nbDigits = NULL);
                    $project->budgeted_hours = $faker->randomNumber($nbDigits = NULL);
                    $project->tro = 0;
                    $project->preview_image = $faker->url;
                    $project->full_image = $faker->url;
                    $project->group = $faker->randomDigit;
                    $project->thumb_loc2 = $faker->url;
                    $project->repo_name = $faker->url;
                    $project->repo_url = $faker->name;
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

