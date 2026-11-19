<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title','Dashboard') | MotoCare</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
<style>
:root{--navy:#111827;--navy2:#1f2937;--orange:#f97316;--orange2:#ea580c;--bg:#f4f6fa;--ink:#182230;--muted:#778196;--line:#e8ebf1;--white:#fff;--green:#16a34a;--red:#dc2626}
*{box-sizing:border-box}body{margin:0;background:var(--bg);font-family:'DM Sans',sans-serif;color:var(--ink)}a{text-decoration:none;color:inherit}
.shell{display:flex;min-height:100vh}.sidebar{width:250px;background:var(--navy);color:#d1d5db;padding:25px 16px;position:fixed;inset:0 auto 0 0;display:flex;flex-direction:column;z-index:5}
.brand{display:flex;align-items:center;gap:12px;padding:4px 10px 30px;color:#fff;font:800 21px Manrope}.brand-mark{width:40px;height:40px;border-radius:13px;background:var(--orange);display:grid;place-items:center;color:white;font-size:22px}
.nav-label{font-size:10px;letter-spacing:1.5px;color:#7e899b;font-weight:800;padding:12px 12px 8px}.nav a{display:flex;align-items:center;gap:12px;padding:12px;border-radius:10px;color:#b9c1cf;font-size:13px;font-weight:600;margin:3px 0}.nav a:hover,.nav a.active{background:#293548;color:white}.nav a.active{box-shadow:inset 3px 0 var(--orange)}.nav .ico{width:20px;text-align:center;font-size:16px}.side-foot{margin-top:auto;border-top:1px solid #303b4d;padding:18px 10px 0;font-size:11px;color:#8994a6;line-height:1.7}
.main{margin-left:250px;width:calc(100% - 250px);padding:30px 36px 50px}.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:28px}.crumb{font-size:12px;color:var(--muted)}.page-title{font:800 26px Manrope;margin:5px 0 0}.user-chip{background:white;border:1px solid var(--line);padding:9px 14px;border-radius:12px;font-size:12px;font-weight:700}
.cards{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:16px;margin:22px 0}.stat{background:white;border:1px solid var(--line);border-radius:16px;padding:19px}.stat small{color:var(--muted);font-weight:600}.stat strong{display:block;font:800 28px Manrope;margin-top:8px}.stat-icon{float:right;background:#fff1e8;color:var(--orange);padding:10px;border-radius:11px}
.panel{background:white;border:1px solid var(--line);border-radius:16px;padding:22px;margin:18px 0}.panel-head{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:18px}.panel h3{font:800 16px Manrope;margin:0}.btn{display:inline-flex;align-items:center;justify-content:center;border:0;border-radius:9px;padding:10px 15px;font:700 12px 'DM Sans';cursor:pointer;background:var(--orange);color:white}.btn:hover{background:var(--orange2)}.btn.gray{background:#eef1f5;color:#344054}.btn.red{background:#fee2e2;color:#b91c1c}.btn.small{padding:7px 10px;font-size:11px}
table{width:100%;border-collapse:collapse;font-size:12px}th{text-align:left;color:#7b8495;background:#f8f9fb;font-size:10px;text-transform:uppercase;letter-spacing:.7px;padding:12px 13px}td{padding:13px;border-bottom:1px solid #edf0f4}tr:last-child td{border:0}.muted{color:var(--muted)}.badge{display:inline-block;padding:5px 9px;border-radius:20px;background:#fff1e8;color:#c2410c;font-size:10px;font-weight:800}.actions{display:flex;gap:6px;align-items:center}.alert{padding:12px 15px;border-radius:10px;margin:12px 0;font-size:12px}.success{background:#dcfce7;color:#166534}.error{background:#fee2e2;color:#991b1b}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:17px}.field{display:flex;flex-direction:column;gap:7px}.field.full{grid-column:1/-1}.field label{font-size:12px;font-weight:700;color:#344054}.field input,.field select,.field textarea{width:100%;border:1px solid #dce1e9;border-radius:9px;padding:11px 12px;font:13px 'DM Sans';background:white;color:#182230}.field textarea{min-height:90px;resize:vertical}.radio-line{display:flex;gap:18px;padding:9px 0}.radio-line label{font-weight:500}.error-text{color:#dc2626;font-size:11px}.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}.detail{padding:13px;background:#f8f9fb;border-radius:10px}.detail small{display:block;color:var(--muted);margin-bottom:5px}.detail strong{font-size:13px}
@media(max-width:950px){.sidebar{width:210px}.main{margin-left:210px;width:calc(100% - 210px);padding:24px}.cards{grid-template-columns:repeat(2,1fr)}}
@media(max-width:650px){.sidebar{position:static;width:100%;height:auto}.shell{display:block}.nav{display:grid;grid-template-columns:1fr 1fr}.side-foot{display:none}.main{margin:0;width:100%;padding:20px}.cards{grid-template-columns:1fr 1fr}.form-grid,.detail-grid{grid-template-columns:1fr}.field.full{grid-column:auto}.topbar{align-items:flex-start}}
</style>
</head>
<body><div class="shell">
<aside class="sidebar">
<a href="{{ route('dashboard') }}" class="brand"><span class="brand-mark">🏍</span><span>MotoCare</span></a>
<div class="nav-label">MENU UTAMA</div><nav class="nav">
<a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard')?'active':'' }}"><span class="ico">▦</span>Dashboard</a>
<a href="{{ route('pelanggan.index') }}" class="{{ request()->routeIs('pelanggan.*')?'active':'' }}"><span class="ico">♙</span>Data Pelanggan</a>
<a href="{{ route('kendaraan.index') }}" class="{{ request()->routeIs('kendaraan.*')?'active':'' }}"><span class="ico">🏍</span>Data Kendaraan</a>
<a href="{{ route('daftar-service.index') }}" class="{{ request()->routeIs('daftar-service.*')?'active':'' }}"><span class="ico">▤</span>Daftar Service</a>
<a href="{{ route('data-service.index') }}" class="{{ request()->routeIs('data-service.*')?'active':'' }}"><span class="ico">🔧</span>Data Service</a>
<a href="{{ route('pembayaran.index') }}" class="{{ request()->routeIs('pembayaran.*')?'active':'' }}"><span class="ico">▣</span>Pembayaran</a>
</nav><div class="side-foot">MOTOCARE MANAGEMENT SYSTEM<br>Workshop service • Laravel 12</div>
</aside>
<main class="main">
<header class="topbar"><div><div class="crumb">MotoCare / @yield('crumb','Dashboard')</div><h1 class="page-title">@yield('heading','Dashboard')</h1></div><div class="user-chip">⚙ Admin MotoCare</div></header>
@if(session('success'))<div class="alert success">{{ session('success') }}</div>@endif
@if(session('error'))<div class="alert error">{{ session('error') }}</div>@endif
@if($errors->any())<div class="alert error"><strong>Periksa kembali input:</strong><ul style="margin:6px 0 0 18px">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
@yield('content')
</main></div>
@stack('scripts')
</body></html>
