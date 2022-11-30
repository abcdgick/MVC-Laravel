<!DOCTYPE html>
<html lang='en'>
<head>
  <title>@yield('title')</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link href='{{asset("css/bootstrap.min.css")}}' rel='stylesheet'>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
  <script src='{{asset("js/bootstrap.bundle.min.js")}}'></script>
  <style>
    th{
      vertical-align: middle;
    }
    td{
      vertical-align: middle;
    }

    .material-symbols-outlined {
      font-variation-settings:
      'FILL' 0,
      'wght' 400,
      'GRAD' 0,
      'opsz' 48
    }
</style>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Data</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/buku">Data Buku</a></li>
              <li><a class="dropdown-item" href="/anggota">Data Anggota</a></li>
              <li><a class="dropdown-item" href="/pustakawan">Data Pustakawan</a></li>
            </ul>
          </li>	
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Laporan</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/lap1">Laporan Peminjaman</a></li>
              <li><a class="dropdown-item" href="/lap2">Laporan Pembayaran Denda</a></li>
            </ul>
          </li>		
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Rekapitulasi</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/lap3">Rekap Peminjaman Per-Judul</a></li>
              <li><a class="dropdown-item" href="/lap4">Rekap Peminjaman Per-Anggota</a></li>
              <li><a class="dropdown-item" href="/lap5">Rekap Rata-rata Harga Buku Tiap Penerbit</a></li>
              <li><a class="dropdown-item" href="/lap6">Rekap Jumlah Buku Tiap Penulis</a></li>			
            </ul>
          </li>			  
      </ul>
  </div>
</nav>

@yield('content')

<footer class="bg-dark py-4 text-white mt-4"> 
   <div class="container text-center"> 
      <small class="text-center"> Perpustakaan Universitas Juanda 
	  <BR> Jl. Dago 96 Bandung Jawa Barat</small> 
   </div> 
</footer>
</body>
</html>

