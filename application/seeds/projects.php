<?php

class Seed_Projects extends \S2\Seed {

    public function grow()
    {
        $project = new Project;
        $project->name = 'Project Name One';
        $project->status = 'Active';
        $project->client_id = 83;
        $project->save();

    }

    // This is optional. It lets you specify the order each seed is grown.
    // Seeds with a lower number are grown first.
    public function order()
    {
        return 100;
    }

}