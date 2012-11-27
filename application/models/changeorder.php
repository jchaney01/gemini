<?php

class Changeorder extends Eloquent {
    public function client()
    {
        return $this->belongs_to('Project');
    }
}