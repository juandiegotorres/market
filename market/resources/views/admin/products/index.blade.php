@extends('layouts.app')
@section('title', 'Listado de productos')
@section('styles')
<style>
    .team {
        margin-top: 17px;
        margin-bottom: 20px;
    }

</style>
@endsection
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('/img/abstract.jpg');">
</div>

<div class="main main-raised">
    <div class="container">


        <div class="section text-center">
            <h2 class="title">Lista de productos</h2>

            <div class="team">
                <div class="row">

                    <!-- <a href="{{ url('/admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a> -->
                </div>
                <a href="{{ url('/admin/products/create') }}" class="btn btn-primary">Nuevo Producto</a>
                </div>

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="col-md-2 text-left">Nombre</th>
                        <th class="col-md-5 text-left">Descripción</th>
                        <th class="text-left">Categoría</th>
                        <th class="text-left">Precio</th>
                        <th class="text-right">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                    <tr>
                        <td class="text-left">{{ ($key+1) }}</td>
                        <td class="text-left">{{ $product->name }}</td>
                        <td class='col-md-4 text-left'>{{ $product->description }}</td>
                        <td class="text-left">{{ $product->category->name }}</td>
                        <td class="text-right">${{ $product->price }}</td>
                        <td class="td-actions text-right">

                            <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ url('/products/'.$product->id) }}" target="_blank" rel="tooltip" title="Ver" class="btn btn-info btn-simple btn-xs">
                                    <i class="fa fa-info"></i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url('/admin/products/'.$product->id.'/images') }}" rel="tooltip" title="Imagenes  del producto" class="btn btn-warning btn-simple btn-xs">
                                    <i class="fa fa-image"></i>
                                </a>
                                <button type="button" rel="tooltip" title="Remove" class="btn btn-simple btn-danger btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}



        </div>

    </div>

</div>

@include('includes.footer')

@endsection