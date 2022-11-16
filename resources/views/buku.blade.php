@extends('master') 
@section('title', 'Data Buku') 

@section('content')
<div class="container mt-3">
	@if(Session::has('pesan'))
		<div class="alert alert-danger">{{Session::get('pesan')}}</div>
	@endif
  <h2>Data Buku</h2>
  
  <p><a href="/createbuku"><button class="btn btn-success mb-2">Tambah Buku</button></a></p>

  <table class="table table-bordered table-striped">
	<thead class="table-success">
      	<tr style="text-align: center">
        	<th>Id</th>
        	<th>Judul</th>
	    	<th>Penulis</th>
			<th>Penerbit</th>
			<th>Kategori</th>		
			<th>Harga Buku</th>
			<th>Edit</th>
			<th>Hapus</th>
		</tr>
	</thead> 

    <tbody>
	@foreach ($data_buku as $buku)
      <tr>
	    <th style="text-align: center">{{$buku->id}}</th>
        <td>{{$buku->judul}}</td>
		<td>{{$buku->penulis}}</td>	
		<td>{{$buku->penerbit}}</td>
		@php
		   if ($buku->kodekategori == 'F')
		      {$kategori = 'Fiksi';}
           else if ($buku->kodekategori == 'S')
		      {$kategori = 'Sains';}
           else 
		      {$kategori = 'Data ngaco';}
			$harga = number_format($buku->hargabuku, 2, ",", ".")
        @endphp      			  
		<td>{{$kategori}}</td>	
		<td>Rp. {{$harga}}</td>		
		<td style="text-align: center"><a href="{{route('ubahbuku', $buku->id)}}"><button class="btn btn-warning btn-sm">
			<span class="material-symbols-outlined">
				edit
			</span>	
		</button></a></td>
		<td style="text-align: center">
			<form action="{{route('hapusbuku', $buku->id)}}" method="post">
				@csrf
				<button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus?')">
					<span class="material-symbols-outlined">
						delete
					</span>
				</button>
			</form>
		</td>		
      </tr>
	@endforeach  
	</tbody>
  </table>
</div>
@endsection

