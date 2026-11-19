@extends('layouts.app')
@section('title','Detail Data Pelanggan') @section('heading','Detail Data Pelanggan') @section('crumb','Data Pelanggan')
@section('content')
<div class="panel"><div class="panel-head"><h3>Informasi Data Pelanggan</h3><div class="actions"><a class="btn" href="{{ route('pelanggan.edit',$pelanggan) }}">Edit</a><a class="btn gray" href="{{ route('pelanggan.index') }}">Kembali</a></div></div>
<div class="detail-grid"><div class="detail"><small>ID</small><strong>{{ $pelanggan->id_pelanggan ?? "-" }}</strong></div><div class="detail"><small>Nama Lengkap</small><strong>{{ $pelanggan->nama_lengkap ?? "-" }}</strong></div><div class="detail"><small>No. HP</small><strong>{{ $pelanggan->no_hp ?? "-" }}</strong></div><div class="detail"><small>Alamat</small><strong>{{ $pelanggan->alamat_pelanggan ?? "-" }}</strong></div><div class="detail"><small>Pekerjaan</small><strong>{{ $pelanggan->pekerjaan ?? "-" }}</strong></div></div></div>
@endsection
