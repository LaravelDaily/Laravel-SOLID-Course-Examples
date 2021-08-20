@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Invoices by Product') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Total Revenue</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($report as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->total_revenue / 100, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
