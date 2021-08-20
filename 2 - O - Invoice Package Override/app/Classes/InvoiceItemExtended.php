<?php

namespace App\Classes;

use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceItemExtended extends InvoiceItem {

    public $description;

    public function description(string $description)
    {
        $this->description = $description;

        return $this;
    }

}
