@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card px-md-4">
                <div class="card-header">{{ __('Registraté') }}</div>

                <div class="card-body reg">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="name">{{ __('Nombre') }}</label>

                        </div>

                        <div class="form-group row">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Dirección de E-Mail" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="email">{{ __('Dirección de E-Mail') }}</label>

                        </div>

                        <div class="form-group row">

                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="new-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                          <label for="password">{{ __('Contraseña') }}</label>

                        </div>

                        <div class="form-group row">

                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir Contraseña" required autocomplete="new-password">

                          <label for="password-confirm">{{ __('Repetir Contraseña') }}</label>

                        </div>

                        <div class="form-group row mb-0">

                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
