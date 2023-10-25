@extends('layouts.base')

@section('title')
    Region
@endsection

@section('page_active')
    <li class="nav-item">
        <a class="nav-link" href="">Home Page</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('flowers.index') }}">Flower</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('regions.index') }}">Region</a>
    </li>
@endsection

@section('main')
    <main class="container vh-100 mt-5">
        <div>
            <form action="{{ route('regions.store') }}" method="post">
                @csrf
                <h3 class="text-center">ADD Regions</h3>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Flowers ID</label>
                    <select class="form-select" name="nameFlower" id="inputGroupSelect01">
                        @foreach ($flowers as $flower)
                            <option>{{ $flower->name}}</option>;
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">region_name</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="region_name">
                </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="btnAdd" value="Add" class="btn btn-success"></input>
                    <a href="{{route('regions.index')}}" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </main>
@endsection