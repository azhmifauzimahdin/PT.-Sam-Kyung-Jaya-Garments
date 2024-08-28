@extends('layouts.main')

@section('container')
    <div class="card">
        <h4 class="card-header">{{ $title }}</h4>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah Data</a>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <td>KODE</td>
                        <td>NAMA</td>
                        <td>HARGA</td>
                        <td>STOK</td>
                        <td>AKSI</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?')"
                                    action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data empty.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
