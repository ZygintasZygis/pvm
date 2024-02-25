@extends('layouts.app')

@section('title', trans('app.admin.client.create'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('app.admin.client.create_title') . " ({$client->name})" }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end mb-3">
                            <a href="{{ route('admin.client.profile', ['id' => $client->username]) }}"
                               class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                        </div>
                        <form action="{{ route('admin.client.store', ['userId' => $client->username]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ $client->id }}">
                            <input type="hidden" name="username" value="{{ $client->username }}">

                            @include('admin.client._form')

                            <div class="col-md-12 text-center">
                                <button type="submit"
                                        class="btn btn-primary mt-3 align-center">{{ trans('app.admin.client.save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
