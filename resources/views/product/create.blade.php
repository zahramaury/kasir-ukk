@extends('main')
@section('page-title', 'Tambah Produk')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Produk Baru</h2>

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input class="form-control" type="file" id="image" name="image" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stok" required>
        </div>

        <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
