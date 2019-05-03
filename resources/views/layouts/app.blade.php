<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

  <script type="text/x-mathjax-config">
    MathJax.Hub.Config({
      messageStyle: "none"
    })
  </script>
  <script type="text/javascript" async
    src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML">
  </script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ mix('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="py-2 navbar navbar-expand-md
      {{ Request::is('/') ? 'navbar-light' : 'navbar-dark dark-bg' }}">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
              <a id="changeLangDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ strtoupper(app()->getLocale()) }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="changeLangDropdown">
                <a class="dropdown-item" href="{{ route('lang') }}"
                  onclick="event.preventDefault();
                  document.getElementById('lang-input').value = 'en';
                  document.getElementById('lang-form').submit();">
                  English
                </a>

                <a class="dropdown-item" href="{{ route('lang') }}"
                  onclick="event.preventDefault();
                  document.getElementById('lang-input').value = 'pt';
                  document.getElementById('lang-form').submit();">
                  Português
                </a>

                <form id="lang-form" action="{{ route('lang') }}" method="POST" style="display: none;">
                  @method('PUT')
                  @csrf

                  <input id="lang-input" type="text" name="lang">
                </form>
              </div>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
              @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a>
              @endif
            </li>
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('profile') }}">
                  {{ __('Profile') }}
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4 {{ Request::is('/') ? '' : 'gray-bg' }}">
      @yield('content')
    </main>
  </div>
</body>
</html>
