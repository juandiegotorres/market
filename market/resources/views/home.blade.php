@extends('layouts.app')
@section('title', 'JT Store | Panel de control')
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('/img/pc-background.jpg');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Panel de control</h2>
            @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
            @endif

            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">shopping_cart</i>
                        Carrito de compras
                    </a>
                </li>
                <li>
                    <a href="#tasks" role="tab" data-toggle="tab">
                        <i class="material-icons">list</i>
                        Pedidos realizados
                    </a>
                </li>
            </ul>
            <hr>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane active" id="dashboard" role="tabpanel" aria-labelledby="home-tab">
                    @foreach (auth()->user()->cart->details as $detail)
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="col-md-2 text-left">Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad </th>
                                <th>Subtotal </th>
                                <th class="text-right">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="text-left">
                                    <img src="{{ $detail->product->featured_image_url }}" class="img-raised img-rounded" height="50">
                                </td>
                                <td class="text-left">
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                                </td>
                                <td>${{ $detail->product->price }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>${{ $detail->quantity * $detail->product->price }}</td>
                                <td class="td-actions text-right">

                                    <form method="post" action="{{ url('/cart') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}"></input>
                                        <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                    @endforeach
                    @if(isset($detail))
                    <h4 class="text-right"><strong>Total: ${{ auth()->user()->cart->total }}</strong></h4>
                    <div class="text-center">
                        <form method="post" action="{{ url('/order') }}">
                            {{ csrf_field() }}
                            <button class="btn btn-primary ">
                                <i class="material-icons">done</i> Realizar pedido
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                <div class="tab-pane" id="tasks" role="tabpanel" aria-labelledby="home-tab">
                    @foreach (auth()->user()->cartPending->details as $detail)
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">#</th>
                                <th class="col-md-2 text-left">Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad </th>
                                <th>Subtotal </th>
                                <th class="text-right">Fecha y Hora</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="text-left">
                                    <img src="{{ $detail->product->featured_image_url }}" class="img-raised img-rounded" height="50">
                                </td>
                                <td class="text-left">
                                    <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                                </td>
                                <td>${{ $detail->product->price }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>${{ $detail->quantity * $detail->product->price }}</td>
                                <td class="text-right">{{ $detail->created_at}}</td>
                            </tr>

                        </tbody>
                    </table>
                    @endforeach
                </div>

            </div>



            <!-- <p>Tu carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos</p> -->
            <!-- @foreach (auth()->user()->cartPending->details as $detail)
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-left">#</th>
                        <th class="col-md-2 text-left">Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad </th>
                        <th>Subtotal </th>
                        <th class="text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td class="text-left">
                            <img src="{{ $detail->product->featured_image_url }}" class="img-raised img-rounded" height="50">
                        </td>
                        <td class="text-left">
                            <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank">{{ $detail->product->name }}</a>
                        </td>
                        <td>${{ $detail->product->price }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>${{ $detail->quantity * $detail->product->price }}</td>
                        <td class="td-actions text-right">

                            <form method="post" action="{{ url('/cart') }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}"></input>
                                <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                </a>
                                <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>

                        </td>
                    </tr>

                </tbody>
            </table>
            @endforeach -->

        </div>


    </div>

</div>

@include('includes.footer')

@endsection