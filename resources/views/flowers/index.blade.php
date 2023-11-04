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
        <a class="nav-link avtive" href="{{ route('regions.index') }}">Region</a>
    </li>
@endsection

@section('main')
<main class="container vh-100 mt-5">
<h3 class="text-center">FLOWERS MANAGEMENT</h3>
    <div>    
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif     
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif   
        <  href="{{route('flowers.create')}}" class="btn btn-success">Add</>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Description</th>
                    <th class="text-center" scope="col">Image</th>
                    <th class="text-center" scope="col">Details</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Delete</th>
                </tr>
            </thead>
            @foreach ($flowers as $flower)
                <tbody> 
                    <tr>
                        <th class="text-center" scope="row">{{ $flower->id }}</th>
                        <td >{{ $flower->name }}</td>
                        <td >{{ $flower->description }}</td>
                        <td class="text-center">
                        @if(file_exists(public_path('uploads/images/' . $flower->image_url)))
                            <img style="width: 200px; height: 200px;" src="{{ asset('uploads/images/' . $flower->image_url) }}"
                                alt="flower image_url">
                        @else
                        <img style="width: 200px; height: 200px;" src="{{ $flower->image_url }}" alt="flower image_url">
                        @endif
                        </td>

                        <td class="text-center">
                        <a href="{{ route('flowers.show', ['flower' => $flower]) }}" class="btn btn-sm btn-warning">
                        <i class="fa-solid fa-eye"></i>
                        </a>
                        </td>
                        <td class="text-center">
                        <a href="{{ route('flowers.edit', ['flower' => $flower]) }}" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i>
                         </a>
                        </td>
                        
                        <td class="text-center">
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $flower->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <div class="modal fade" id="deleteModal-{{ $flower->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure you want to delete this flower has id: {{ $flower->id }}
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{route('flowers.destroy', $flower->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach

        </table>
        <div class="paginator">
            {{ $flowers->links() }}
        </div>
    </div>

   
</main>
@endsection