@extends('layouts.base')

@section('title')
    Flower
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
            <form action="{{ route('flowers.store') }}" method="post">
                @csrf
                <h3 class="text-center">ADD Flowers</h3>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Name Flower</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name">
                </div>
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Description</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="description">
                </div>
                <div class="input-group mb-3">
                    <label for="image_url" class="input-group-text">Image</label>
                    <input type="text" aria-describedby="basic-addon1" name="image_url" id="image_url" class="form-control" placeholder="Enter image_url">
                @if($errors->has('image_url'))
                <span class="text-danger">
                    {{ $errors->first('image_url') }}
                </span>
                @endif
                </div>
                <div class="d-flex gap-2 justify-content-end ">
                    <input type="submit" name="btnAdd" value="Add" class="btn btn-success"></input>
                    <a href="{{route('flowers.index')}}" class="btn btn-warning">Back</a>
                </div>
            </form>
        </div>
    </main>
@endsection
