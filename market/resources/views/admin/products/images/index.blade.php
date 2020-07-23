@extends('layouts.app')
@section('title', 'Imágenes de productos')
@section('body-class', 'product-page')
@section('styles')
<style>
    .h {
        padding-top: 10px;
        margin-bottom: 20px;
    }

    .e {
        margin-top: -5px;
    }
</style>
@endsection
@section('content')
<link href="{{ asset('/css/input-file.css') }}" rel="stylesheet" />
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="text-center h">
            <h2 class="title">Imagenes del producto "{{ $product->name }}"</h2>
        </div>
        <form method="post" action="" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-sm-6 ">
                    <div class="custom-file pmd-custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">

                        <label class="custom-file-label" for="photo">Seleccione una imagen...</label>

                    </div>
                </div>
                <div class="col-sm-4 e">
                    <div class="form-group label-floating">
                        <button type="submit" class="btn btn-primary btn-sm">Subir nueva imágen</button>
                        <a href="{{ url('/admin/products') }}" class="btn btn-default btn-sm">Volver</a>
                    </div>
                </div>
            </div>
        </form>
        <div class=" section text-center">
            <div class="row">

                @foreach($images as $image)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img src="{{ $image->url }}" width="250">
                            <form method="post" action="">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <button type="submit" class="btn btn-danger btn-round">Eliminar</button>
                                @if ($image->featured)
                                <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada">
                                    <i class="material-icons">favorite</i>
                                </button>
                                @else
                                <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                    <i class="material-icons">favorite</i>
                                </a>
                                @endif
                            </form>

                        </div>
                    </div>

                </div>

                @endforeach
            </div>

        </div>
    </div>
</div>

</div>

@include('includes.footer')
@section('scripts')
<script type="application/javascript">
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endsection
@endsection