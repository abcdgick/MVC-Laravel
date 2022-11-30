@extends('master') 
@section('title', 'Laporan Peminjaman') 

@section('content')
<div class="container-sm mt-3">
  <h2>Laporan Peminjaman</h2>       
  <table class="table table-bordered table-striped">
    <thead class="table-success" style="text-align: center">
      <tr>
        <th>Id Peminjaman</th>
	    <th>Nama Anggota</th>
		<th>Judul Buku</th>
		<th>Lama Pinjam</th>		
	  </tr>
	</thead> 

    <tbody>
	@foreach ($data_lap1 as $lap1)
      <tr>
	    <td style="text-align:center">{{$lap1->IdPinjam}}</td>
        <td>{{$lap1->NamaAgt}}</td>		
		<td>{{$lap1->JudulBuku}}</td> 		  
		<td style="text-align:center">{{$lap1->LamaPinjam}}</td>	
      </tr>
	@endforeach  
	</tbody>
  </table>	 
</div>
@endsection
