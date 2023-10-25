@extends('layouts.base')

@section('title')
    HomePage
@endsection

@section('main')
    <div class="container-fluid text-center text-bg-info ">
        <h3>Welcome to Flower Management</h3>
    </div>
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Home Page</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('flowers.index') }}">Flower</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('regions.index') }}">Region</a>
    </li>   
      
@endsection