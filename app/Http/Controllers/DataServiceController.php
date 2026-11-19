<?php
namespace App\Http\Controllers;
use App\Models\DataService;
use App\Models\DaftarService;
use Illuminate\Http\Request;
class DataServiceController extends Controller
{
    public function index() {
        $dataService = DataService::with('daftarService.pelanggan')->latest()->get();
        return view('data_service.index', compact('dataService'));
    }
    public function create() {
        $daftarService = DaftarService::with('pelanggan')->whereDoesntHave('dataService')->get();
        return view('data_service.create', compact('daftarService'));
    }
    public function store(Request $request) {
        $data = $request->validate([
            'id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:data_service,id_servis_pelanggan',
            'estimasi_service'=>'required|numeric|min:0',
            'nama_mekanik'=>'required|string|max:255',
            'sparepart_pengganti'=>'nullable|string',
        ]);
        DataService::create($data);
        return redirect()->route('data-service.index')->with('success','Data service berhasil ditambahkan.');
    }
    public function show(DataService $dataService) {
        $dataService->load('daftarService.pelanggan');
        return view('data_service.show', compact('dataService'));
    }
    public function edit(DataService $dataService) {
        $daftarService = DaftarService::with('pelanggan')->get();
        return view('data_service.edit', compact('dataService','daftarService'));
    }
    public function update(Request $request, DataService $dataService) {
        $data = $request->validate([
            'id_servis_pelanggan'=>'required|exists:daftar_service,id_servis_pelanggan|unique:data_service,id_servis_pelanggan,'.$dataService->id_data_service.',id_data_service',
            'estimasi_service'=>'required|numeric|min:0',
            'nama_mekanik'=>'required|string|max:255',
            'sparepart_pengganti'=>'nullable|string',
        ]);
        $dataService->update($data);
        return redirect()->route('data-service.index')->with('success','Data service berhasil diperbarui.');
    }
    public function destroy(DataService $dataService) {
        $dataService->delete();
        return redirect()->route('data-service.index')->with('success','Data service berhasil dihapus.');
    }
}
