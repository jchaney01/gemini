<?php

class Invoice_material_item extends Eloquent {
    public function invoice()
    {
        return $this->belongs_to('Invoice');
    }
}