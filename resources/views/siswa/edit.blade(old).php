@extends('template')

@section('main')
<div id="siswa">
	<h2>Edit Siswa</h2>

        {!! Form::model($siswa , ['method' => 'PATCH' , 'action' => ['SiswaController@update' , $siswa -> id ]]) !!}
                <div class="form-group">
                    {!! Form::label('nisn', 'Nisn:', ['class' => 'control-label']) !!}
                    {!! Form::text('nisn', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('nama_siswa', 'Nama Siswa:', ['class' => 'control-label']) !!}
                    {!! Form::text('nama_siswa', null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class' => 'control-label']) !!}
                    {!! Form::date('tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggal_lahir']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('jenis_kelamin', 'Jenis Kelamin:', ['class' => 'control-label']) !!}
                        <div class="radio">
                            <label> {!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
                        </div>
                        <div class="radio">
                            <label> {!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
                        </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'btn btn-danger form-control']) !!}
                </div>
        {!! Form::close() !!}	
</div>
@stop

@section('footer')
	@include('footer')
@stop