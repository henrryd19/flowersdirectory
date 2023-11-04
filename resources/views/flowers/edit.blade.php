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
        <form action="{{route('flowers.update', ['flower' => $flower])}}" method="post">
            @csrf
            @method('PUT')
            <h3 class="text-center">EDIT FLOWERS</h3>
            <div class="text-center">
                <img class="rounded" src="{{ $flower->image_url }}" alt="" height="200px">
            </div>
            <div class="mt-4">
                <div class="input-group mb-3 mt-3">
                    <span class="input-group-text" id="basic-addon1">Id flower</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="id" value="{{$flower->id}}" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name Flower</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="name" value="{{$flower->name}}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Description</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="description"
                        value="{{ $flower->description}}">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Image</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1" name="image_url"
                        value="{{ $flower->image_url}}">
                </div>  
                <div class="d-flex gap-2 justify-content-end ">
                    <button type="submit" name="btnEdit" class="btn btn-success">Save</button>
                    <a href="{{route('flowers.index')}}" class="btn btn-warning">Back</a>
                </div>
            </div>
        </form>
    </div>
</main>   
@endsection