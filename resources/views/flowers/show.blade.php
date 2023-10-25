
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
        <form action="{{route('flowers.show', ['flower' => $flower])}}" method="post">
            @csrf
            @method('PUT')
        
            <div class="row">
                
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="d-flex gap-2 justify-content-left" mb-3 mt-5>
                        @if(file_exists(public_path('uploads/images/' . $flower->image_url)))
                        <img style="width: auto; height: auto;" src="{{ asset('uploads/images/' . $flower->image_url) }}"
                        alt="flower image_url">
                         @else
                        <img style="width: auto; height: auto;" src="{{ $flower->image_url }}" alt="flower image_url">
                        @endif
                    </div>
                  <div class="bg-light rounded shadow w-50">
                    <div class="p-4 border-bottom">
                      <h3 class = "text-center ">INFOR FLOWERS</h3>
                    </div>
                    <div class="p-4">
                        <div class="form-group">
                            <h6 for="name" class="form-label">ID</h6>
                            <p>{{ $flower->id }}</p>
                            @if($errors->has('id'))
                            <span class="text-danger">
                              {{ $errors->first('id') }}
                            </span>
                            @endif
                          </div>
                      <div class="form-group">
                        <h6 for="name" class="form-label">Name</h6>
                        <p>{{ $flower->name }}</p>
                        @if($errors->has('name'))
                        <span class="text-danger">
                          {{ $errors->first('name') }}
                        </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <h6 for="description" class="form-label">Description</h6>
                        <p>{{ $flower->description }}</p>
                        @if($errors->has('description'))
                        <span class=" text-danger">
                          {{ $errors->first('description') }}
                        </span>
                        @endif
                      </div>
                      <div class="d-flex gap-2 justify-content-end ">
                        <a href="{{route('flowers.edit', ['flower' => $flower])}}" class="btn btn-success">Edit</a>
                        <a href="{{route('flowers.index')}}" class="btn btn-warning">Back</a>
                    
                      
                  </div>
                    
                
                    </div>
                  </div>
                </div>
              </div>
            
                
            </div>
            
        </form>
    </div>
</main>   
@endsection 