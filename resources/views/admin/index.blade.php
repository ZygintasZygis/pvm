@extends('layouts.app')

@section('title', trans('app.client.title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.admin.functions') }}</div>

                <div class="card-body">
                    <a href="{{ route('admin.user.index') }}"
                       class="btn btn-primary">{{ trans('app.admin.user_admin') }}</a>
                    <a href="{{ route('admin.client.index') }}"
                       class="btn btn-primary">{{ trans('app.admin.client_admin') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
