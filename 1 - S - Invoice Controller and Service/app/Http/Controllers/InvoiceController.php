<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Models\Invoice;
use App\Models\Product;
use App\Services\InvoiceService;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('products')->latest()->get();

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $products = Product::all();

        return view('invoices.create', compact('products'));
    }

    public function store_old(Request $request)
    {
        $invoice_data = $request->validate([
            'invoice_date' => 'required|date',
            'customer_name' => 'required',
            'products' => 'required|array',
            'quantities' => 'required|array',
            'prices' => 'required|array',
        ]);

        $invoice_data['invoice_number'] = Invoice::max('invoice_number') + 1;

        $invoice = Invoice::create($invoice_data);

        $products = $request->products;
        $quantities = $request->quantities;
        $prices = $request->prices;
        for ($i=0; $i < count($products); $i++) {
            if (isset($products[$i]) && $products[$i] != '' && $quantities[$i] != '' && $prices[$i] != '') {
                $invoice->products()->attach($products[$i], [
                    'quantity' => $quantities[$i],
                    'price' => $prices[$i]
                ]);
            }
        }

        return redirect()->route('invoices.index')
            ->withMessage('Invoice #' . $invoice->invoice_number . ' created successfully');
    }

    public function store(StoreInvoiceRequest $request, InvoiceService $service)
    {
        $invoice = $service->storeNewInvoice(
            $request->invoice_date,
            $request->customer_name,
            $request->products,
            $request->quantities,
            $request->prices
        );

        return redirect()->route('invoices.index')
            ->withMessage('Invoice #' . $invoice->invoice_number . ' created successfully');
    }

    public function reportByMonth()
    {
        $report = Invoice::getReportByMonth();

        return view('invoices.report_month',  compact('report'));
    }

    public function reportByProduct()
    {
        $report = Invoice::getReportByProduct();

        return view('invoices.report_product',  compact('report'));
    }
}
