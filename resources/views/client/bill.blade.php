@extends('layouts.app')

@section('title', trans('app.client.bill.show_title'))

@php
    $labelColors = $bill->paid
        ? 'text-success-emphasis bg-success-subtle border-success-subtle'
        : 'text-danger-emphasis bg-danger-subtle border-danger-subtle';
    $labelText = $bill->paid ? trans('app.client.bill.paid') : trans('app.client.bill.not_paid');
@endphp

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            {{ trans('app.client.bill.show_title') . " ($bill->invoice_nr)" }}
                        </div>
                        <div>
                            <small
                                class="d-inline-flex px-3 py-1 fw-semibold border rounded-5 {{ $labelColors }}">
                                {{ $labelText }}
                            </small>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end mb-3">
                            <a href="{{ route('client.index') }}"
                               class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                        </div>
                        <div class="col-md-12">
                            <span class="text-body-secondary">{{ trans('app.client.bill.bill_date') }}:</span>
                            {{ $bill->bill_date }}
                        </div>
                        <div class="col-md-12">
                            <span class="text-body-secondary">{{ trans('app.client.bill.invoice_nr') }}:</span>
                            {{ $bill->invoice_nr }}
                        </div>
                        <div class="col-md-12">
                            <span class="text-body-secondary">{{ trans('app.client.bill.bank_acc_nr') }}:</span>
                            {{ $bill->bank_acc_nr }}
                        </div>
                        <div class="col-md-12 mt-2 mb-1">
                            {{ trans('app.client.bill.product_list') }}
                        </div>
                        <div class="col-md-12">
                            @if($bill?->products !== null && $bill?->products->toArray())
                                @php($sum = 0)
                                @foreach($bill?->products as $product)
                                    <div>
                                        <span
                                            class="text-body-secondary">{{ trans('app.client.bill.product.name') }}:</span>
                                        {{ $product->name }}
                                    </div>
                                    <div>
                                        <span
                                            class="text-body-secondary">{{ trans('app.client.bill.product.amount') }}:</span>
                                        {{ $product->amount }}
                                    </div>
                                    <div>
                                        <span
                                            class="text-body-secondary">{{ trans('app.client.bill.product.price') }}:</span>
                                        {{ $product->price }}
                                    </div>
                                    <div>
                                        <span
                                            class="text-body-secondary">{{ trans('app.client.bill.product.sum_price') }}:</span>
                                        {{ $product->amount * $product->price }}
                                    </div>
                                    <div>
                                        <span
                                            class="text-body-secondary">{{ trans('app.client.bill.product.vat') }}:</span>
                                        {{ App\Models\Bill::VAT * 100 }}
                                    </div>
                                    <div>
                                        <span
                                            class="text-body-secondary">{{ trans('app.client.bill.product.sum') }}:</span>
                                        @php($sum += $product->amount * $product->price * (1 + App\Models\Bill::VAT))
                                        {{ round($product->amount * $product->price * (1 + App\Models\Bill::VAT), 2) }}
                                    </div>
                                    <hr>
                                @endforeach

                                <div>
                                        <span
                                            class="text-body-secondary">{{ trans('app.client.bill.product.general_sum') }}:</span>
                                    {{ round($sum, 2) }}
                                </div>
                            @else
                                <div
                                    class="alert alert-info mb-0 product-list-empty"
                                    role="alert">
                                    {{ trans('app.client.bill.empty_products') }}
                                </div>
                            @endif
                        </div>
                        @if($bill?->products !== null && $bill?->products->toArray())
                            @if(!$bill->paid)
                                <div class="col-md-12 mt-3">
                                    <form action="{{ route('client.bill.pay', ['bill' => $bill->id]) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success"
                                                type="submit">{{ trans('app.client.bill.pay') }}</button>
                                    </form>
                                </div>
                            @endif
                        @else
                            <div class="col-md-12 mt-3">
                                <div
                                    class="alert alert-danger mb-0 product-list-empty"
                                    role="alert">
                                    {{ trans('app.client.bill.cannot_pay_bill') }}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
