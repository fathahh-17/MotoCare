@extends('layouts.app')
@section('title','Edit Data Kendaraan') @section('heading','Edit Data Kendaraan') @section('crumb','Data Kendaraan')
@section('content')
<div class="panel"><div class="panel-head"><h3>Form Edit Data Kendaraan</h3><a class="btn gray" href="{{ route('kendaraan.index') }}">← Kembali</a></div>
<form method="POST" action="{{ route('kendaraan.update', $kendaraan) }}">@csrf @method("PUT")
<div class="form-grid"><div class="field"><label>Nomor Plat</label><input type="text" name="no_plat" value="{{ old('no_plat', $kendaraan?->no_plat) }}" required ></div><div class="field"><label>Jenis Kendaraan</label><div class="radio-line">@foreach(['Matic','Manual Transmisi'] as $option)<label><input type="radio" name="jenis_kendaraan" value="{{ $option }}" {{ old('jenis_kendaraan', $kendaraan?->jenis_kendaraan) == $option ? 'checked' : '' }} required> {{ $option }}</label>@endforeach</div></div><div class="field"><label>Nomor STNK</label><input type="text" name="no_stnk" value="{{ old('no_stnk', $kendaraan?->no_stnk) }}" required ></div><div class="field"><label>Tahun Pembuatan</label><input type="number" name="tahun_pembuatan" value="{{ old('tahun_pembuatan', $kendaraan?->tahun_pembuatan) }}" required min="1900" max="{{ date('Y') }}"></div><div class="field"><label>Nama Pemilik</label><input type="text" name="nama_pemilik" value="{{ old('nama_pemilik', $kendaraan?->nama_pemilik) }}" required ></div><div class="field"><label>Warna Kendaraan</label><input type="text" name="warna_kendaraan" value="{{ old('warna_kendaraan', $kendaraan?->warna_kendaraan) }}" required ></div></div>
<div style="display:flex;gap:10px;margin-top:22px"><button class="btn" type="submit">Simpan Data</button><a class="btn gray" href="{{ route('kendaraan.index') }}">Batal</a></div>
</form></div>
@endsection
@push('scripts')@endpush
