@extends('layouts.app')

@section('titulo','Tela Inicial')

@section('conteudo')

<div class="container">
  {{-- @if (Route::has('login'))
      <div class="top-right links">
          @auth
              <a href="{{ url('/home') }}">Home</a>
          @else
              <a href="{{ route('login') }}">Login</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}">Register</a>
              @endif
          @endauth
      </div>
  @endif --}}

  {{-- <h3 class="center">ONGs</h3> --}}
  <div class="row">
    <div class="container">
        <div class="row center-align">
                <div class="col s12 m5 right">
                  <div class="card deep-purple darken-1">
                    <form class="" action="{{ route('login') }}" method="post">
                      <!-- Token Laravel para verificacao de seguranca -->
                      @csrf

                      <div class="card-content white-text">
                        <h3 class="card-title">Login</h3>
                      </div>
                      <div class="card-content">
                          <div class="input-field">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                              <label>Email</label>

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>

                          <div class="input-field">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                              <label for="password" class="col-form-label text-md-right">Senha</label>

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="card-action">
                        <button type="submit" class="btn green">
                            Entrar
                        </button>

                        <br><br>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link orange" href="{{ route('password.request') }}">
                                Esqueceu sua senha?
                            </a>
                        @endif
                      </div>
                    </form>
                  </div>
                </div>

                {{-- <div class="col s12 m6">
                  <div class="card blue-grey darken-1">
                    <form method="POST" action="{{ route('register') }}">
                      <!-- Token Laravel para verificacao de seguranca -->
                        @csrf
                          <div class="card-content white-text">
                            <h3 class="card-title">Cadastrar-se</h3>
                          </div>
                          <div class="card-content">
                                <div class="input-field">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name">Nome</label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-field">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email">Email</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-field">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <label for="password">Senha</label>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-field">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm">Confirmar Senha</label>
                                </div>
                          </div>
                          <div class="card-action">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar-se
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                  </div>
                </div> --}}
        </div>
    </div>

    {{-- @foreach ($usuarios as $usuario)
      <div class="col s12 m4">  <!-- Adapta para mobile -->
        <div class="card">
          <div class="card-image">
            <img src="{{ asset($usuario->imagem) }}">
            <span class="card-title">{{ $usuario->nome }}</span>
          </div>
          <div class="card-content">
            <p>Login: {{ $usuario->usuario }} <br>
               Criado: {{ $usuario->created_at }} </p>
          </div>
          <div class="card-action">
            <a href="#">Mais...</a>
          </div>
        </div>
      </div>
    @endforeach --}}
  </div>
</div>

@endsection

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}
