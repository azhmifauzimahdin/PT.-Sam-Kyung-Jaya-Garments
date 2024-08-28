@extends('layouts.main')

@section('container')
    <div class="card">
        <h3 class="card-header">{{ $title }}</h3>
        <div class="card-body">
            <form action="{{ route('receptions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">Kode Barang</label>
                    <select class="form-select" aria-label="Default select example" name="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah</label>
                    <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror"
                        value="{{ old('amount') }}">
                    @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rack" class="form-label">Rack</label>
                    <input type="string" name="rack" class="form-control @error('rack') is-invalid @enderror"
                        value="{{ old('rack') }}">
                    @error('rack')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="vendor" class="form-label">Vendor</label>
                    <input type="text" name="vendor" class="form-control @error('vendor') is-invalid @enderror"
                        value="{{ old('vendor') }}">
                    @error('vendor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="datetime-local" name="date" class="form-control @error('date') is-invalid @enderror"
                        value="{{ old('date') }}">
                    @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
