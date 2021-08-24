@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create invoice') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('invoices.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="invoice_date" class="col-md-4 col-form-label text-md-right">{{ __('Invoice Date') }}</label>

                            <div class="col-md-6">
                                <input id="invoice_date" type="date" class="form-control @error('invoice_date') is-invalid @enderror" name="invoice_date" value="{{ old('invoice_date', date('Y-m-d')) }}" required>

                                @error('invoice_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-right">{{ __('Customer Name') }}</label>

                            <div class="col-md-6">
                                <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" required>

                                @error('customer_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Hardcoding 3 products for simplicity, to avoid JS code --}}
                        @foreach ($products as $product)
                            <input type="hidden" name="prices[]" value="{{ $product->price }}" />
                        @endforeach
                        @for ($i=1; $i <= 3; $i++)
                            <div class="form-group row">
                                <label for="products" class="col-md-4 col-form-label text-md-right">{{ __('Product') }} {{ $i }}</label>

                                <div class="col-md-4">
                                    <select name="products[]" class="form-control">
                                        <option value="">-- choose product --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} (${{ $product->price_in_usd }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <select name="quantities[]" class="form-control">
                                        <option value="">-- quantity --</option>
                                        @foreach (range(1,10) as $quantity)
                                            <option>{{ $quantity }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endfor

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Invoice') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
