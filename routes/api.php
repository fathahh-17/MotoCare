<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\PembayaranService;

// PELANGGAN
Route::get('/pelanggan', fn () => response()->json(Pelanggan::all()));
Route::post('/pelanggan', function(Request $r) {
    $d=$r->validate(['nama_lengkap'=>'required|string|max:255','no_hp'=>'required|string|max:20','alamat_pelanggan'=>'required|string','pekerjaan'=>'required|string|max:255']);
    return response()->json(Pelanggan::create($d),201);
});
Route::get('/pelanggan/{id}', fn($id) => response()->json(Pelanggan::findOrFail($id)));
Route::put('/pelanggan/{id}', function(Request $r,$id) {
    $m=Pelanggan::findOrFail($id); $m->update($r->validate(['nama_lengkap'=>'required|string|max:255','no_hp'=>'required|string|max:20','alamat_pelanggan'=>'required|string','pekerjaan'=>'required|string|max:255']));
    return response()->json($m);
});
Route::delete('/pelanggan/{id}', function($id) { Pelanggan::findOrFail($id)->delete(); return response()->json(['message'=>'Pelanggan dihapus']); });

// KENDARAAN
Route::get('/kendaraan', fn () => response()->json(Kendaraan::all()));
Route::post('/kendaraan', function(Request $r) {
    $d=$r->validate(['no_plat'=>'required|string|max:20|unique:kendaraan,no_plat','jenis_kendaraan'=>'required|in:Matic,Manual Transmisi','no_stnk'=>'required|string|max:50|unique:kendaraan,no_stnk','tahun_pembuatan'=>'required|integer|digits:4','nama_pemilik'=>'required|string|max:255','warna_kendaraan'=>'required|string|max:100']);
    return response()->json(Kendaraan::create($d),201);
});
Route::get('/kendaraan/{id}', fn($id) => response()->json(Kendaraan::findOrFail($id)));
Route::put('/kendaraan/{id}', function(Request $r,$id) {
    $m=Kendaraan::findOrFail($id); $d=$r->validate(['no_plat'=>'required|string|max:20|unique:kendaraan,no_plat,'.$m->id,'jenis_kendaraan'=>'required|in:Matic,Manual Transmisi','no_stnk'=>'required|string|max:50|unique:kendaraan,no_stnk,'.$m->id,'tahun_pembuatan'=>'required|integer|digits:4','nama_pemilik'=>'required|string|max:255','warna_kendaraan'=>'required|string|max:100']); $m->update($d); return response()->json($m);
});
Route::delete('/kendaraan/{id}', function($id) { Kendaraan::findOrFail($id)->delete(); return response()->json(['message'=>'Kendaraan dihapus']); });

// DAFTAR SERVICE
Route::get('/daftar-service', fn () => response()->json(DaftarService::with(['pelanggan','kendaraan'])->get()));
Route::post('/daftar-service', function(Request $r) {
    $d=$r->validate(['no_plat'=>'required|exists:kendaraan,no_plat','id_pelanggan'=>'required|exists:pelanggan,id_pelanggan','keluhan_kendaraan'=>'required|string','tanggal_servis'=>'required|date']);
    return response()->json(DaftarService::create($d),201);
});
Route::get('/daftar-service/{id}', fn($id) => response()->json(DaftarService::with(['pelanggan','kendaraan'])->findOrFail($id)));
Route::put('/daftar-service/{id}', function(Request $r,$id) {
    $m=DaftarService::findOrFail($id); $m->update($r->validate(['no_plat'=>'required|exists:kendaraan,no_plat','id_pelanggan'=>'required|exists:pelanggan,id_pelanggan','keluhan_kendaraan'=>'required|string','tanggal_servis'=>'required|date'])); return response()->json($m);
});
Route::delete('/daftar-service/{id}', function($id) { DaftarService::findOrFail($id)->delete(); return response()->json(['message'=>'Pendaftaran dihapus']); });

// DATA SERVICE
Route::get('/data-service', fn () => response()->json(DataService::with('daftarService.pelanggan')->get()));
Route::post('/data-service', function(Request $r) {
    $d=$r->validate(['id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:data_service,id_servis_pelanggan','estimasi_service'=>'required|numeric|min:0','nama_mekanik'=>'required|string|max:255','sparepart_pengganti'=>'nullable|string']);
    return response()->json(DataService::create($d),201);
});
Route::get('/data-service/{id}', fn($id) => response()->json(DataService::with('daftarService.pelanggan')->findOrFail($id)));
Route::put('/data-service/{id}', function(Request $r,$id) {
    $m=DataService::findOrFail($id); $d=$r->validate(['id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:data_service,id_servis_pelanggan,'.$m->id_data_service.',id_data_service','estimasi_service'=>'required|numeric|min:0','nama_mekanik'=>'required|string|max:255','sparepart_pengganti'=>'nullable|string']); $m->update($d); return response()->json($m);
});
Route::delete('/data-service/{id}', function($id) { DataService::findOrFail($id)->delete(); return response()->json(['message'=>'Data service dihapus']); });

// PEMBAYARAN
Route::get('/pembayaran', fn () => response()->json(PembayaranService::with('daftarService.pelanggan')->get()));
Route::post('/pembayaran', function(Request $r) {
    $d=$r->validate(['id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:pembayaran_service,id_servis_pelanggan','jumlah_biaya_servis'=>'required|numeric|min:0','jenis_pembayaran'=>'nullable|in:Cash / Tunai,Non Tunai','keterangan'=>'nullable|string']);
    return response()->json(PembayaranService::create($d),201);
});
Route::get('/pembayaran/{id}', fn($id) => response()->json(PembayaranService::with('daftarService.pelanggan')->findOrFail($id)));
Route::put('/pembayaran/{id}', function(Request $r,$id) {
    $m=PembayaranService::findOrFail($id); $d=$r->validate(['id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:pembayaran_service,id_servis_pelanggan,'.$m->id_pembayaran.',id_pembayaran','jumlah_biaya_servis'=>'required|numeric|min:0','jenis_pembayaran'=>'nullable|in:Cash / Tunai,Non Tunai','keterangan'=>'nullable|string']); $m->update($d); return response()->json($m);
});
Route::delete('/pembayaran/{id}', function($id) { PembayaranService::findOrFail($id)->delete(); return response()->json(['message'=>'Pembayaran dihapus']); });
