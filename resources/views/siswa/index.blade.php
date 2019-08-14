@extends('template')

@section('main')
<div id="siswa">
	<h2>Siswa</h2>

	@if (!empty($siswa_list))
		<table class="table">
			<thead>
				<tr>
					<th>NISN</th>
					<th>Nama Siswa</th>
					<th>Tanggal Lahir</th>
					<th>Jenis Kelamin</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($siswa_list as $siswa): ?>
				<tr>
					<td> {{ $siswa->nisn }} </td>
					<td> {{ $siswa->nama_siswa }} </td>
					<td> {{ $siswa->tanggal_lahir }} </td>
					<td> {{ $siswa->jenis_kelamin }} </td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	
	@else
		<p>Tidak ada data siswa</p>
	@endif	
</div>

@stop

@section('footer')
    <div id="footer">
        <p>&copy; 2019 Laravel App</p>
    </div>

@stop