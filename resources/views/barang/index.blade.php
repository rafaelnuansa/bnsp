@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Daftar Barang</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">Satuan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    <tr>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ $barang->harga_jual }}</td>
                                        <td>{{ $barang->harga_beli }}</td>
                                        <td>{{ $barang->satuan }}</td>
                                        <td>
                                            <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
