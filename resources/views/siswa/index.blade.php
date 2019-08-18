@extends('template')

@section('main')
<div id="siswa">
	<h2>Siswa</h2>
	<hr>
	@if (!empty($siswa_list))
		<table class="table">
			<thead>
				<tr>
					<th>NISN</th>
					<th>Nama Siswa</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($siswa_list as $siswa): ?>
				<tr>
					<td> {{ $siswa->nisn }} </td>
					<td> {{ $siswa->nama_siswa }} </td>
					<td> {{ $siswa->tanggal_lahir }} </td>
					<td> {{ $siswa->jenis_kelamin }} </td>
					<td>
						<div class="box-button"> 
							{{ link_to('siswa/' . $siswa->id , 'Detail' , ['class' => 'btn btn-info btn-sm']) }}
						</div> 
						<div class="box-button">
							{{ link_to('siswa/' . $siswa->id . '/edit' ,'Edit' , ['class' => 'btn btn-warning btn-sm']) }}
						</div>
						<div class="box-button">
							{!! Form::open(['method' => 'DELETE' , 'action' => ['SiswaController@destroy' , $siswa -> id]]) !!}
							{!! Form::submit('Delete' , ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
						</div>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	
	@else
		<p>Tidak ada data siswa</p>
	@endif	

	<div class="table-button">
		<div class="pull-left">
			<b> Jumlah siswa : {!! $jumlah_siswa !!}  </b>
		</div>
		<div class="pull-right">
			Halaman
		</div>
	</div>
	<br/>
	<div class="botton-nav">
		<div>
			<a href="siswa/create" class="btn btn-success">Tambah siswa</a>
		</div>
	</div>

</div>
@stop

@section('footer')
	@include('footer')
@stop