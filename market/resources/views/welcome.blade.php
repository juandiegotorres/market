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
</style>
@endsection
@section('content')



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
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="/img/promo3.jpg" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="/img/promo2.png" style="width:100%;">
                        </div>

                        <div class="item">
                            <img src="/img/promo1.png" style="width:100%;">
                        </div>
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
</div>
@include('includes.footer')

@endsection