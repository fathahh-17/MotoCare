@extends('layouts.app')
@section('title','Pembayaran Service') @section('heading','Pembayaran Service') @section('crumb','Pembayaran Service')
@section('content')
<div class="panel">
  <div class="panel-head"><div><h3>Daftar Pembayaran Service</h3><p class="muted" style="font-size:12px;margin:6px 0 0">Kelola informasi pembayaran service MotoCare.</p></div><a class="btn" href="{{ route('pembayaran.create') }}">＋ Tambah Data</a></div>
  <div style="overflow-x:auto"><table><thead><tr><th>ID Pembayaran</th><th>ID Service</th><th>Pelanggan</th><th>Jumlah Biaya</th><th>Jenis</th><th>Aksi</th></tr></thead><tbody>
  @forelse($pembayaran as $item)<tr><td>{{ $item->id_pembayaran ?? "-" }}</td><td>{{ $item->id_servis_pelanggan ?? "-" }}</td><td>{{ $item->daftarService->pelanggan->nama_lengkap ?? "-" }}</td><td>{{ $item->jumlah_biaya_servis ?? "-" }}</td><td>{{ $item->jenis_pembayaran ?? "-" }}</td><td><div class="actions">
  <a class="btn gray small" href="{{ route('pembayaran.show',$item) }}">Detail</a>
  <a class="btn small" href="{{ route('pembayaran.edit',$item) }}">Edit</a>
  <form method="POST" action="{{ route('pembayaran.destroy',$item) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?')">@csrf @method('DELETE')<button class="btn red small">Hapus</button></form>
  </div></td></tr>
  @empty<tr><td colspan="6" class="muted" style="text-align:center;padding:28px">Belum ada data. Klik Tambah Data untuk mulai mengisi.</td></tr>@endforelse
  </tbody></table></div>
</div>
@endsection
