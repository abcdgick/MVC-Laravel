@extends('master') 
@section('title', 'Laporan Peminjaman') 

@section('content')
<div class="container-sm mt-4">
  <h2>Rekapitulasi Peminjaman Per-Anggota</h2>       
  <table class="table table-bordered table-striped">
    <thead class="table-success" style="text-align: center">
      <tr>
		<th>NPM</th>
		<th>Nama Anggota</th>
		<th>Alamat</th>		
		<th>Berapa Kali Meminjam</th>
	  </tr>
	</thead> 

    <tbody>
	@foreach ($data_lap4 as $lap4)
      <tr>
        <td>{{$lap4->npm}}</td>		
        <td>{{$lap4->nama}}</td>		
		<td>{{$lap4->alamat}}</td> 		  
		<td style="text-align:center">{{$lap4->kali}}</td>	
      </tr>
	@endforeach  
	</tbody>
  </table>	 
</div>
@endsection