@extends('layouts.app')
@section('title','Tambah Data Pelanggan') @section('heading','Tambah Data Pelanggan') @section('crumb','Data Pelanggan')
@section('content')
<div class="panel"><div class="panel-head"><h3>Form Tambah Data Pelanggan</h3><a class="btn gray" href="{{ route('pelanggan.index') }}">← Kembali</a></div>
<form method="POST" action="{{ route('pelanggan.store') }}">@csrf 
<div class="form-grid"><div class="field"><label>Nama Lengkap</label><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required ></div><div class="field"><label>Nomor HP</label><input type="text" name="no_hp" value="{{ old('no_hp') }}" required ></div><div class="field full"><label>Alamat Pelanggan</label><textarea name="alamat_pelanggan" required>{{ old('alamat_pelanggan') }}</textarea></div><div class="field"><label>Pekerjaan</label><input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required ></div></div>
<div style="display:flex;gap:10px;margin-top:22px"><button class="btn" type="submit">Simpan Data</button><a class="btn gray" href="{{ route('pelanggan.index') }}">Batal</a></div>
</form></div>
@endsection
@push('scripts')@endpush
