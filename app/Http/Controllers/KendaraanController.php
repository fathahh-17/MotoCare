<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan seluruh kendaraan
    public function index()
    {
        $kendaraan = Kendaraan::latest()->get();

        return view('kendaraan.index', compact('kendaraan'));
    }

    // Form tambah kendaraan
    public function create()
    {
        return view('kendaraan.create');
    }

    // Menyimpan kendaraan
    public function store(Request $request)
    {
        $request->validate([
            'no_plat' => 'required|string|max:20|unique:kendaraan,no_plat',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:50|unique:kendaraan,no_stnk',
            'tahun_pembuatan' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:100',
        ]);

        Kendaraan::create($request->all());

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil ditambahkan!');
    }

    // Detail kendaraan
    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    // Form edit kendaraan
    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.edit', compact('kendaraan'));
    }

    // Memperbarui kendaraan
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'no_plat' => 'required|string|max:20|unique:kendaraan,no_plat,' . $kendaraan->id,
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required|string|max:50|unique:kendaraan,no_stnk,' . $kendaraan->id,
            'tahun_pembuatan' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'nama_pemilik' => 'required|string|max:255',
            'warna_kendaraan' => 'required|string|max:100',
        ]);

        $kendaraan->update($request->all());

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil diperbarui!');
    }

    // Menghapus kendaraan
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect()
            ->route('kendaraan.index')
            ->with('success', 'Data kendaraan berhasil dihapus!');
    }
}
