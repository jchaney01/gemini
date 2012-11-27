<?php

class Invoice extends Eloquent {
    public function client()
    {
        return $this->belongs_to('Client');
    }
    public function laborItem()
    {
        return $this->has_many('Invoice_labor_item');
    }
    public function materialItem()
    {
        return $this->has_many('Invoice_material_item');
    }
}