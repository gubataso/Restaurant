@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('food_store') }}">
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
    <div class="row mb-3">
        <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

        <div class="col-md-6">
            <select name="category_id" id="category">
                <option value="" selected disabled>
                    Select Category
                </option>
                @foreach ($Categories as $category)
                    <option value="{{ $category->id }}" @if($SelectedCategory == $category->id ) selected @endif>
                        {{ $category->name }}
                    
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>  
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Create') }}
            </button>
        </div>
    </div>
</form>
@endsection