<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('titulo')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Import Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  <!-- Material Icon -->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">  <!-- IBM Plex Sans -->
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body style="font-family: 'IBM Plex Sans', sans-serif;">
  <header>
  <nav>
    <div class="nav-wrapper deep-purple darken-3">
      <a href="{{ route('welcome') }}" class="brand-logo">Logo Site</a>
      <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      {{-- <ul class="right hide-on-med-and-down">
        <li><a href="/">Home</a></li>
        <li><a href="#">ONGs</a></li>
      </ul> --}}

      <!-- Right Side Of Navbar -->
      <ul class="right hide-on-med-and-down">
          <li><a href="/">Home</a></li>
          <li><a href="#">ONGs</a></li>

          <!-- Authentication Links -->
          @guest
              {{-- <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li> --}}
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Criar Conta</a>
                  </li>
              @endif
          @else
            {{-- Excluir --}}
            {{-- <nav>
              <div class="nav-wrapper">
                <a href="#!" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                  <li><a href="sass.html">Sass</a></li>
                  <li><a href="badges.html">Components</a></li>
                  <!-- Dropdown Trigger -->
                  <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
              </div>
            </nav> --}}

              {{-- <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Drop Me!</a> --}}

                  {{-- Chamado ao clicar em sair para logout --}}
                  {{-- <a class="dropdown-item" href="{{ route('logout') }}">
                    @csrf
                    Sair
                  </a> --}}

                  {{-- <div class="nav-wrapper"> --}}
                      <ul class="right hide-on-med-and-down">
                          <li>
                              <a href="#" data-target='dropdown-perfil' class="dropdown-trigger">
                                {{ Auth::user()->name }}
                                <i class="material-icons right">arrow_drop_down</i>
                              </a>
                              <ul id='dropdown-perfil' class='dropdown-content'>
                                <li><a href="#!">Perfil</a></li>
                                <li><a href="#!">Configuracoes</a></li>
                                <li><a href="#!">Logout</a></li>
                              </ul>
                          </li>
                      </ul>
                  {{-- </div> --}}
              </div>
          @endguest
      </ul>

    </div>
  </nav>

  <ul class="sidenav" id="mobile">
    <li><a href="/">Home</a></li>
    <li><a href="#">ONGs</a></li>
  </ul>
</header>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <main class="py-4">
        @yield('conteudo')
    </main>

    <!--JavaScript at end of body for optimized loading-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  {{-- Comandos materialize --}}
  <script type="text/javascript">
    $(document).ready(function(){
      M.updateTextFields();
      $('.sidenav').sidenav();
      $('.dropdown-trigger').dropdown();
    });
  </script>

</body>
</html>
