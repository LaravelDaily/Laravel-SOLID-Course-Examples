<?php

namespace App\Services;

use App\Models\Invoice;

class InvoiceService {

    public function storeNewInvoice(
        string $invoice_date,
        string $customer_name,
        array $products,
        array $quantities,
        array $prices): Invoice
    {
        $invoice = Invoice::create([
            'invoice_number' => $this->getNextInvoiceNumber(),
            'invoice_date' => $invoice_date,
            'customer_name' => $customer_name,
        ]);

        for ($i=0; $i < count($products); $i++) {
            if (isset($products[$i]) && $products[$i] != '' && $quantities[$i] != '' && $prices[$i] != '') {
                $invoice->products()->attach($products[$i], [
                    'quantity' => $quantities[$i],
                    'price' => $prices[$i]
                ]);
            }
        }

        return $invoice;
    }

    private function getNextInvoiceNumber()
    {
        // Or you can move this logic to the Model's boot() method
        return Invoice::max('invoice_number') + 1;
    }

}
