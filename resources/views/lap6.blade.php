@extends('master') 
@section('title', 'Laporan Peminjaman') 

@section('content')
<div class="container-sm mt-6">
  <h2>Rekapitulasi Jumlah Buku Tiap Penulis</h2>       
  <table class="table table-bordered table-striped">
    <thead class="table-success" style="text-align: center">
      <tr>
		<th>Penulis</th>		
		<th>Jumlah Buku yang Ditulis</th>
	  </tr>
	</thead> 

    <tbody>
	@foreach ($data_lap6 as $lap6)
      <tr>	
		<td>{{$lap6->penulis}}</td> 		  
		<td style="text-align:center">{{$lap6->kali}}</td>	
      </tr>
	@endforeach  
	</tbody>
  </table>	 
</div>
@endsection