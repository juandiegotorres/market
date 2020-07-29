@extends('layouts.app')

@section('title', 'JT Store | Categorías')

@section('body-class', 'profile-page')
@include('includes.style')
@section('styles')
<style>
    .team {
        padding-bottom: 50px;
    }

    .team .row .col-md-3 {
        margin-bottom: 5em;
    }

    .team .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
    }

    .team .row>[class*='col-'] {
        display: flex;
        flex-direction: column;
    }

    .no-margin {
        margin: 0;
    }

    .team .team-player .title {
        margin-bottom: 0.5em;
    }

    .profile-page .profile img {
        
        background-color: #FFFFFF;
    }
</style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('/img/abstract.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="{{ $category->featured_image_url }}" alt="Imagen representativa de la categoría {{ $category->name }}" class="img-rounded img-responsive">
                    </div>

                    <div class="name">
                        <h3 class="title">{{ $category->name }}</h3>
                    </div>


                    @if (session('notification'))
                    <div class="alert alert-success">
                        {{ session('notification') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>{{ $category->description }}</p>
            </div>

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

        </div>
    </div>
</div>


@include('includes.footer')
@endsection