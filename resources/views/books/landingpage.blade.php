@extends('layout.app')

@section('main')

<div class="row mx-auto">
    <div class="col-sm-7 text-center mt-5 text-white pt-5">
        <h1 class="h6 mt-5">Odralyn Del Castillo</h1>
        <h1 class="fw-bold">NEW ADVENTURE</h1>
        <h1 class="h6">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</h1>
        <h1 class="h6">sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h1>
        <a class="btn btn-light mt-3 fw-bold" href="{{ route('log') }}">Add Book Now</a>
    </div>
    <div class="col-sm-3 mt-5">
        <img class="mt-5" style="height: 300px;" src="https://derpicdn.net/img/2018/6/5/1750685/full.png" alt="Book"/>
    </div>
</div>

@endsection