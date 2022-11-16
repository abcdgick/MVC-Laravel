@extends('master') 
@section('title', 'Data Pustakawan') 

@section('content')
<div class="container mt-3">
    @if(Session::has('pesan'))
		<div class="alert alert-danger">{{Session::get('pesan')}}</div>
	@endif
    <h2>Data Pustakawan</h2>       
  	
    <p><a href="/createpustakawan">
	<button class="btn btn-success mb-2">Tambah Pustakawan</button></a></p>

    <table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr style="text-align: center">
            <th>Id</th>
            <th>NIP</th>
	        <th>Nama</th>
		    <th>Golongan</th>
		    <th>Edit</th>
		    <th>Hapus</th>
	    </tr>
    </thead> 

    <tbody>
	@foreach ($data_pustakawan as $pustakawan)
    <tr>
	    <th style="text-align: center">{{$pustakawan->id}}</th>
        <td>{{$pustakawan->NIP}}</td>
		<td>{{$pustakawan->Nama}}</td>	
		<td>{{$pustakawan->Golongan}}</td>	
        <td style="text-align: center"><a href="{{route('ubahpustakawan', $pustakawan->id)}}">
            <button class="btn btn-warning btn-sm">
                <span class="material-symbols-outlined">
                    edit
                </span>
            </button>
        </a></td>
        <td>
            <form action="{{route('hapuspustakawan', $pustakawan->id)}}" method="post">
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

