@extends('layouts.app')
@section('title','Detail Data Kendaraan') @section('heading','Detail Data Kendaraan') @section('crumb','Data Kendaraan')
@section('content')
<div class="panel"><div class="panel-head"><h3>Informasi Data Kendaraan</h3><div class="actions"><a class="btn" href="{{ route('kendaraan.edit',$kendaraan) }}">Edit</a><a class="btn gray" href="{{ route('kendaraan.index') }}">Kembali</a></div></div>
<div class="detail-grid"><div class="detail"><small>No. Plat</small><strong>{{ $kendaraan->no_plat ?? "-" }}</strong></div><div class="detail"><small>Jenis</small><strong>{{ $kendaraan->jenis_kendaraan ?? "-" }}</strong></div><div class="detail"><small>No. STNK</small><strong>{{ $kendaraan->no_stnk ?? "-" }}</strong></div><div class="detail"><small>Tahun</small><strong>{{ $kendaraan->tahun_pembuatan ?? "-" }}</strong></div><div class="detail"><small>Pemilik</small><strong>{{ $kendaraan->nama_pemilik ?? "-" }}</strong></div><div class="detail"><small>Warna</small><strong>{{ $kendaraan->warna_kendaraan ?? "-" }}</strong></div></div></div>
@endsection
