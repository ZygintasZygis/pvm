@extends('layouts.app')

@section('title', trans('app.accountant.client_list'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.accountant.client_list') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($clients as $client)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <span class="text-body-secondary">{{ trans('app.accountant.client.name_surname') }}:</span>
                                                {{ $client['name'] }}
                                            </div>
                                        </div>
                                        <a href="{{ route('accountant.client.show', ['userId' => $client['username']]) }}"
                                           class="btn btn-primary btn-sm">{{ trans('app.accountant.client.profile_button') }}</a>
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
