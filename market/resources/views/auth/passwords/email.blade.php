@extends('layouts.app')
@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('img/abstract1.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-4">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class=" header header-primary text-center">
                            <h4>Recuperar contraseña</h4>
                        </div>
                        <!-- <p class="text-divider">Ingresa tus datos</p> -->
                        <div class="content">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" type="email" placeholder="Correo electrónico..." class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif



                            </div>

                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Recuperar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

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