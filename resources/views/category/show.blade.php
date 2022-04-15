@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        <p class="lead">{{ $category->name }}</p>
    </div>
    <div class="container " >
        <div>
            <a href="{{ route('food_create',['category' => $category->id]) }}"><button>ADD</button></a>
        </div>
        <div class="row">
            @foreach ($category->Foods as $food)
                
                    <div class="card ml-4 mt-2" style="width: 18rem;">
                        <div class="card-body">
                            <a href="{{ route("category_show", ["id" => $category->id]) }}">{{ $food->name }}</a> 
                            <div class="dropdown d-inline float-right">
                                <button class="toText" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item category-edit-button" data-content="{{ $food->name }}" data-id="{{ $food->id }}">Edit</a>
                                    <a class="dropdown-item">
                                        <form class="w-100 p-0" action="{{ route("food_delete", ["id" => $food->id]) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <input class="w-100 toText toText text-left" type="submit" value="Delete">
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>   
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('modal')
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