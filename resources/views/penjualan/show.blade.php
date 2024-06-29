@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Penjualan</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="tgl_faktur">Tanggal Faktur</label>
                        <input type="text" class="form-control" id="tgl_faktur" name="tgl_faktur" value="{{ $penjualan->tgl_faktur }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="no_faktur">No Faktur</label>
                        <input type="text" class="form-control" id="no_faktur" name="no_faktur" value="{{ $penjualan->no_faktur }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama_konsumen">Nama Konsumen</label>
                        <input type="text" class="form-control" id="nama_konsumen" name="nama_konsumen" value="{{ $penjualan->nama_konsumen }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $penjualan->kode_barang }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ $penjualan->jumlah }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="text" class="form-control" id="harga_satuan" name="harga_satuan" value="{{ $penjualan->harga_satuan }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="harga_total">Harga Total</label>
                        <input type="text" class="form-control" id="harga_total" name="harga_total" value="{{ $penjualan->harga_total }}" readonly>
                    </div>

                    <a href="{{ route('penjualan.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
