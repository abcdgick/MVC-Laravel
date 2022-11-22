@extends('master') 
@section('title', 'Tambah Pustakawan') 

@section('content')
<div class="container mb-3 mt-3">
    <h2>{{__('form3.title')}}</h2>
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
    <form method="post" action="/savepustakawan">
        @csrf
		<input type="hidden" name="locale" value="{{$locale}}">
	    <div class="mb-3 mt-3">
		    <label for="nip" class="form-label">{{__('form3.input.nip')}}</label>
		    <input type="text" class="form-control @error('nip') is-invalid @enderror"
			id="nip" name="nip" value="{{old('nip')}}">
			@error('nip')
				<div class="text-danger">{{$message}}</div>
			@enderror
	    </div>  

    	<div class="mb-3 mt-3">
		    <label for="nama" class="form-label">{{__('form3.input.nama')}}</label>
		    <input type="text" class="form-control @error('nama') is-invalid @enderror"
			 id="nama" name="nama" value="{{old('nama')}}">
			@error('nama')
				<div class="text-danger">{{$message}}</div>
			@enderror
	    </div>

 	    <div class="mb-3 mt-3">
		    <label for="gol" class="form-label">{{__('form3.input.gol')}}</label>
		    <input type="text" class="form-control @error('gol') is-invalid @enderror" 
			id="gol" name="gol" value="{{old('gol')}}">
			@error('gol')
				<div class="text-danger">{{$message}}</div>
			@enderror
	    </div>  

        <div class="mb-3 mt-3">
	        <button class="btn btn-success mb-2" type="submit">{{__('form3.input.tombol1')}}</button>
            <button class="btn btn-warning mb-2" type="reset">{{__('form3.input.tombol2')}}</button>
        </div>
    </form>
	<a href="/createpustakawan/en">English</a> | 
	<a href="/createpustakawan">Indonesia</a> 
</div>
@endsection
