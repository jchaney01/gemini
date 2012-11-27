<?php

class Changeorder extends Eloquent {
    public function project()
    {
        return $this->belongs_to('Project');
    }
}