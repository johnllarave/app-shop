@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')

<div class="header header-filter" style="background-image: url('{{asset('img/city.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="card card-signup">
                        <form class="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="header header-primary text-center">
                                <h4>Formulario de registro</h4>
                                <div class="social-line">
                                    <a href="#" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <p class="text-divider">Ingrese sus datos</p>
                            <div class="content">

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>

                                    <input id="name" type="text" placeholder="Nombre..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input id="email" type="email" placeholder="Email..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password" type="password" placeholder="Conyraseña..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password-confirm" type="password" placeholder="Confirma Conyraseña..."  class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-simple btn-primary btn-lg">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    @include('includes.footer')
</div>

@endsection
