@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('List of invoices') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-info mb-3">{{ session('message') }}</div>
                    @endif

                    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-4">Create invoice</a>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Invoice number</th>
                            <th>Invoice date</th>
                            <th>Customer name</th>
                            <th>Products</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->invoice_date->format('Y-m-d') }}</td>
                                <td>{{ $invoice->customer_name }}</td>
                                <td>
                                    <ul>
                                    @foreach ($invoice->products as $product)
                                        <li>{{ $product->pivot->quantity }}
                                            x {{ $product->name }}
                                            (${{ number_format($product->pivot->price / 100, 2) }})
                                        </li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No invoices found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
