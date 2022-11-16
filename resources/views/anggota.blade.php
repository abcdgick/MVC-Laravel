@extends('master') 
@section('title', 'Data Anggota') 

@section('content')
<div class="container mt-3">
    @if(Session::has('pesan'))
		<div class="alert alert-danger">{{Session::get('pesan')}}</div>
	@endif
    <h2>Data Anggota</h2>       
  	
    <p><a href="/createanggota">
	<button class="btn btn-success mb-2">Tambah Anggota</button></a></p>

    <table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr style="text-align: center">
            <th>Id</th>
            <th>NPM</th>
	        <th>Nama</th>
		    <th>Gender</th>
		    <th>Angkatan</th>		
		    <th>Jenjang</th>
		    <th>Jurusan</th>
		    <th>Alamat</th>
		    <th>Edit</th>
		    <th>Hapus</th>
	    </tr>
    </thead> 

    <tbody>
	@foreach ($data_anggota as $anggota)
    <tr>
	    <th style="text-align: center">{{$anggota->id}}</th>
        <td>{{$anggota->NPM}}</td>
		<td>{{$anggota->Nama}}</td>	
		@if ($anggota->{'Kode Gender'} == "L")
            <td>Laki-laki</td>	
        @else
            <td>Perempuan</td>	
        @endif
		@php
		   $ta = Str::substr($anggota->NPM, 0, 4);
           $kje = $anggota->NPM[4];
           $kju = $anggota->NPM[5];
           switch ($kje) {
            case '0':
                $jenjang = "Diploma III";
                break;
            
            case '1':
                $jenjang = "Sarjana";
                break;
            
            case '2':
                $jenjang = "Magister";
                break;
            
            default:
                $jenjang = "";
                break;
           }

           switch ($kju) {
            case '1':
                $jurusan = "Sistem Informasi";
                break;
            
            case '2':
                $jurusan = "Sistem Komputer";
                break;
            
            case '3':
                $jurusan = "Informatika";
                break;
            
            default:
                $jurusan = "";
                break;
           }
        @endphp      			  
		<td>{{$ta}}</td>	
		<td>{{$jenjang}}</td>	
		<td>{{$jurusan}}</td>	
		<td>{{$anggota->Alamat}}</td>
        <td style="text-align: center"><a href="{{route('ubahanggota', $anggota->id)}}"><button class="btn btn-warning btn-sm">
            <span class="material-symbols-outlined">
                edit
            </span>    
        </button></a></td>
        <td>
            <form action="{{route('hapusanggota', $anggota->id)}}" method="post">
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

