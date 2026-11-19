@extends('layouts.app')
@section('title','Detail Pembayaran Service') @section('heading','Detail Pembayaran Service') @section('crumb','Pembayaran Service')
@section('content')
<div class="panel"><div class="panel-head"><h3>Informasi Pembayaran Service</h3><div class="actions"><a class="btn" href="{{ route('pembayaran.edit',$pembayaran) }}">Edit</a><a class="btn gray" href="{{ route('pembayaran.index') }}">Kembali</a></div></div>
<div class="detail-grid"><div class="detail"><small>ID Pembayaran</small><strong>{{ $pembayaran->id_pembayaran ?? "-" }}</strong></div><div class="detail"><small>ID Service</small><strong>{{ $pembayaran->id_servis_pelanggan ?? "-" }}</strong></div><div class="detail"><small>Pelanggan</small><strong>{{ $pembayaran->daftarService->pelanggan->nama_lengkap ?? "-" }}</strong></div><div class="detail"><small>Jumlah Biaya</small><strong>{{ $pembayaran->jumlah_biaya_servis ?? "-" }}</strong></div><div class="detail"><small>Jenis</small><strong>{{ $pembayaran->jenis_pembayaran ?? "-" }}</strong></div></div></div>
@endsection
