@extends('master') 
@section('title', 'Data Buku') 

@section('content')
<input type="hidden" name="locale" value="{{$locale}}">
<div class="container mt-3">
	@if(Session::has('pesan'))
		<div class="alert alert-danger">{{Session::get('pesan')}}</div>
	@endif
  <h2>{{__('table.title')}}</h2>
  
  <p><a href="/createbuku"><button class="btn btn-success mb-2">{{__('table.tampil.tombol1')}}</button></a></p>

  <table class="table table-bordered table-striped">
	<thead class="table-success">
      	<tr style="text-align: center">
        	<th>{{__('table.tampil.id')}}</th>
        	<th>{{__('table.tampil.judul')}}</th>
	    	<th>{{__('table.tampil.penulis')}}</th>
			<th>{{__('table.tampil.penerbit')}}</th>
			<th>{{__('table.tampil.kategori')}}</th>		
			<th>{{__('table.tampil.harga')}}</th>
			<th>{{__('table.tampil.tombol2')}}</th>
			<th>{{__('table.tampil.tombol3')}}</th>
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
		      {$kategori = __('table.tampil.pilihan_kategori.fiksi');}
           else if ($buku->kodekategori == 'S')
		      {$kategori = __('table.tampil.pilihan_kategori.sains');}
           else 
		      {$kategori = __('table.tampil.pilihan_kategori.ngaco');}
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
				<button class="btn btn-danger btn-sm" onclick="return confirm('{{__('table.tampil.popup')}}')">
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
  	<a href="/buku/en">English</a> | 
	<a href="/buku">Indonesia</a> 
</div>
@endsection

