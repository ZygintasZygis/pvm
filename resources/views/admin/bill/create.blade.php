@extends('layouts.app')

@section('title', trans('app.admin.bill.create'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('app.admin.bill.create_title') . " ({$client->user->name})" }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end mb-3">
                            <a href="{{ route('admin.client.profile', ['id' => $client->user->username]) }}"
                               class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                        </div>
                        <form action="{{ route('admin.bill.store', ['id' => $client->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            @include('admin.bill._form')

                            <div class="col-md-12 text-center">
                                <button type="submit"
                                        class="btn btn-primary mt-3 align-center">{{ trans('app.admin.bill.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
