@extends('layouts.app')
@section('title', 'Bienvenido a JT Store')
@section('body-class', 'landing-page')
@include('includes.style')
@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Hind+Guntur:wght@700&display=swap');

    .title {
        font-family: 'Hind Guntur', sans-serif;
        font-size: 70px;
        color: blanchedalmond;
    }

    .header {
        margin-bottom: -150px;
    }

    .btn {
        background-color: #601863;
    }

    .btn-danger {
        background-color: #601863;
    }

    .content {
        margin-top: 60px;
    }

    .contentttt {
        background-color: #3A3A3A;
    }

    .info .info-title {
        color: blanchedalmond;

    }

    .features {
        margin-top: -60px;
    }

    .section {
        padding: 60px 0;
    }
</style>

@endsection
@section('content')

<link href="{{ asset('/css/carousel.css') }}" rel="stylesheet" />

<div class="header header-filter" style="background-image: url('/img/descarga3.jpg');">
    <div class="container">
        <div class="ok">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="title">Bienvenido a JT Store</h1>
                    <h5>El mejor hardware al mejor precio</h5>
                    <br />
                    <a href="{{ url('/products') }}" class="btn btn-danger  btn-raised btn-lg">
                        Ver productos disponibles
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="body">
    <div class="main main-raised">
        <div class="container-fluid">
            <div class="row">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="10">

                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="/img/promo1.png" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="/img/promo5.jpeg" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="/img/promo2.png" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="/img/promo4.jpg" style="width:100%;">
                        </div>
                        <div class="item">
                            <img src="/img/promo3.jpg" style="width:100%;">
                        </div>

                    </div>


                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true">
                            <</span> <span class="sr-only">Anterior
                        </span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true">></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main main-raised contentttt">
        <div class="container content">
            <div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <h2 class="title">¿Quiénes somos?</h2>
                        <h5 class="description">Somos una empresa dedicada a la comercialización de productos de Computación y Tecnología.Desde nuestros inicios escogimos el camino del compromiso con el cliente para crecer, atendiendo y respondiendo a sus necesidades en su justa medida. Nuestra meta es lograr satisfacer sus necesidades tanto por calidad en nuestros productos como por confiabilidad en nuestro servicio, brindándoles asesoramiento especializado mediante nuestro personal altamente calificado. N.</h5>
                    </div>
                </div>

                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">Atención personalizada</h4>
                                <p>Atendemos rápidamente cualquier consulta que tengas vía mail. Siempre estamos atentos a tus inquietudes.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Pago seguro</h4>
                                <p>Todo pedido realizado será confirmado y coordinado vía mail con un administrado. Poseemos alta seguridad por lo que tus tarjetas de crédito estarán a salvo.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Información privada</h4>
                                <p>Solo tú puedes acceder a tus pedidos realizados tanto como a tus datos. Nadie más tiene acceso a tu información personal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Tienes alguna inquietud?</h2>
                    <h4 class="text-center description">Deja tus datos y un administrador se contactará contigo para asesorarte.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tu nombre</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tu correo electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Tu mensaje</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @include('includes.footer')
    @endsection