@extends('layouts.app')

@section('title', trans('app.admin.user.title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ trans('app.admin.user.title') }}</div>
                <div class="card-body">
                    <div class="col-md-12 text-end mb-3">
                        <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <span>{{ trans('app.admin.user.list') }}</span>
                        </div>
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach($users as $user)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="d-flex flex-column">
                                            <div>
                                                <span class="text-body-secondary">{{ trans('app.admin.user.name_surname') }}:</span>
                                                {{ $user['name'] }}
                                            </div>
                                            <div>
                                                <span class="text-body-secondary">{{ trans('app.admin.user.roles') }}:</span>
                                                {{ implode(', ', $user->getUserRolesTranslated()) }}
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.user.edit', ['id' => $user['username']]) }}"
                                           class="btn btn-primary btn-sm">{{ trans('app.admin.user.edit') }}</a>
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
