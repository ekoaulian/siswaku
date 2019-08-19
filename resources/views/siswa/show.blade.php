@extends('template')

@section('main')
<div id="siswa">
	<h2>Detail Siswa</h2>

		<table class="table table-striped">
			<tr>
				<th>NISN</th>
				<th>{{ $siswa->nisn }}</th>
			</tr>
            <tr>
				<th>Nama</th>
				<th>{{ $siswa->nama_siswa }}</th>
			</tr>
            <tr>
				<th>Tanggal lahir</th>
				<th>{{ $siswa->tanggal_lahir -> format('d-m-Y')}}</th>
			</tr>
            <tr>
				<th>Jenis kelamin</th>
				<th>{{ $siswa->jenis_kelamin }}</th>
			</tr>
		</table>	
</div>

@stop

@section('footer')
	@include('footer')
@stop