@extends('layouts.app')

@section('title', trans('app.admin.bill.update'))

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
                            {{ trans('app.admin.bill.update_title') . " ({$client->user->name})" }}
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
                            <a href="{{ route('admin.client.profile', ['id' => $client->user->username]) }}"
                               class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                        </div>
                        <form action="{{ route('admin.bill.update', ['bill' => $bill->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('admin.bill._form')

                            @if(!$bill->paid)
                                <div class="col-md-12 text-center">
                                    <button type="submit"
                                            class="btn btn-primary mt-3 align-center">{{ trans('app.admin.bill.update') }}</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
