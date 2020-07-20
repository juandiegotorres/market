@extends('layouts.app')
@section('title', 'Bienvenido a JT Store')
@section('body-class', 'landing-page')
@section('styles')
<style>
    .team .row .col-md-3 {
        margin-bottom: 5em;
    }

    .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }

    .row>[class*='col-md-4'] {
        display: flex;
        flex-direction: column;
    }
</style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('https://www.digitalplatforms.co.za/wp-content/uploads/2015/11/Website-Design-Background.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a mi tienda</h1>
                <h4>Realiza tu pedido de forma online de la manera más fácil</h4>
                <br />
                <a href="#productos" class="btn btn-danger btn-raised btn-lg">
                    Ver productos disponibles
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Categorías</h2>

            <form class="form-inline" method="get" action="{{ url('/search') }}">
                <input type="text" placeholder="Buscar producto..." class="form-control" name="query">
                <button class="btn btn-primary btn-just-icon" type="submit">
                    <i class="material-icons">search</i>
                </button>
            </form>

            <div class="team">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-3">
                        <div class="team-player">
                            <a href="{{ url('/categories/'.$category->id) }}">
                                <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-rounded">
                            </a>
                            <h4 class="title">
                                <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                                <br />
                                <small class="text-muted">{{ $category->name }}</small>
                            </h4>
                            <p class="description">{{ $category->description }}</p>

                        </div>
                    </div>
                    @endforeach
                </div>
                <a name="productos">
                    <h2 class="title">Productos destacados</h2>
                    <div class="team text-center">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-md-3">
                                <div class="team-player">
                                    <a href="{{ url('/products/'.$product->id) }}">
                                        <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-rounded">
                                    </a>
                                    <h4 class="title">
                                        <a href="{{ url('/products/'.$product->id) }}">{{ $product->name }}</a>
                                        <br />
                                        <small class="text-muted">{{ $product->category->name }}</small>
                                    </h4>
                                    <p class="description">{{ $product->description }}</p>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </a>
            </div>

        </div>

    </div>

    @include('includes.footer')

    @endsection