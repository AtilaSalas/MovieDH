@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card px-md-4">
                <div class="card-header">{{ __('Ingresá tu E‑Mail') }}</div>

                <div class="card-body reg">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Dirección de E-Mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                          <label for="email">{{ __('Dirección de E-Mail') }}</label>

                        </div>

                        <div class="form-group row">

                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                          <label for="password">{{ __('Contraseña') }}</label>

                        </div>

                        <div class="form-group row">

                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                  {{ __('Recordarme') }}
                              </label>
                          </div>

                        </div>

                        <div class="form-group row mb-0">

                          <button type="submit" class="btn btn-primary">
                              {{ __('Ingresar') }}
                          </button>

                          {{-- @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                  {{ __('Forgot Your Password?') }}
                              </a>
                          @endif --}}

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
