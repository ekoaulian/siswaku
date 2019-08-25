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
				<th>Kelas</th>
				<th>{{ $siswa->kelas->nama_kelas }}</th>
			</tr>
            <tr>
				<th>Tanggal lahir</th>
				<th>{{ $siswa->tanggal_lahir -> format('d-m-Y')}}</th>
			</tr>
            <tr>
				<th>Jenis kelamin</th>
				<th>{{ $siswa->jenis_kelamin }}</th>
			</tr>
			<tr>
				<th>Telepon</th>
				<th>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }}</th>
			</tr>
			<tr>
				<th>Hobi</th>
				<th>
					@foreach($siswa -> hobi as $item)
						<span>{{ $item->nama_hobi }}</span>, 
					@endforeach
				</th>
			</tr>
		</table>	
</div>

@stop

@section('footer')
	@include('footer')
@stop