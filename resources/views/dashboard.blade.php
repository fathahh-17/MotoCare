@extends('layouts.app')
@section('title','Dashboard') @section('heading','Dashboard') @section('crumb','Ringkasan')
@section('content')
<p class="muted" style="font-size:13px">Selamat datang di sistem manajemen bengkel MotoCare. Pantau aktivitas bengkel dari satu tempat.</p>
<div class="cards">
<div class="stat"><span class="stat-icon">♙</span><small>Total Pelanggan</small><strong>{{ $totalPelanggan }}</strong></div>
<div class="stat"><span class="stat-icon">🏍</span><small>Total Kendaraan</small><strong>{{ $totalKendaraan }}</strong></div>
<div class="stat"><span class="stat-icon">▤</span><small>Pendaftaran Service</small><strong>{{ $totalPendaftaran }}</strong></div>
<div class="stat"><span class="stat-icon">🔧</span><small>Service Dikerjakan</small><strong>{{ $totalPengerjaan }}</strong></div>
</div>
<div class="panel"><div class="panel-head"><h3>Pendaftaran Service Terbaru</h3><a class="btn" href="{{ route('daftar-service.create') }}">＋ Daftar Service</a></div>
<table><thead><tr><th>ID Service</th><th>Pelanggan</th><th>Nomor Plat</th><th>Tanggal</th><th>Keluhan</th></tr></thead><tbody>
@forelse($servisTerbaru as $s)<tr><td>#{{ $s->id_servis_pelanggan }}</td><td>{{ $s->pelanggan->nama_lengkap ?? '-' }}</td><td><span class="badge">{{ $s->no_plat }}</span></td><td>{{ $s->tanggal_servis }}</td><td>{{ \Illuminate\Support\Str::limit($s->keluhan_kendaraan,45) }}</td></tr>
@empty<tr><td colspan="5" class="muted">Belum ada pendaftaran service.</td></tr>@endforelse
</tbody></table></div>
<div class="panel"><div class="panel-head"><h3>Ringkasan Pembayaran</h3><a class="btn gray" href="{{ route('pembayaran.index') }}">Lihat semua</a></div>
<div class="detail"><small>Total transaksi tercatat</small><strong style="font-size:24px">{{ $totalPembayaran }} pembayaran</strong></div></div>
@endsection
