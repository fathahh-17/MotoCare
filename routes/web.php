<?php
use Illuminate\Support\Facades\Route;
use App\Models\Pelanggan;
use App\Models\Kendaraan;
use App\Models\DaftarService;
use App\Models\DataService;
use App\Models\PembayaranService;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\DaftarServiceController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\PembayaranServiceController;

Route::get('/', function () {
    return view('dashboard', [
        'totalPelanggan'=>Pelanggan::count(),
        'totalKendaraan'=>Kendaraan::count(),
        'totalPendaftaran'=>DaftarService::count(),
        'totalPengerjaan'=>DataService::count(),
        'totalPembayaran'=>PembayaranService::count(),
        'pembayaranTerbaru'=>PembayaranService::with('daftarService.pelanggan')->latest()->take(5)->get(),
        'servisTerbaru'=>DaftarService::with(['pelanggan','kendaraan'])->latest()->take(5)->get(),
    ]);
})->name('dashboard');

Route::resource('pelanggan', PelangganController::class);
Route::resource('kendaraan', KendaraanController::class);
Route::get('/get-pelanggan/{id}', [DaftarServiceController::class,'getPelanggan'])->name('get-pelanggan');
Route::resource('daftar-service', DaftarServiceController::class)->parameters(['daftar-service' => 'daftarService']);
Route::resource('data-service', DataServiceController::class)->parameters(['data-service' => 'dataService']);
Route::resource('pembayaran', PembayaranServiceController::class);
