@extends('main')
@section('page-title', 'Product')

@section('content')
<div class="mb-5">
    <a class="btn btn-primary" href="{{ route('product.create') }}">Tambah Product</a>
</div>

<table class="table">
    <thead>
        <tr>
            <th class="px-3 py-3" scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">Nama Product</th>
            <th scope="col">Harga</th>
            <th scope="col">Stok</th>
            <th class="px-3 py-2 text-center" scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
        <tr>
            <th scope="row">{{ $index + 1 }}</th>
            <td>
                <img src="{{ asset('storage/' . $product->image) }}" width="80" alt="product image">
            </td>
            <td>{{ $product->name }}</td>
            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
            <td>{{ $product->stok }}</td>
            <td>
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning me-3">Edit</a>

                <!-- Tombol buka modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateStockModal{{ $product->id }}">
                    Update Stock
                </button>

                <!-- Hapus -->
                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger ms-3">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal diletakkan di luar table -->
@foreach ($products as $product)
<div class="modal fade" id="updateStockModal{{ $product->id }}" tabindex="-1" aria-labelledby="updateStockModalLabel{{ $product->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('product.updateStock', $product->id) }}" method="POST" class="modal-content">
        @csrf
        @method('PATCH')
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="updateStockModalLabel{{ $product->id }}">Update Stock</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" value="{{ $product->name }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock Baru</label>
                <input type="number" name="stok" class="form-control" value="{{ $product->stok }}" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary me-3" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary ms-5">Simpan</button>
        </div>
    </form>
  </div>
</div>
@endforeach
@endsection
