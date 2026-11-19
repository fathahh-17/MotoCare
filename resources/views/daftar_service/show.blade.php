@extends('layouts.app')
@section('title','Detail Daftar Service') @section('heading','Detail Daftar Service') @section('crumb','Daftar Service')
@section('content')
<div class="panel"><div class="panel-head"><h3>Informasi Daftar Service</h3><div class="actions"><a class="btn" href="{{ route('daftar-service.edit',$daftarService) }}">Edit</a><a class="btn gray" href="{{ route('daftar-service.index') }}">Kembali</a></div></div>
<div class="detail-grid"><div class="detail"><small>ID Service</small><strong>{{ $daftarService->id_servis_pelanggan ?? "-" }}</strong></div><div class="detail"><small>Pelanggan</small><strong>{{ $daftarService->pelanggan->nama_lengkap ?? "-" }}</strong></div><div class="detail"><small>No. Plat</small><strong>{{ $daftarService->no_plat ?? "-" }}</strong></div><div class="detail"><small>Tanggal</small><strong>{{ $daftarService->tanggal_servis ?? "-" }}</strong></div><div class="detail"><small>Keluhan</small><strong>{{ $daftarService->keluhan_kendaraan ?? "-" }}</strong></div></div></div>
@endsection
