@extends('layouts.app')
@section('title', 'Nueva categoría')
@section('body-class', 'product-page')
@section('styles')
<style>
    .custom-file-input {
        height: calc(1.5em + 0.75rem + 2px);
    }

    .custom-file-label {
        height: calc(1.5em + 0.75rem + 2px);
    }
</style>
@endsection
@section('content')
<link href="{{ asset('/css/input-file.css') }}" rel="stylesheet" />
<div class="header header-filter" style="background-image: url('/img/pc-background.jpg');">
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Registrar nueva categoria</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="post" action="{{ url('/admin/categories') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <div class="custom-file pmd-custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            
                            <label class="custom-file-label" for="image">Seleccione una imagen...</label>
            

                        </div>

                    </div>
                </div>

                <textarea class="form-control" placeholder="Descripción" rows="5" name="description">{{ old('description') }}</textarea>
                <button class="btn btn-primary center">Registrar</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>

            </form>
        </div>


    </div>

</div>

@include('includes.footer')
@endsection
@section('scripts')
<script type="application/javascript">
    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endsection