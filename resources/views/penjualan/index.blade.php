@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Penjualan</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Penjualan Baru</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No Faktur</th>
                                <th scope="col">Tanggal Faktur</th>
                                <th scope="col">Nama Konsumen</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Harga Total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penjualans as $penjualan)
                            <tr>
                                <td>{{ $penjualan->no_faktur }}</td>
                                <td>{{ $penjualan->tgl_faktur }}</td>
                                <td>{{ $penjualan->nama_konsumen }}</td>
                                <td>{{ $penjualan->kode_barang }}</td>
                                <td>{{ $penjualan->jumlah }}</td>
                                <td>{{ $penjualan->harga_satuan }}</td>
                                <td>{{ $penjualan->harga_total }}</td>
                                <td>
                                    <a href="{{ route('penjualan.show', $penjualan->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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
