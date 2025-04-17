@extends('main')
@section('page-title', 'Edit Produk')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Produk</h2>

    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label><br>
            <img src="{{ asset('storage/'.$product->image) }}" width="100" class="mb-2">
            <input class="form-control" type="file" id="image" name="image">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stok" value="{{ $product->stok }}" required>
        </div>

        <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
