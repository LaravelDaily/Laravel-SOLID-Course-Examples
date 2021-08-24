<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('reports/invoices/month/{format?}',
    [\App\Http\Controllers\Reports\InvoiceReportController::class, 'reportByMonth'])
    ->name('reports.invoices.month');
Route::get('reports/invoices/product/{format?}',
    [\App\Http\Controllers\Reports\InvoiceReportController::class, 'reportByProduct'])
    ->name('reports.invoices.product');

