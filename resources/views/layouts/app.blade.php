<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
    <div id="app">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            
            <div class="nav-item text-nowrap">
                @guest
                    <a class="nav-link px-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="nav-link px-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a class="nav-link px-3" href="#">Welcome! {{ Auth::user()->name }}</a>
                @endguest
            </div>
        </div>
        </header>
        @auth
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                    
                <li class="nav-item">
                  <a class="{{ Request::is('home') ? 'nav-link active' : 'nav-link' }}" aria-current="page" href="{{ url('/home') }}">
                    <span data-feather="home"></span>
                    Dashboard
                  </a>
                </li>
                @if (Auth::user()->isAdmin())
                    <li data-toggle="collapse" data-target="#usermenu" class="nav-item collapsed active">
                        <a class="{{ Request::is('users/*') ? 'nav-link active' : 'nav-link' }}" href="#">User Management </a>
                    </li>
                    <ul class="collapse" id="usermenu">
                        <li class="nav-item"><a href="{{ url('/users/roles') }}">Roles</a></li>
                        <li class="nav-item"><a href="{{ url('/users/list') }}">Users</a></li>
                    </ul>
                @endif
                <li data-toggle="collapse" data-target="#expensemenu" class="nav-item collapsed active">
                    <a class="{{ Request::is('exp/*') ? 'nav-link active' : 'nav-link' }}" href="#">Expense Management </a>
                </li>
                <ul class="collapse" id="expensemenu">
                    <li class="nav-item"><a href="#">Categories</a></li>
                    <li class="nav-item"><a href="#">Expenses</a></li>
                </ul>
              </ul>
              <hr>
          <div>
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </div>
            </div>
        </nav>
        @endauth

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
