<?php

class Password extends Eloquent {
    public function client()
    {
        return $this->belongs_to('Client');
    }
    public function project()
    {
        return $this->belongs_to('Project');
    }
}