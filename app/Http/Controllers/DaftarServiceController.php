<?php
namespace App\Http\Controllers;
use App\Models\DaftarService;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
class DaftarServiceController extends Controller
{
    public function index() {
        $daftarService = DaftarService::with(['pelanggan','kendaraan'])->latest()->get();
        return view('daftar_service.index', compact('daftarService'));
    }
    public function create() {
        $pelanggan=Pelanggan::orderBy('nama_lengkap')->get();
        $kendaraan=Kendaraan::orderBy('no_plat')->get();
        return view('daftar_service.create', compact('pelanggan','kendaraan'));
    }
    public function store(Request $request) {
        $data=$request->validate([
            'no_plat'=>'required|exists:kendaraan,no_plat',
            'id_pelanggan'=>'required|exists:pelanggan,id_pelanggan',
            'keluhan_kendaraan'=>'required|string',
            'tanggal_servis'=>'required|date',
        ]);
        DaftarService::create($data);
        return redirect()->route('daftar-service.index')->with('success','Pendaftaran service berhasil ditambahkan.');
    }
    public function show(DaftarService $daftarService) {
        $daftarService->load(['pelanggan','kendaraan']);
        return view('daftar_service.show',compact('daftarService'));
    }
    public function edit(DaftarService $daftarService) {
        $pelanggan=Pelanggan::orderBy('nama_lengkap')->get();
        $kendaraan=Kendaraan::orderBy('no_plat')->get();
        return view('daftar_service.edit',compact('daftarService','pelanggan','kendaraan'));
    }
    public function update(Request $request, DaftarService $daftarService) {
        $data=$request->validate([
            'no_plat'=>'required|exists:kendaraan,no_plat',
            'id_pelanggan'=>'required|exists:pelanggan,id_pelanggan',
            'keluhan_kendaraan'=>'required|string',
            'tanggal_servis'=>'required|date',
        ]);
        $daftarService->update($data);
        return redirect()->route('daftar-service.index')->with('success','Pendaftaran service berhasil diperbarui.');
    }
    public function destroy(DaftarService $daftarService) {
        try { $daftarService->delete(); }
        catch (\Illuminate\Database\QueryException $e) {
            return back()->with('error','Data tidak dapat dihapus karena sudah memiliki data pengerjaan atau pembayaran.');
        }
        return redirect()->route('daftar-service.index')->with('success','Pendaftaran service berhasil dihapus.');
    }
    public function getPelanggan($id) {
        $pelanggan=Pelanggan::findOrFail($id);
        return response()->json(['id_pelanggan'=>$pelanggan->id_pelanggan,'nama_lengkap'=>$pelanggan->nama_lengkap]);
    }
}
