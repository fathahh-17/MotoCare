@extends('layouts.app')
@section('title','Daftar Service') @section('heading','Daftar Service') @section('crumb','Daftar Service')
@section('content')
<div class="panel">
  <div class="panel-head"><div><h3>Daftar Daftar Service</h3><p class="muted" style="font-size:12px;margin:6px 0 0">Kelola informasi daftar service MotoCare.</p></div><a class="btn" href="{{ route('daftar-service.create') }}">＋ Tambah Data</a></div>
  <div style="overflow-x:auto"><table><thead><tr><th>ID Service</th><th>Pelanggan</th><th>No. Plat</th><th>Tanggal</th><th>Keluhan</th><th>Aksi</th></tr></thead><tbody>
  @forelse($daftarService as $item)<tr><td>{{ $item->id_servis_pelanggan ?? "-" }}</td><td>{{ $item->pelanggan->nama_lengkap ?? "-" }}</td><td>{{ $item->no_plat ?? "-" }}</td><td>{{ $item->tanggal_servis ?? "-" }}</td><td>{{ $item->keluhan_kendaraan ?? "-" }}</td><td><div class="actions">
  <a class="btn gray small" href="{{ route('daftar-service.show',$item) }}">Detail</a>
  <a class="btn small" href="{{ route('daftar-service.edit',$item) }}">Edit</a>
  <form method="POST" action="{{ route('daftar-service.destroy',$item) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn red small">Hapus</button></form>
  </div></td></tr>
  @empty<tr><td colspan="6" class="muted" style="text-align:center;padding:28px">Belum ada data. Klik Tambah Data untuk mulai mengisi.</td></tr>@endforelse
  </tbody></table></div>
</div>
@endsection
