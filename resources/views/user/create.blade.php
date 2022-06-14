@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Register New User</h1>
@stop

@section('content')
<form action="{{url('/user')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-5">
            <label for="name"> Username </label>
            <input type="text" class='form-control' name="name" value="{{ $user->name ?? ''}}" id="name" placeholder="">
            <br>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-5">
            <label for="email"> Email </label>
            <input type="text" class='form-control' name="email" value="{{ $user->email ?? '' }}"" id="email" placeholder="">
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <label for="password"> Password </label>
            <input type="password" class="form-control" name="password" value="{{ $user->password ?? '' }}"" id="password" placeholder="">
            <br>
        </div>
    </div>
    <!--<label for="email_verified_at"> Confirm Password </label>
    <input type="text" name="email_verified_at" value="{{ $user->email_verified_at ?? '' }}"" id="email_verified_at">
    <br>-->

        <label for="avatar" ></label>
        @if(isset($user->avatar))
        <img src="{{ asset('storage').'/'.$user->avatar}}" width=100 alt="">
        @endif
        <input type="file" name="avatar" value="" id="avatar">
        <br><br>

        <input type="submit" class="btn-success" value="Save Data">
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
