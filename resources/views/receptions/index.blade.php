@extends('layouts.main')

@section('container')
    <div class="card">
        <h4 class="card-header">{{ $title }}</h4>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif
            <a href="{{ route('receptions.create') }}" class="btn btn-primary">Penerimaan Barang</a>
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <td>NO</td>
                        <td>NAMA BARANG</td>
                        <td>JUMLAH</td>
                        <td>RAK</td>
                        <td>VENDOR</td>
                        <td>DATE</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($receptions as $index => $reception)
                        <tr>
                            <td>{{ $index + $receptions->firstItem() }}</td>
                            <td>{{ $reception->product->name }}</td>
                            <td>{{ $reception->amount }}</td>
                            <td>{{ $reception->rack }}</td>
                            <td>{{ $reception->vendor }}</td>
                            <td>{{ $reception->date }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Data Kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $receptions->links() }}
        </div>
    </div>
@endsection
