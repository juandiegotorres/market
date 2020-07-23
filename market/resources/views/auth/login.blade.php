@extends('layouts.app')
@section('body-class', 'signup-page')
@section('styles')
<style>
    .ok {
        margin-bottom: 7em;
    }

    .footer {
        background: transparent;
    }
    .signup-page .footer .copyright, .signup-page .footer a {
    color: #FFFFFF;
    }
</style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('img/abstract1.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="header header-primary text-center">
                            <h4>Iniciar Sesión</h4>
                            <!--    <div class="social-line">
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#pablo" class="btn btn-simple btn-just-icon">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </div> -->
                        </div>
                        <!-- <p class="text-divider">Ingresa tus datos</p> -->
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
                                <input id="email" type="email" placeholder="Correo electrónico..." class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" placeholder="Contraseña..." class="form-control" name="password" required>
                            </div>

                            <!--  If you want to add a checkbox to this form, uncomment this code -->

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar sesión

                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Ingresar</a>
                        </div>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                             Forgot Your Password?
                        </a>
                    </form>

                </div>
            </div>
        </div>
        <p style="color:white;" class="ok text-center">
            ¿No tienes una cuenta? <a href="{{ route('register') }}"> Crear una</a>
        </p>
    </div>

    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a rel="tooltip" title="Seguinos en Facebook" data-placement="top" href="https://www.facebook.com/" target="_blank" class="btn btn-black btn-simple btn-just-icon">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                    </li>
                    <li>
                        <a rel="tooltip" title="Seguinos en Twitter" data-placement="top" href="https://www.twitter.com/" target="_blank" class="btn btn-black btn-simple btn-just-icon">
                            <i class="fa fa-twitter-square"></i>
                        </a>
                    </li>
                    <li>
                        <a rel="tooltip" title="Seguinos en Instagram" data-placement="top" href="https://www.instagram.com/" target="_blank" class="btn btn-black btn-simple btn-just-icon">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a class="copyright" href="">
                            Contacto
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; Juan Diego Torres
            </div>
        </div>

    </footer>
</div>

@endsection