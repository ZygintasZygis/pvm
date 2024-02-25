@extends('layouts.app')

@section('title', trans('app.admin.client.profile'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.admin.client.profile') }}</div>
                <div class="card-body">
                    <div class="col-md-12 text-end mb-3">
                        <a href="{{ route('admin.client.index') }}"
                           class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <span>{{ trans('app.admin.client.client_data') }}</span>
                        </div>
                        <div class="col-md-12 mb-2">
                            @if($client?->client !== null)
                                <a href="{{ route('admin.client.edit', ['id' => $client->client->id]) }}"
                                   class="btn btn-sm btn-primary">{{ trans('app.admin.client.edit') }}</a>
                            @else
                                <a href="{{ route('admin.client.create', ['userId' => $client->username]) }}"
                                   class="btn btn-sm btn-primary">{{ trans('app.admin.client.create') }}</a>
                            @endif
                        </div>
                        @if($client?->client !== null)
                            <div class="col-md-12">
                                <span class="text-body-secondary">{{ trans('app.admin.client.company') }}:</span>
                                {{ $client->name }}
                            </div>
                            <div class="col-md-12">
                                <span class="text-body-secondary">{{ trans('app.admin.client.address') }}:</span>
                                {{ $client->client->address }}
                            </div>
                            <div class="col-md-12">
                                <span class="text-body-secondary">{{ trans('app.admin.client.company_code') }}:</span>
                                {{ $client->client->company_code }}
                            </div>
                            <div class="col-md-12">
                                <span class="text-body-secondary">{{ trans('app.admin.client.vat_nr') }}:</span>
                                {{ $client->client->vat_nr }}
                            </div>
                        @else
                            <div class="col-md-12">
                                <div class="alert alert-info" role="alert">
                                    {{ trans('app.admin.client.empty') }}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 mb-2">
                            <span>{{ trans('app.admin.bill.list') }}</span>
                        </div>
                        @if($client->client === null)
                            <div class="col-md-12 mb-2">
                                <div class="alert alert-danger" role="alert">
                                    {{ trans('app.admin.bill.create_not_allowed') }}
                                </div>
                            </div>
                        @else
                            <div class="col-md-12 mb-2">
                                <a href="{{ route('admin.bill.create', ['clientId' => $client->client->id]) }}"
                                   class="btn btn-sm btn-primary">{{ trans('app.admin.bill.create') }}</a>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <ul class="list-group">
                                @if($bills?->bills !== null && $bills?->bills->toArray())
                                    @foreach($bills->bills as $bill)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
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
                                                <a href="{{ route('admin.bill.edit', ['clientId' => $client->id, 'bill' => $bill->id]) }}"
                                                   class="btn btn-primary btn-sm me-2">{{ trans('app.admin.bill.edit') }}</a>
                                                @if(!$bill->paid)
                                                    <form
                                                        action="{{ route('admin.bill.destroy', ['bill' => $bill->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Tikrai norite ištrinti įrašą?')">{{ trans('app.admin.bill.delete') }}</button>
                                                    </form>
                                                @endif
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
