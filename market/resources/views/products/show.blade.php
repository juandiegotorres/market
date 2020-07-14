@extends('layouts.app')
@section('title', 'JT Store | Dashboard')
@section('body-class', 'profile-page')
@section('content')
    <div class="header header-filter" style="background-image: url('/img/abstract.jpg');"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-rounded img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title">{{ $product->name }}</h3>
                            <h6>{{ $product->category->name }}</h6>
                        </div>
                        @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{ $product->long_description }}</p>
                </div>
                 @guest
                            <div class="text-center">
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                                        <i class="material-icons">add_shopping_cart</i> Añadir al carrito
                                    </button>
                                </a>
                            </div>
                        @else
                        <div class="text-center">
                            <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#modalAddToCart">
                                <i class="material-icons">add_shopping_cart</i> Añadir al carrito
                            </button>
                        </div>                  

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="profile-tabs">
                                    <div class="nav-align-center">
                                    
                                        <div class="tab-content gallery">
                                            <div class="tab-pane active" id="studio">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @foreach ($imagesLeft as $image)
                                                        <img src="{{ $image->url }}" class="img-rounded" />
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-6">
                                                        @foreach ($imagesRight as $image)
                                                        <img src="{{ $image->url }}" class="img-rounded" />                                   
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                           
                     @endguest
               
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <!-- Modal Core -->
    <div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div class="text-center">
                         <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
                        </div>
                        
                    </div>
                    <form method="post" action="{{ url('/cart') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="modal-body">
                            <input type="number" name="quantity" value="1" class="form-control" min="1" pattern="^[0-9]+">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info btn-simple">Añadir</button>
                        </div>
                    </form>
                    </div>
                </div>
    </div>
 <!-- End Profile Tabs -->

@include('includes.footer')

@endsection
