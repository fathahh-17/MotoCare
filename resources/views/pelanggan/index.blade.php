@extends('layouts.app')
@section('title','Data Pelanggan') @section('heading','Data Pelanggan') @section('crumb','Data Pelanggan')
@section('content')
<div class="panel">
  <div class="panel-head"><div><h3>Daftar Data Pelanggan</h3><p class="muted" style="font-size:12px;margin:6px 0 0">Kelola informasi data pelanggan MotoCare.</p></div><a class="btn" href="{{ route('pelanggan.create') }}">＋ Tambah Data</a></div>
  <div style="overflow-x:auto"><table><thead><tr><th>ID</th><th>Nama Lengkap</th><th>No. HP</th><th>Alamat</th><th>Pekerjaan</th><th>Aksi</th></tr></thead><tbody>
  @forelse($pelanggan as $item)<tr><td>{{ $item->id_pelanggan ?? "-" }}</td><td>{{ $item->nama_lengkap ?? "-" }}</td><td>{{ $item->no_hp ?? "-" }}</td><td>{{ $item->alamat_pelanggan ?? "-" }}</td><td>{{ $item->pekerjaan ?? "-" }}</td><td><div class="actions">
  <a class="btn gray small" href="{{ route('pelanggan.show',$item) }}">Detail</a>
  <a class="btn small" href="{{ route('pelanggan.edit',$item) }}">Edit</a>
  <form method="POST" action="{{ route('pelanggan.destroy',$item) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn red small">Hapus</button></form>
  </div></td></tr>
  @empty<tr><td colspan="6" class="muted" style="text-align:center;padding:28px">Belum ada data. Klik Tambah Data untuk mulai mengisi.</td></tr>@endforelse
  </tbody></table></div>
</div>
@endsection
