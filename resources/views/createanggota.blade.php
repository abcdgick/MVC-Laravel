@extends('master') 
@section('title', 'Tambah Anggota') 

@section('content')
<div class="container mb-3 mt-3">
    <h2>Tambah Data Anggota</h2> 
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
    <form method="post" action="/saveanggota">
        @csrf
	    <div class="mb-3 mt-3">
		    <label for="npm" class="form-label">NPM :</label>
		    <input type="text" class="form-control @error('npm') is-invalid @enderror" 
			id="npm" name="npm" value="{{old('npm')}}">
			@error('npm')
				<div class="text-danger">{{$message}}</div>
			@enderror
	    </div>  
    <div class="mb-3 mt-3">
		    <label for="nama" class="form-label">Nama :</label>
		    <input type="text" class="form-control  @error('nama') is-invalid @enderror"
			id="nama" name="nama" value="{{old('nama')}}">
			@error('nama')
				<div class="text-danger">{{$message}}</div>
			@enderror
	    </div>
		<div class="mb-3 mt-3">
		    <label for="radio1" class="form-label">Gender :</label>
                <div class="form-check">
			        <input type="radio" class="form-check-input" id="radio1" name="gender" value="L" checked>
			        <label class="form-check-label" for="radio1">Laki-laki</label>
		        </div>
		    <div class="form-check">
			    <input type="radio" class="form-check-input" id="radio2" name="gender" value="P">
			    <label class="form-check-label" for="radio2">Perempuan</label>
		    </div>
	    </div>  	  
 	    <div class="mb-3 mt-3">
		    <label for="alamat" class="form-label">Alamat :</label>
		    <input type="text" class="form-control @error('alamat') is-invalid @enderror"  
			id="alamat" name="alamat" value="{{old('alamat')}}">
			@error('alamat')
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
