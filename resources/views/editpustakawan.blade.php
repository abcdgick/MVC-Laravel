@extends('master') 
@section('title', 'Edit Pustakawan') 

@section('content')
<div class="container mb-3 mt-3">
    <h2>Edit Data pustakawan</h2>
	{{--
	@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul class="mb-0">
				@foreach($errors->all() as $err)
					<li>{{$err}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	--}}  
    <form method="post" action="{{route('modifpustakawan', $pustakawan->id)}}">
        @csrf
	    <div class="mb-3 mt-3">
		    <label for="nip" class="form-label">NIP :</label>
		    <input type="text" class="form-control @error('nip') is-invalid @enderror" 
			id="nip" name="nip" value="{{$pustakawan->NIP}}">
			@error('nip')
			<div class="text-danger">{{$message}}</div>
			@enderror
	    </div>  
	    
        <div class="mb-3 mt-3">
		    <label for="nama" class="form-label">Nama Pustakawan :</label>
		    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
			id="nama" name="nama" value="{{$pustakawan->Nama}}">
			@error('nama')
			<div class="text-danger">{{$message}}</div>
			@enderror
	    </div>  

 	    <div class="mb-3 mt-3">
		    <label for="gol" class="form-label">Golongan :</label>
		    <input type="text" class="form-control @error('gol') is-invalid @enderror" 
			id="gol" name="gol" value="{{$pustakawan->Golongan}}">
			@error('gol')
			<div class="text-danger">{{$message}}</div>
			@enderror		
	    </div>  	  
      
        <div class="mb-3 mt-3">
	        <button class="btn btn-success mb-2" type="submit">Simpan</button>
            <button class="btn btn-warning mb-2" type="reset">Batal</button>
        </div>
    </form>
</div>
@endsection
