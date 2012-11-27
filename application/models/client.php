<?php

class Client extends Eloquent {
    public function project(){
        return $this->has_many('Project');
    }
    public function invoice(){
        return $this->has_many('Invoice');
    }
}