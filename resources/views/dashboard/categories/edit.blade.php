@extends('layouts.app')
@section('page-content-title')
    Add Category
@endsection
@section('page-breadcrumb')
    Add Category
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', $category->name) }}">

                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3">{{ old('description', $category->description) }}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>

@endsection
