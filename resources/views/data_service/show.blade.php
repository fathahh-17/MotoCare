@extends('layouts.app')
@section('title','Detail Data Service') @section('heading','Detail Data Service') @section('crumb','Data Service')
@section('content')
<div class="panel"><div class="panel-head"><h3>Informasi Data Service</h3><div class="actions"><a class="btn" href="{{ route('data-service.edit',$dataService) }}">Edit</a><a class="btn gray" href="{{ route('data-service.index') }}">Kembali</a></div></div>
<div class="detail-grid"><div class="detail"><small>ID Data</small><strong>{{ $dataService->id_data_service ?? "-" }}</strong></div><div class="detail"><small>ID Service</small><strong>{{ $dataService->id_servis_pelanggan ?? "-" }}</strong></div><div class="detail"><small>Pelanggan</small><strong>{{ $dataService->daftarService->pelanggan->nama_lengkap ?? "-" }}</strong></div><div class="detail"><small>Estimasi</small><strong>{{ $dataService->estimasi_service ?? "-" }}</strong></div><div class="detail"><small>Mekanik</small><strong>{{ $dataService->nama_mekanik ?? "-" }}</strong></div><div class="detail"><small>Sparepart</small><strong>{{ $dataService->sparepart_pengganti ?? "-" }}</strong></div></div></div>
@endsection
