@extends('layouts.app')
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">
    Add
  </button>
    <div class="row">
      @foreach ($Categories as $category)
        <div class="card ml-4 mt-2  shadow-sm" style="width: 18rem;">
            <div class="card-body ">
                    <a href="{{ route("category_show", ["id" => $category->id]) }}">  
                            {{$category->name}}
                    </a>
                    <div class="dropdown d-inline float-right">
                        <button class="toText" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-h"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item category-edit-button" data-content="{{ $category->name }}" data-id="{{ $category->id }}">Edit</a>
                            <a class="dropdown-item">   
                                <form class="w-100 p-0" action="{{ route("category_delete", ["id" => $category->id]) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input class="w-100 toText text-left" type="submit" value="Delete">
                                </form>
                            </a>                     
                        </div>
                    </div>
            </div>
            
        </div>
        
      @endforeach
    </div>
@endsection


@section('modal')
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('category_store') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="category-update-modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="category-update-form" action="" method="POST">
                        @csrf
                        @method("PATCH")
                        <input type="text" name="name" id="category-content-modal" class="form-control" placeholder="name">
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="category-update-submit" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".category-edit-button").on("click", function(){
                $("#category-content-modal").val($(this).attr("data-content"));
                $("#category-update-form").attr("action", "/category/" + $(this).attr("data-id"));
                $("#category-update-modal").modal("show");
            });

            $("#category-update-submit").on("click", function(){
                $("#category-update-form").submit();
            });
        });
    </script>
@endsection