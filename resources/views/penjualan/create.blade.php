@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Penjualan Baru</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('penjualan.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="tgl_faktur">Tanggal Faktur</label>
                            <input type="date" class="form-control" id="tgl_faktur" name="tgl_faktur" value="{{ old('tgl_faktur') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="no_faktur">No Faktur</label>
                            <input type="text" class="form-control" id="no_faktur" name="no_faktur" value="{{ old('no_faktur') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_konsumen">Nama Konsumen</label>
                            <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ old('nama_konsumen') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="kode_barang">Pilih Barang</label>
                            <select class="form-control" id="kode_barang" name="kode_barang"  required>
                                <option value="">Pilih Barang</option>
                                @foreach($barangs as $barang)
                                    <option value="{{ $barang->kode_barang }}" data-harga="{{ $barang->harga_jual }}">
                                        {{ $barang->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
