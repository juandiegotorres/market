@extends('layouts.app')
@section('title', 'Categorías y productos')
@section('body-class', 'landing-page')
@include('includes.style')
@section('styles')
<style>
    .header {
        margin-bottom: -630px;
    }

    .team .team-player img {
        max-width: 230px;
        max-height: 230px;
    }

    h2.title {
        margin-top: -14px;
        margin-bottom: 10px;
    }

    h4.title {
        margin-top: -14px;
        margin-bottom: 40px;
    }

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

    .description {
        margin-top: -20px;
    }

    .main {
        background: #EAEAEA;
    }

    .row>[class*='col-md-4'] {
        display: flex;
        flex-direction: column;
    }

    .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
        color: #999
    }

    .tt-menu {
        /* used to be tt-dropdown-menu in older versions */
        width: 222px;
        margin-top: 4px;
        padding: 4px 0;
        background-color: #fff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }

    .tt-suggestion {
        padding: 3px 20px;
        line-height: 24px;
        text-align: left;
    }

    h4.M {
        border: 1px solid rgba(76, 155, 243, 0.125);
        text-align: center;
        position: absolute;
        bottom: -35px;
        width: 90%;
        font-weight: bold;
    }

    .tt-suggestion.tt-cursor,
    .tt-suggestion:hover {
        color: #fff;
        background-color: #1565C0;
    }

    .tt-suggestion p {
        margin: 0;
    }
</style>
@endsection
@section('content')

<div class="header header-filter" style="background-image: url('/img/abstract.jpg');">

</div>
<div class="body">
    <div class="main main-raised">
        <div class="container">

            <div class="section text-center">
                <h2 class="title">Categorías</h2>

                <form class="form-inline" method="get" action="{{ url('/search') }}">
                    <input type="text" placeholder="Buscar producto..." class="form-control" name="query" id="search">
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
                                    <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-rounded">
                                </a>
                                <h4 class="title">
                                    <a href="{{ url('/categories/'.$category->id) }}">{{ $category->name }}</a>
                                    <br />
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
                                        </h4>
                                        <h4 class="M">$ {{ $product->price }}</h4>


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
    </div>
    @include('includes.footer')

    @endsection
    @section('scripts')
    {{-- <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>
    <script>
        $(function() {
            // 
            var products = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                //local: ['hola1', 'hola2', 'prueba1', 'prueba2', 'abcde']
                prefetch: '{{ url("/products/json") }}'
            });
            // inicializar typeahead sobre nuestro input de búsqueda
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: products
            });
        });
    </script> --}}
    @endsection