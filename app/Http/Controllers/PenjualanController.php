<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    // Menampilkan semua data penjualan
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    // Menampilkan form untuk menambahkan penjualan baru
    public function create()
    {
        $barangs = Barang::all();
        return view('penjualan.create', compact('barangs'));
    }

    // Menyimpan penjualan baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'tgl_faktur' => 'required|date',
            'no_faktur' => 'required',
            'nama_konsumen' => 'required',
            'kode_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Mengambil data barang berdasarkan kode_barang yang dipilih
        $barang = Barang::where('kode_barang', $request->kode_barang)->firstOrFail();

        // Menghitung harga total berdasarkan jumlah dan harga satuan barang
        $harga_satuan = $barang->harga_jual;
        $harga_total = $request->jumlah * $harga_satuan;

        // Menyimpan data penjualan baru
        Penjualan::create([
            'tgl_faktur' => $request->tgl_faktur,
            'no_faktur' => $request->no_faktur,
            'nama_konsumen' => $request->nama_konsumen,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $harga_satuan,
            'harga_total' => $harga_total,
        ]);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    // Menampilkan detail penjualan
    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show', compact('penjualan'));
    }

    // Menampilkan form untuk mengedit penjualan
    public function edit(Penjualan $penjualan)
    {
        $barangs = Barang::all();
        return view('penjualan.edit', compact('penjualan', 'barangs'));
    }

    // Menyimpan perubahan pada penjualan ke dalam database
    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tgl_faktur' => 'required|date',
            'no_faktur' => 'required',
            'nama_konsumen' => 'required',
            'kode_barang' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Mengambil data barang berdasarkan kode_barang yang dipilih
        $barang = Barang::where('kode_barang', $request->kode_barang)->firstOrFail();

        // Menghitung harga total berdasarkan jumlah dan harga satuan barang
        $harga_satuan = $barang->harga_jual;
        $harga_total = $request->jumlah * $harga_satuan;

        // Update data penjualan
        $penjualan->update([
            'tgl_faktur' => $request->tgl_faktur,
            'no_faktur' => $request->no_faktur,
            'nama_konsumen' => $request->nama_konsumen,
            'kode_barang' => $request->kode_barang,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $harga_satuan,
            'harga_total' => $harga_total,
        ]);

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil diperbarui.');
    }

    // Menghapus penjualan dari database
    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dihapus.');
    }
}

