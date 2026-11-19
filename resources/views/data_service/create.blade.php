@extends('layouts.app')
@section('title','Tambah Data Service') @section('heading','Tambah Data Service') @section('crumb','Data Service')
@section('content')
<div class="panel"><div class="panel-head"><h3>Form Tambah Data Service</h3><a class="btn gray" href="{{ route('data-service.index') }}">← Kembali</a></div>
<form method="POST" action="{{ route('data-service.store') }}">@csrf 
<div class="form-grid"><div class="field"><label>ID Service Pelanggan</label><select name="id_servis_pelanggan" id="id_servis_pelanggan" required><option value="">-- Pilih ID service --</option>@foreach($daftarService as $ds)<option value="{{ $ds->id_servis_pelanggan }}" data-keluhan="{{ $ds->keluhan_kendaraan }}" {{ old('id_servis_pelanggan', null)==$ds->id_servis_pelanggan?'selected':'' }}>#{{ $ds->id_servis_pelanggan }} — {{ $ds->pelanggan->nama_lengkap ?? 'Pelanggan' }} ({{ $ds->no_plat }})</option>@endforeach</select></div><div class="field"><label>Keluhan Kendaraan</label><input id="keluhan_otomatis" type="text" value="" readonly placeholder="Terisi otomatis"></div><div class="field"><label>Estimasi Service (Rp)</label><input type="number" name="estimasi_service" value="{{ old('estimasi_service') }}" required step="0.01" min="0"></div><div class="field"><label>Nama Mekanik</label><input type="text" name="nama_mekanik" value="{{ old('nama_mekanik') }}" required ></div><div class="field full"><label>Sparepart Pengganti</label><textarea name="sparepart_pengganti" >{{ old('sparepart_pengganti') }}</textarea></div></div>
<div style="display:flex;gap:10px;margin-top:22px"><button class="btn" type="submit">Simpan Data</button><a class="btn gray" href="{{ route('data-service.index') }}">Batal</a></div>
</form></div>
@endsection
@push('scripts')<script>
    const serviceSelect=document.getElementById('id_servis_pelanggan'), keluhanField=document.getElementById('keluhan_otomatis');
    function updateKeluhan(){ if(!serviceSelect||!keluhanField)return; const opt=serviceSelect.options[serviceSelect.selectedIndex]; keluhanField.value=opt?.dataset.keluhan||''; }
    serviceSelect?.addEventListener('change',updateKeluhan); updateKeluhan();
    </script>@endpush
