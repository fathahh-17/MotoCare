@extends('layouts.app')
@section('title','Data Kendaraan') @section('heading','Data Kendaraan') @section('crumb','Data Kendaraan')
@section('content')
<div class="panel">
  <div class="panel-head"><div><h3>Daftar Data Kendaraan</h3><p class="muted" style="font-size:12px;margin:6px 0 0">Kelola informasi data kendaraan MotoCare.</p></div><a class="btn" href="{{ route('kendaraan.create') }}">＋ Tambah Data</a></div>
  <div style="overflow-x:auto"><table><thead><tr><th>No. Plat</th><th>Jenis</th><th>No. STNK</th><th>Tahun</th><th>Pemilik</th><th>Warna</th><th>Aksi</th></tr></thead><tbody>
  @forelse($kendaraan as $item)<tr><td>{{ $item->no_plat ?? "-" }}</td><td>{{ $item->jenis_kendaraan ?? "-" }}</td><td>{{ $item->no_stnk ?? "-" }}</td><td>{{ $item->tahun_pembuatan ?? "-" }}</td><td>{{ $item->nama_pemilik ?? "-" }}</td><td>{{ $item->warna_kendaraan ?? "-" }}</td><td><div class="actions">
  <a class="btn gray small" href="{{ route('kendaraan.show',$item) }}">Detail</a>
  <a class="btn small" href="{{ route('kendaraan.edit',$item) }}">Edit</a>
  <form method="POST" action="{{ route('kendaraan.destroy',$item) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn red small">Hapus</button></form>
  </div></td></tr>
  @empty<tr><td colspan="7" class="muted" style="text-align:center;padding:28px">Belum ada data. Klik Tambah Data untuk mulai mengisi.</td></tr>@endforelse
  </tbody></table></div>
</div>
@endsection
