@extends('layouts.app')
@section('page-content-title')
    Add Category
@endsection
@section('page-breadcrumb')
    Add Category
@endsection
@section('content')


    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text"
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}">

                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description"
                          class="form-control @error('description') is-invalid @enderror"
                          rows="3">{{ old('description') }}</textarea>
            </div>
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Save
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>
    </form>

@endsection
