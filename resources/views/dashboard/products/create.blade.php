@extends('layouts.app')
@section('page-content-title')
    Products
@endsection
@section('page-breadcrumb')
    create Product
@endsection
@section('content')


            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    {{-- Category --}}
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id"
                                class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name"
                               value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" id="price"
                               value="{{ old('price') }}"
                               class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Quantity --}}
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" id="quantity"
                               value="{{ old('quantity') }}"
                               class="form-control @error('quantity') is-invalid @enderror">
                        @error('quantity')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"
                                  class="form-control @error('description') is-invalid @enderror"
                                  rows="4">{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image"
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div> {{-- /.card-body --}}

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Product
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection
