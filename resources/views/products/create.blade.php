@extends('Layout.master')

@section('content')

<div class="container col-6">
    <h2 class="text-center my-4">Create New Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required />
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary">Save Product</button>
    </form>
</div>

@endsection
