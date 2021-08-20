<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_number', 'invoice_date', 'customer_name'];

    protected $dates = ['invoice_date'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity', 'price']);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function($invoice) {
            // Uncomment this line if you wish to use it instead of the service
            // $invoice->invoice_number = self::max('invoice_number') + 1;
        });
    }

    public static function getReportByMonth()
    {
        return Invoice::withSum('products', \DB::raw('invoice_product.price * invoice_product.quantity'))
            ->orderBy('invoice_date', 'desc')
            ->get()
            ->groupBy(function($invoice) {
                return $invoice->invoice_date->format('Y-m');
            });
    }

    public static function getReportByProduct()
    {
        return \DB::table('invoice_product')
            ->select('products.name', \DB::raw('sum(invoice_product.price * invoice_product.quantity) as total_revenue'))
            ->join('products', 'invoice_product.product_id', '=', 'products.id')
            ->groupBy('products.name')
            ->orderBy('total_revenue', 'desc')
            ->get();
    }
}
