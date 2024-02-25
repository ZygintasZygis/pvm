@inject('user', 'App\Models\User')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"/>
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ trans('app.system') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('home*')) ? 'active' : '' }}" aria-current="page"
                       href="{{ route('home') }}">{{ trans('app.home') }}</a>
                </li>
                @if($user->isUserAdministrator())
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin*')) ? 'active' : '' }}"
                           href="{{ route('admin.index') }}">{{ trans('app.admin_subsystem') }}</a>
                    </li>
                @endif
                @if($user->isUserClient())
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('client*')) ? 'active' : '' }}"
                           href="{{ route('client.index') }}">{{ trans('app.client_subsystem') }}</a>
                    </li>
                @endif
                @if($user->isUserAccountant())
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('accountant*')) ? 'active' : '' }}"
                           href="{{ route('accountant.index') }}">{{ trans('app.accountant_subsystem') }}</a>
                    </li>
                @endif
            </ul>
            @auth
                <div class="me-3">{{ auth()->user()->name }}</div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">{{ trans('app.logout') }}</button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<div class="container my-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            @if(session('success'))
                <div class="p-3 text-primary-emphasis bg-success-subtle border border-success-subtle rounded-3">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="p-3 text-primary-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<script src="{{ url('js/app.js') }}"></script>
</body>
</html>
