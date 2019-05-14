<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') . ' - App Analytics' }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

    <style>
    
    .nav-link {
        color: #a4a6fa;
        font-size: 18px;
    }

    .nav-link.active {
        color: #2017bb;
    }

    .icon {
        font-size: 24px;
        color: lightgray;
    }

    .active {
        color: #2017bb;
    }
    
    </style>
</head>

<body>
    <div class="mb-5" style="margin-left: 0; margin-right: 0; padding-right: 15px;">
        <div class="d-flex align-items-center py-4 header">
            {{-- <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80">
                <path class="fill-primary"
                    d="M0 40a39.87 39.87 0 0 1 11.72-28.28A40 40 0 1 1 0 40zm34 10a4 4 0 0 1-4-4v-2a2 2 0 1 0-4 0v2a4 4 0 0 1-4 4h-2a2 2 0 1 0 0 4h2a4 4 0 0 1 4 4v2a2 2 0 1 0 4 0v-2a4 4 0 0 1 4-4h2a2 2 0 1 0 0-4h-2zm24-24a6 6 0 0 1-6-6v-3a3 3 0 0 0-6 0v3a6 6 0 0 1-6 6h-3a3 3 0 0 0 0 6h3a6 6 0 0 1 6 6v3a3 3 0 0 0 6 0v-3a6 6 0 0 1 6-6h3a3 3 0 0 0 0-6h-3zm-4 36a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM21 28a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                </path>
            </svg> --}}
            <h4 class="mb-0 ml-3">App Analytics</h4>
        </div>

        <div class="row mt-4">
            <div class="col-2 sidebar">
                <ul class="nav flex-column">
                    <li class="nav-item nav-link d-flex align-items-center">
                        <i class="icon ion-md-analytics {{ Request::segment(2) === 'metrics' ? 'active' : null }}"></i>
                        <a href="{{ route('web.metrics.index') }}" class="nav-link d-flex align-items-center">
                            <span class="{{ Request::segment(2) === 'metrics' ? 'active' : null }}">Metrics</span>
                        </a>
                    </li>
                    <li class="nav-item nav-link d-flex align-items-center">
                        <i class="icon ion-md-cube {{ Request::segment(2) === 'sessions' ? 'active' : null }}"></i>
                        <a href="{{ route('web.sessions.index') }}" class="nav-link d-flex align-items-center">
                            <span class="{{ Request::segment(2) === 'sessions' ? 'active' : null }}">Sessions</span>
                        </a>
                    </li>
                    <li class="nav-item nav-link d-flex align-items-center  mb-3">
                        <i class="icon ion-md-analytics {{ Request::segment(2) === 'events' ? 'active' : null }}"></i>
                        <a href="{{ route('web.events.index') }}" class="nav-link d-flex align-items-center">
                            <span class="{{ Request::segment(2) === 'events' ? 'active' : null }}">Events</span>
                        </a>
                    </li>
                    {{-- @foreach (Jvdw\Analytics\Models\AppMetric::all() as $metric)
                        <li class="nav-item nav-link d-flex align-items-center">
                            <i class="icon ion-md-analytics {{ Request::segment(3) === $metric->name ? 'active' : null }}"></i>
                            <a href="#" class="nav-link d-flex align-items-center">
                                <span class="{{ Request::segment(3) === $metric->name ? 'active' : null }}">{{ $metric->name }}</span>
                            </a>
                        </li>
                    @endforeach --}}
                </ul>
            </div>

            <div class="col-10 p-3">
                <div class="card p-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>

</html>