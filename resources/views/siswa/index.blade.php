@extends('template')

@section('main')
<div id="siswa">
	<h2>Siswa</h2>
	<hr>
	@include('_partial.flash_message')
	@if (!empty($siswa_list))
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>NISN</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
					<th>Telepon</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($siswa_list as $siswa): ?>
				<tr>
					<td> {{ $siswa->nisn }} </td>
					<td> {{ $siswa->nama_siswa }} </td>
					<td> {{ $siswa->kelas->nama_kelas }} </td>
					<td> {{ $siswa->tanggal_lahir -> format('d-m-Y') }} </td>
					<td> {{ $siswa->jenis_kelamin }} </td>
					<td> {{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }} </td>
					<td>
						<div class="box-button"> 
							{{ link_to('siswa/' . $siswa->id , 'Detail' , ['class' => 'btn btn-info btn-sm']) }}
						</div> 
						<div class="box-button">
							{{ link_to('siswa/' . $siswa->id . '/edit' ,'Edit' , ['class' => 'btn btn-warning btn-sm']) }}
						</div>
						<div class="box-button">
							{!! Form::open(['method' => 'DELETE' , 'action' => ['SiswaController@destroy' , $siswa -> id]]) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', "onclick" => "return confirm('Yakin ingin menghapus?')" ]) !!}
							{!! Form::close() !!}
						</div>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	@else
		<p>Tidak ada data siswa</p>
	@endif	

	<div class="table-button">
		<div class="pull-left">
			<b> Jumlah siswa : {!! $jumlah_siswa !!}  </b>
		</div>
		<div class="paging">
			{{ $siswa_list -> links() }}
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