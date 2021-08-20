@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Invoices by Month') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Number of Invoices</th>
                            <th>Total Revenue</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($report as $month => $invoices)
                            <tr>
                                <td>{{ $month }}</td>
                                <td>{{ $invoices->count() }}</td>
                                <td>${{ number_format($invoices->sum('products_sum_invoice_productprice_invoice_productquantity') / 100, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <a class="btn btn-primary" href="{{ route('reports.invoices.month', ['format' => 'pdf']) }}">PDF</a>
                    <a class="btn btn-primary" href="{{ route('reports.invoices.month', ['format' => 'csv']) }}">CSV</a>
                    <a class="btn btn-primary" href="{{ route('reports.invoices.month', ['format' => 'xls']) }}">XLS</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
