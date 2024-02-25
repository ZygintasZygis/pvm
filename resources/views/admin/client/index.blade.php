@extends('layouts.app')

@section('title', trans('app.admin.client.title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.admin.client.title') }}</div>
                <div class="card-body">
                    <div class="col-md-12 text-end mb-3">
                        <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <span>{{ trans('app.admin.client.list') }}</span>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($clients as $client)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <span class="text-body-secondary">{{ trans('app.admin.client.name_surname') }}:</span>
                                                {{ $client['name'] }}
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.client.profile', ['id' => $client['username']]) }}"
                                           class="btn btn-primary btn-sm">{{ trans('app.admin.client.profile_button') }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
