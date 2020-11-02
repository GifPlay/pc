@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-info mb-3">
                    <div class="card-header">{{ __('Autenticación') }}</div>

                    <div class="card-body">
                        <div class="row py-5 mt-4 align-items-center">
                            <!-- For Demo Purpose -->
                            <div class="col-md-5 pr-lg-5 mb-5 mb-md-0" align="center">

                                <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid mb-3 d-none d-md-block">

                                <h1>Inicia Sesión</h1>
                                <p class="font-italic text-muted mb-0">Solo usuarios con cuenta pueden ingresar.</p>
                                <p>Solicita el acceso a un administrador.</p>

                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf


                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                                    <div class="col-md-8">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <br></br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Iniciar sesión') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
