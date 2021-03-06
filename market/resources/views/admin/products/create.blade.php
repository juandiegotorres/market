@extends('layouts.app')
@section('title', 'Nuevo producto')
@section('body-class', 'product-page')
@section('content')
<div class="header header-filter" style="background-image: url('/img/pc-background.jpg');">
</div>

<div class="main main-raised">
<div class="container">
   
    <div class="section">
        <h2 class="title text-center">Registrar nuevo producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ url('/admin/products') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Nombre del producto</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price') }}">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group label-floating">
                        <label class="control-label">Categoría</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
                <div class="form-group label-floating">
                    <label class="control-label">Descripcion corta</label>
                    <input type="text" class="form-control" name="description" value="{{ old('description') }}"> 
                </div>

          
                <textarea class="form-control" placeholder="Descripcion extensa" rows="5" name="long_description">{{ old('long_description') }}</textarea>
               
                        
                <button class="btn btn-primary center">Registrar</button>
                <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
             
        </form>        
    </div>


</div>

</div>

@include('includes.footer')
@endsection
