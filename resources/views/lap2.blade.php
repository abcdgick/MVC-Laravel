@extends('master') 
@section('title', 'Laporan Peminjaman') 

@section('content')
<div class="container-sm mt-3">
  <h2>Laporan Pembayaran Denda</h2>       
  <table class="table table-bordered table-striped">
    <thead class="table-success" style="text-align: center">
      <tr>
        <th>Id Peminjaman</th>
	    <th>Nama Anggota</th>
	    <th>Alamat</th>
		<th>Judul Buku</th>
		<th>Penulis</th>
		<th>Lama Pinjam</th>		
		<th>Keterlambatan</th>
		<th>Denda</th>
	  </tr>
	</thead> 

    <tbody>
	@foreach ($data_lap2 as $lap2)
        @php
            if($lap2->LamaPinjam > 3){
                $telat = $lap2->LamaPinjam - 3;
                $denda = number_format($telat * 1000, 2, ",", ".");
            } else{
                $telat = 0;
                $denda = "0,00";
            }
        @endphp
      <tr>
	    <td style="text-align:center">{{$lap2->IdPinjam}}</td>
        <td>{{$lap2->NamaAgt}}</td>		
        <td>{{$lap2->AlamatAgt}}</td>		
		<td>{{$lap2->JudulBuku}}</td> 		  
		<td>{{$lap2->PenulisBuku}}</td> 		  
		<td style="text-align:center">{{$lap2->LamaPinjam}}</td>	
		<td style="text-align:center">{{$telat}}</td>	
		<td>Rp. {{$denda}}</td>	
      </tr>
	@endforeach  
	</tbody>
  </table>	 
</div>
@endsection