@inject('roleModel', 'App\Models\Role')
@extends('layouts.app')

@section('title', trans('app.admin.user.edit_title'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('app.admin.user.edit_title') . " ({$user->name})" }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-end mb-3">
                            <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-secondary">{{ trans('app.back') }}</a>
                        </div>
                        <form action="{{ route('admin.user.update', ['id' => $user->username]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-12 mb-2">
                                <label for="name" class="form-label">{{ trans('app.admin.user.name') }}</label>
                                <input type="text" class="form-control" id="name" disabled
                                       placeholder="{{ trans('app.admin.user.name_placeholder') }}"
                                       value="{{ old('name', $user->name) }}">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="email" class="form-label">{{ trans('app.admin.user.email') }}</label>
                                <input type="text" class="form-control disabled" disabled id="email"
                                       placeholder="{{ trans('app.admin.user.email_placeholder') }}"
                                       value="{{ old('email', $user->email) }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="role-select"
                                       class="form-label">{{ trans('app.admin.user.role_select') }}</label>
                                <select class="form-select bs-select" id="role-select"
                                        name="roles[]"
                                        data-placeholder="Pasirinkite rolę"
                                        multiple>
                                    @foreach($roleModel->allRoles() as $key => $role)
                                        <option
                                            value="{{ $key }}" {{ in_array($role, $user->getUserRoles()) ? 'selected' : '' }}>
                                            {{ trans("app.roles.$role") }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit"
                                        class="btn btn-primary mt-3 align-center">{{ trans('app.admin.user.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
