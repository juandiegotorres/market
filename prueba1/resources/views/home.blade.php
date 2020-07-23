@extends('layouts.app')
@section('styles')
<style>
    h3.h3 {
        text-align: center;
        margin: 1em;
        text-transform: capitalize;
        font-size: 1.7em;
    }

    /********************* Shopping Demo-9 **********************/
    .product-grid9,
    .product-grid9 .product-image9 {
        position: relative
    }

    .product-grid9 {
        font-family: Poppins, sans-serif;
        z-index: 1
    }

    .product-grid9 .product-image9 a {
        display: block
    }

    .product-grid9 .product-image9 img {
        width: 100%;
        height: auto
    }

    .product-grid9 .pic-1 {
        opacity: 1;
        transition: all .5s ease-out 0s
    }

    .product-grid9:hover .pic-1 {
        opacity: 0
    }

    .product-grid9 .pic-2 {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: all .5s ease-out 0s
    }

    .product-grid9:hover .pic-2 {
        opacity: 1
    }

    .product-grid9 .product-full-view {
        color: #505050;
        background-color: #fff;
        font-size: 16px;
        height: 45px;
        width: 45px;
        padding: 18px;
        border-radius: 100px 0 0;
        display: block;
        opacity: 0;
        position: absolute;
        right: 0;
        bottom: 0;
        transition: all .3s ease 0s
    }

    .product-grid9 .product-full-view:hover {
        color: #c0392b
    }

    .product-grid9:hover .product-full-view {
        opacity: 1
    }

    .product-grid9 .product-content {
        padding: 12px 12px 0;
        overflow: hidden;
        position: relative
    }

    .product-content .rating {
        padding: 0;
        margin: 0 0 7px;
        list-style: none
    }

    .product-grid9 .rating li {
        font-size: 12px;
        color: #ffd200;
        transition: all .3s ease 0s
    }

    .product-grid9 .rating li.disable {
        color: rgba(0, 0, 0, .2)
    }

    .product-grid9 .title {
        font-size: 16px;
        font-weight: 400;
        text-transform: capitalize;
        margin: 0 0 3px;
        transition: all .3s ease 0s
    }

    .product-grid9 .title a {
        color: rgba(0, 0, 0, .5)
    }

    .product-grid9 .title a:hover {
        color: #c0392b
    }

    .product-grid9 .price {
        color: #000;
        font-size: 17px;
        margin: 0;
        display: block;
        transition: all .5s ease 0s
    }

    .product-grid9:hover .price {
        opacity: 0
    }

    .product-grid9 .add-to-cart {
        display: block;
        color: #c0392b;
        font-weight: 600;
        font-size: 14px;
        opacity: 0;
        position: absolute;
        left: 10px;
        bottom: -20px;
        transition: all .5s ease 0s
    }

    .product-grid9:hover .add-to-cart {
        opacity: 1;
        bottom: 0
    }

    @media only screen and (max-width:990px) {
        .product-grid9 {
            margin-bottom: 30px
        }
    }
</style>
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<link href="{{ asset('css/grids.css') }}" rel="stylesheet">


<div class="container">
    <h3 class="h3">shopping Demo-9 </h3>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid9">
                <div class="product-image9">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-1.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-2.jpg">
                    </a>
                    
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">Women's Top</a></h3>
                    <div class="price"> $12.60 - $40.53</div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid9">
                <div class="product-image9">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-3.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-4.jpg">
                    </a>
                    <a href="#" class="fa fa-search product-full-view"></a>
                </div>
                <div class="product-content">
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star disable"></li>
                        <li class="fa fa-star disable"></li>
                    </ul>
                    <h3 class="title"><a href="#">Men's Shirt</a></h3>
                    <div class="price"> $10.20 </div>
                    <a class="add-to-cart" href="">READ MORE</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid9">
                <div class="product-image9">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-5.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-6.jpg">
                    </a>
                    <a href="#" class="fa fa-search product-full-view"></a>
                </div>
                <div class="product-content">
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <h3 class="title"><a href="#">Women's Top</a></h3>
                    <div class="price"> $12.60 - $40.53</div>
                    <a class="add-to-cart" href="">VIEW PRODUCTS</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid9">
                <div class="product-image9">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-7.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo6/images/img-8.jpg">
                    </a>
                    <a href="#" class="fa fa-search product-full-view"></a>
                </div>
                <div class="product-content">
                    <ul class="rating">
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                        <li class="fa fa-star"></li>
                    </ul>
                    <h3 class="title"><a href="#">Women's Top</a></h3>
                    <div class="price"> $12.60 - $40.53</div>
                    <a class="add-to-cart" href="">VIEW PRODUCTS</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
@endsection
@section('scripts')
<script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css') }}"></script>
<script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js') }}"></script>
@endsection