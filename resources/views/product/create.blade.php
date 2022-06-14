@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Register New Product</h1>
@stop

@section('content')

<form action="{{url('/product')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-5">
            <label for="id"> ID </label>
            <input type="text" class='form-control' name="id" value="{{ $product->id ?? ''}}" id="id" placeholder="" required>
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-5">
            <label for="title"> Tittle </label>
            <input type="text" class='form-control' name="title" value="{{ $product->title ?? '' }}"" id="title" placeholder="" required>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <label for="title"> Price </label>
            <input type="number" class='form-control' name="price" value="{{ $product->price ?? '' }}"" id="price" placeholder="" required>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <label for="category"> Category </label>
            <input type="text" class="form-control" name="category" value="{{ $product->category ?? '' }}"" id="category" placeholder="" required>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <label for="category"> Description </label>
            <input type="text" class="form-control" name="description" value="{{ $product->description ?? '' }}"" id="description" placeholder="" required>
            <br>
        </div>
    </div>
    <label for="image" ></label>
        @if(isset($product->image))
        <img src="{{ asset('storage').'/'.$product->image}}" width=100 alt="" required>
        @endif
        <input type="file" name="image" value="" id="image">
        <br><br>

        <input type="submit" class="btn-success" value="Save Data" onclick="">
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
