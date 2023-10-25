
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
        <form action="{{route('regions.show', ['region' => $region])}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                  <div class="bg-light rounded shadow w-50">
                    <div class="p-4 border-bottom">
                      <h3 class = "text-center ">INFOR REGIONS</h3>
                    </div>
                    <div class="p-4">
                        <div class="form-group">
                            <h6 for="name" class="form-label">ID</h6>
                            <p>{{ $region->id }}</p>
                            @if($errors->has('id'))
                            <span class="text-danger">
                              {{ $errors->first('id') }}
                            </span>
                            @endif
                          </div>
                      <div class="form-group">
                        <h6 for="name" class="form-label">Fower_Name</h6>
                        <p>{{ $region->flower_id }}</p>
                            @if($errors->has('flower_id'))
                            <span class="text-danger">
                              {{ $errors->first('flower_id') }}
                            </span>
                            @endif
                    
                      </div>
                      <div class="form-group">
                        <h6 for="region_name" class="form-label">region_name</h6>
                        <p>{{ $region->region_name }}</p>
                        @if($errors->has('region_name'))
                        <span class="text-danger">
                          {{ $errors->first('region_name') }}
                        </span>
                        @endif
                      </div>
                      <div class="d-flex gap-2 justify-content-end ">
                        <a href="{{route('regions.index')}}" class="btn btn-warning">Back</a>
                      </div>
                      
                
                    </div>
                  </div>
                </div>
            </div>
        </form>
        </div>
</main>   
@endsection 