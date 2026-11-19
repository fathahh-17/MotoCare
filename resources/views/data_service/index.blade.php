@extends('layouts.app')
@section('title','Data Service') @section('heading','Data Service') @section('crumb','Data Service')
@section('content')
<div class="panel">
  <div class="panel-head"><div><h3>Daftar Data Service</h3><p class="muted" style="font-size:12px;margin:6px 0 0">Kelola informasi data service MotoCare.</p></div><a class="btn" href="{{ route('data-service.create') }}">＋ Tambah Data</a></div>
  <div style="overflow-x:auto"><table><thead><tr><th>ID Data</th><th>ID Service</th><th>Pelanggan</th><th>Estimasi</th><th>Mekanik</th><th>Sparepart</th><th>Aksi</th></tr></thead><tbody>
  @forelse($dataService as $item)<tr><td>{{ $item->id_data_service ?? "-" }}</td><td>{{ $item->id_servis_pelanggan ?? "-" }}</td><td>{{ $item->daftarService->pelanggan->nama_lengkap ?? "-" }}</td><td>{{ $item->estimasi_service ?? "-" }}</td><td>{{ $item->nama_mekanik ?? "-" }}</td><td>{{ $item->sparepart_pengganti ?? "-" }}</td><td><div class="actions">
  <a class="btn gray small" href="{{ route('data-service.show',$item) }}">Detail</a>
  <a class="btn small" href="{{ route('data-service.edit',$item) }}">Edit</a>
  <form method="POST" action="{{ route('data-service.destroy',$item) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn red small">Hapus</button></form>
  </div></td></tr>
  @empty<tr><td colspan="7" class="muted" style="text-align:center;padding:28px">Belum ada data. Klik Tambah Data untuk mulai mengisi.</td></tr>@endforelse
  </tbody></table></div>
</div>
@endsection
