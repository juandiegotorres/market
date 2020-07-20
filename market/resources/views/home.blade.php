@extends('layouts.app')
@section('title', 'JT Store | Dashboard')
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('https://www.digitalplatforms.co.za/wp-content/uploads/2015/11/Website-Design-Background.jpg');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Dashboard</h2>
            @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
            @endif

            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                <li class="active">
                    <a href="#dashboard" role="tab" data-toggle="tab">
                        <i class="material-icons">dashboard</i>
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
            <!-- <p>Tu carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos</p> -->
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
                            <img src="{{ $detail->product->featured_image_url }}" class="img-raised img-circle" height="50">
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
                    @endforeach
                </tbody>
            </table>

            @if(isset($detail))
            <div class="text-center">
                <form method="post" action="{{ url('/order') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-primary btn-round">
                        <i class="material-icons">done</i> Realizar pedido
                    </button>
                </form>
            </div>
            @endif
        </div>


    </div>

</div>

@include('includes.footer')

@endsection