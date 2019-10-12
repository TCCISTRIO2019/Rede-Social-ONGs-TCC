@extends('layouts.app')

@section('titulo','Tela Inicial')

@section('conteudo')
<div class="container">
  @if (Route::has('login'))
      <div class="top-right links">
          @auth

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>

          @else
              <a href="{{ route('login') }}">Login</a>

              @if (Route::has('register'))
                  <a href="{{ route('register') }}">Register</a>
              @endif
          @endauth
      </div>
  @endif

  <div class="card-body">
      @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{ session('status') }}
          </div>
      @endif

      You are logged in!

  </div>

  <h3 class="center">ONGs</h3>
  <div class="row">
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
{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
