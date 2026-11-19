@extends('layouts.app')
@section('title','Tambah Pembayaran Service') @section('heading','Tambah Pembayaran Service') @section('crumb','Pembayaran Service')
@section('content')
<div class="panel"><div class="panel-head"><h3>Form Tambah Pembayaran Service</h3><a class="btn gray" href="{{ route('pembayaran.index') }}">← Kembali</a></div>
<form method="POST" action="{{ route('pembayaran.store') }}">@csrf 
<div class="form-grid"><div class="field"><label>ID Service Pelanggan</label><select name="id_servis_pelanggan" id="id_servis_pelanggan" required><option value="">-- Pilih ID service --</option>@foreach($daftarService as $ds)<option value="{{ $ds->id_servis_pelanggan }}" data-keluhan="{{ $ds->keluhan_kendaraan }}" {{ old('id_servis_pelanggan', null)==$ds->id_servis_pelanggan?'selected':'' }}>#{{ $ds->id_servis_pelanggan }} — {{ $ds->pelanggan->nama_lengkap ?? 'Pelanggan' }} ({{ $ds->no_plat }})</option>@endforeach</select></div><div class="field"><label>Jumlah Biaya Service (Rp)</label><input type="number" name="jumlah_biaya_servis" value="{{ old('jumlah_biaya_servis') }}" required step="0.01" min="0"></div><div class="field"><label>Jenis Pembayaran</label><div class="radio-line"><label><input type="radio" name="jenis_pembayaran" value="Cash / Tunai" {{ old('jenis_pembayaran', null) == 'Cash / Tunai' ? 'checked' : '' }}> Cash / Tunai</label><label><input type="radio" name="jenis_pembayaran" value="Non Tunai" {{ old('jenis_pembayaran', null) == 'Non Tunai' ? 'checked' : '' }}> Non Tunai</label></div></div><div class="field full"><label>Keterangan</label><textarea name="keterangan" >{{ old('keterangan') }}</textarea></div></div>
<div style="display:flex;gap:10px;margin-top:22px"><button class="btn" type="submit">Simpan Data</button><a class="btn gray" href="{{ route('pembayaran.index') }}">Batal</a></div>
</form></div>
@endsection
@push('scripts')<script>
    const serviceSelect=document.getElementById('id_servis_pelanggan'), keluhanField=document.getElementById('keluhan_otomatis');
    function updateKeluhan(){ if(!serviceSelect||!keluhanField)return; const opt=serviceSelect.options[serviceSelect.selectedIndex]; keluhanField.value=opt?.dataset.keluhan||''; }
    serviceSelect?.addEventListener('change',updateKeluhan); updateKeluhan();
    </script>@endpush
