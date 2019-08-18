@extends('template')

@section('main')
<div id="siswa">
	<h2>Tambah Siswa</h2>

    {!! Form::open(['url' => 'siswa']) !!}
        @include ('siswa.form' , ['submitButtonText' => 'Simpan'] )
    {!! Form::close() !!}	
</div>
@stop

@section('footer')
	@include('footer')
@stop