@extends('layouts.app')

@section('title', trans('app.client.title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.client.bills') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                @if($bills?->bills !== null && $bills?->bills->toArray())
                                    @foreach($bills->bills as $bill)
                                        <li class="list-group-item d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <div>
                                                    <span class="text-body-secondary">{{ trans('app.admin.bill.date') }}:</span>
                                                    {{ $bill->bill_date }}
                                                </div>
                                                <div>
                                                    {{ "Serija {$bill->invoice_nr}" }}
                                                </div>
                                            </div>
                                            <div class="ms-4">
                                                <small
                                                    @class([
                                                        'd-inline-flex px-3 py-1 fw-semibold border rounded-5',
                                                        'text-success-emphasis bg-success-subtle border-success-subtle' => $bill->paid,
                                                        'text-danger-emphasis bg-danger-subtle border-danger-subtle' => !$bill->paid
                                                    ])>
                                                    {{ $bill->paid ? trans('app.client.bill.paid_short') : trans('app.client.bill.not_paid_short'); }}
                                                </small>
                                            </div>
                                            <div class="d-flex ms-auto">
                                                <a href="{{ route('client.bill.show', ['bill' => $bill->id]) }}"
                                                   class="btn btn-primary btn-sm me-2">{{ trans('app.client.bill.show') }}</a>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <div class="alert alert-info" role="alert">
                                        {{ trans('app.admin.bill.empty') }}
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
