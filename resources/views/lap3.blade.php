@extends('master') 
@section('title', 'Laporan Peminjaman') 

@section('content')
<div class="container-sm mt-3">
  <h2>Rekapitulasi per Judul Buku</h2>       
  <table class="table table-bordered table-striped">
    <thead class="table-success" style="text-align: center">
      <tr>
		<th>Judul Buku</th>
		<th>Penulis</th>
		<th>Penerbit</th>		
		<th>Berapa Kali Dipinjam</th>
	  </tr>
	</thead> 

    <tbody>
	@foreach ($data_lap3 as $lap3)
      <tr>
        <td>{{$lap3->judul}}</td>		
        <td>{{$lap3->penulis}}</td>		
		<td>{{$lap3->penerbit}}</td> 		  
		<td style="text-align:center">{{$lap3->kali}}</td>	
      </tr>
	@endforeach  
	</tbody>
  </table>	 
</div>
@endsection