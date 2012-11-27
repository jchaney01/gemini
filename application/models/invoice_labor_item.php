<?php

class Invoice_labor_item extends Eloquent {
    public function invoice()
    {
        return $this->belongs_to('Invoice');
    }
}