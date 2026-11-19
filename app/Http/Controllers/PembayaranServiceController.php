<?php
namespace App\Http\Controllers;
use App\Models\PembayaranService;
use App\Models\DaftarService;
use Illuminate\Http\Request;
class PembayaranServiceController extends Controller
{
    public function index() {
        $pembayaran = PembayaranService::with('daftarService.pelanggan')->latest()->get();
        return view('pembayaran.index', compact('pembayaran'));
    }
    public function create() {
        $daftarService = DaftarService::with('pelanggan')->whereHas('dataService')->whereDoesntHave('pembayaran')->get();
        return view('pembayaran.create', compact('daftarService'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:pembayaran_service,id_servis_pelanggan',
            'jumlah_biaya_servis'=>'required|numeric|min:0',
            'jenis_pembayaran'=>'nullable|in:Cash / Tunai,Non Tunai',
            'keterangan'=>'nullable|string',
        ]);
        PembayaranService::create($data);
        return redirect()->route('pembayaran.index')->with('success','Pembayaran berhasil disimpan.');
    }
    public function show(PembayaranService $pembayaran) {
        $pembayaran->load('daftarService.pelanggan');
        return view('pembayaran.show', compact('pembayaran'));
    }
    public function edit(PembayaranService $pembayaran) {
        $daftarService = DaftarService::with('pelanggan')->get();
        return view('pembayaran.edit', compact('pembayaran','daftarService'));
    }
    public function update(Request $request, PembayaranService $pembayaran) {
        $data = $request->validate([
            'id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:pembayaran_service,id_servis_pelanggan,'.$pembayaran->id_pembayaran.',id_pembayaran',
            'jumlah_biaya_servis'=>'required|numeric|min:0',
            'jenis_pembayaran'=>'nullable|in:Cash / Tunai,Non Tunai',
            'keterangan'=>'nullable|string',
        ]);
        $pembayaran->update($data);
        return redirect()->route('pembayaran.index')->with('success','Pembayaran berhasil diperbarui.');
    }
    public function destroy(PembayaranService $pembayaran) {
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success','Pembayaran berhasil dihapus.');
    }
}
