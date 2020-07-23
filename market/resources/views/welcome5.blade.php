@extends('layouts.app')
@section('title', 'Categorías y productos')
@section('body-class', 'landing-page')
@section('styles')

@endsection
@section('content')
<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('/css/bootstrap.css.map') }}" rel="stylesheet" />
<div class="custom-file pmd-custom-file">
    <input type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
</div>
@include('includes.footer')

@endsection