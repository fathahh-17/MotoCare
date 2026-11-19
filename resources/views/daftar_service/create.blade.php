@extends('layouts.app')
@section('title','Tambah Daftar Service') @section('heading','Tambah Daftar Service') @section('crumb','Daftar Service')
@section('content')
<div class="panel"><div class="panel-head"><h3>Form Tambah Daftar Service</h3><a class="btn gray" href="{{ route('daftar-service.index') }}">← Kembali</a></div>
<form method="POST" action="{{ route('daftar-service.store') }}">@csrf 
<div class="form-grid"><div class="field"><label>Nomor Plat Kendaraan</label><select name="no_plat" required><option value="">-- Pilih nomor plat --</option>@foreach($kendaraan as $k)<option value="{{ $k->no_plat }}" {{ old('no_plat', null)==$k->no_plat?'selected':'' }}>{{ $k->no_plat }} — {{ $k->nama_pemilik }}</option>@endforeach</select></div><div class="field"><label>ID Pelanggan</label><select name="id_pelanggan" id="id_pelanggan" required><option value="">-- Pilih ID pelanggan --</option>@foreach($pelanggan as $p)<option value="{{ $p->id_pelanggan }}" data-nama="{{ $p->nama_lengkap }}" {{ old('id_pelanggan', null)==$p->id_pelanggan?'selected':'' }}>{{ $p->id_pelanggan }} — {{ $p->nama_lengkap }}</option>@endforeach</select></div><div class="field"><label>Nama Pelanggan</label><input id="nama_otomatis" type="text" value="" readonly placeholder="Terisi otomatis"></div><div class="field full"><label>Keluhan Kendaraan</label><textarea name="keluhan_kendaraan" required>{{ old('keluhan_kendaraan') }}</textarea></div><div class="field"><label>Tanggal Service</label><input type="date" name="tanggal_servis" value="{{ old('tanggal_servis') }}" required ></div></div>
<div style="display:flex;gap:10px;margin-top:22px"><button class="btn" type="submit">Simpan Data</button><a class="btn gray" href="{{ route('daftar-service.index') }}">Batal</a></div>
</form></div>
@endsection
@push('scripts')<script>
    const pelangganSelect=document.getElementById('id_pelanggan'), namaField=document.getElementById('nama_otomatis');
    function updateNama(){ if(!pelangganSelect||!namaField)return; const opt=pelangganSelect.options[pelangganSelect.selectedIndex]; namaField.value=opt?.dataset.nama||''; }
    pelangganSelect?.addEventListener('change',updateNama); updateNama();
    </script>@endpush
