@extends('master') 
@section('title', 'Laporan Peminjaman') 

@section('content')
<div class="container-sm mt-5">
  <h2>Rekapitulasi Rata-rata Harga Buku Tiap Penerbit</h2>       
  <table class="table table-bordered table-striped">
    <thead class="table-success" style="text-align: center">
      <tr>
		<th>Penerbit</th>		
		<th>Harga Buku Rata-rata</th>
	  </tr>
	</thead> 

    <tbody>
	@foreach ($data_lap5 as $lap5)
      <tr>
		<td>{{$lap5->penerbit}}</td> 		  
		<td style="text-align:center">Rp. {{number_format($lap5->rata, 2, ",", ".")}}</td>	
      </tr>
	@endforeach  
	</tbody>
  </table>	 
</div>
@endsection