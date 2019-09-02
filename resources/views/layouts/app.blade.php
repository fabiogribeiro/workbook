<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>

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
  <link href="{{ mix('css/vendor.css') }}" rel="stylesheet">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <div class="uk-background-secondary">
      <div class="uk-container">
        <nav uk-navbar="delay-hide: 200" class="uk-light">
          <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
            </a>

            <ul class="uk-navbar-nav">
              <li>
                <a href="#">
                  {{ app()->getLocale() }}
                </a>
                <div class="uk-navbar-dropdown">
                  <ul class="uk-nav uk-navbar-dropdown-nav">
                    <li>
                      <a href="#"
                        onclick="event.preventDefault();
                        document.getElementById('lang-input').value = 'en';
                        document.getElementById('lang-form').submit();">
                        English
                      </a>
                    </li>
                    <li>
                      <a href="#"
                        onclick="event.preventDefault();
                        document.getElementById('lang-input').value = 'pt';
                        document.getElementById('lang-form').submit();">
                        Português
                      </a>
                    </li>
                  </ul>
                </div>
                <form id="lang-form" action="{{ route('lang') }}" method="POST" style="display: none;">
                  @method('PUT')
                  @csrf

                  <input id="lang-input" type="text" name="lang">
                </form>
              </li>
            </ul>
          </div>
          <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
              @guest
                <li>
                  <a href="{{ route('login') }}">
                    {{ __('Login') }}
                  </a>
                </li>
                <li>
                  <a href="{{ route('register') }}">
                    {{ __('auth.register') }}
                  </a>
                </li>
              @else
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              @endguest
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <main class="{{ Request::is('/') ? '' : 'gray-bg' }}">
      @yield('content')
    </main>
  </div>
</body>
</html>
