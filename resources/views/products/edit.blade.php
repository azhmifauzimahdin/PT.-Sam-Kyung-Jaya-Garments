@extends('layouts.main')

@section('container')
    <div class="card">
        <h3 class="card-header">{{ $title }}</h3>
        <div class="card-body">
            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">Kode</label>
                    <input type="text" name="id" class="form-control" value="{{ old('id', $product->id) }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Barang</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $product->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                        value="{{ old('price', $product->price) }}">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Edit</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
