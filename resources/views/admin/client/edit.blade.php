@extends('layouts.app')

@section('title', trans('app.admin.client.edit'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('app.admin.client.edit_title') . " ({$client->user->name})" }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end mb-3">
                            <a href="{{ route('admin.client.profile', ['id' => $client->user->username]) }}"
                               class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                        </div>
                        <form action="{{ route('admin.client.update', ['id' => $client->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="user_id" value="{{ $client->user->id }}">
                            <input type="hidden" name="username" value="{{ $client->user->username }}">

                            @include('admin.client._form')

                            <div class="col-md-12 text-center">
                                <button type="submit"
                                        class="btn btn-primary mt-3 align-center">{{ trans('app.admin.client.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
