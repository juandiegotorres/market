@extends('layouts.app')
@section('body-class', 'signup-page')
@section('content')
<div class="header header-filter" style="background-image: url('img/abstract1.jpg'); background-size: cover; background-position: top center;">

<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <div class="card card-signup">
                <form class="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="header header-primary text-center">
                        <h4>Recuperar contraseña</h4>
                    </div>

                    <div class="content">
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="input-group">

                            <span class="input-group-addon">
                                <i class="material-icons">email</i>
                            </span>
                            <input id="email" type="email" class="form-control" placeholder="Correo electrónico" name="email" value="{{ $email or old('email') }}" required autofocus>
               
                        </div>


                        <div class="input-group">

                            <span class="input-group-addon">
                                <i class="material-icons">lock_outline</i>
                            </span>
                            <input id="password" type="password" class="form-control" name="password" class="form-control" placeholder="Contraseña..." required>
                
                        </div>
                        <div class="input-group">

                            <span class="input-group-addon">
                                <i class="material-icons">lock_outline</i>
                            </span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña..." required>
                        </div>


                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Resetear contraseña
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    </div>
</div>

@endsection