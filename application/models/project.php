<?php

class Project extends Eloquent {
    public function client()
    {
        return $this->belongs_to('Client');
    }

    public function changeorder()
    {
        return $this->has_many('Changeorder');
    }

    public function timesheet()
    {
        return $this->has_many('Timesheet');
    }
}