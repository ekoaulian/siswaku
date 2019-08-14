@extends('template')

@section('main')
<div id="siswa">
	<h2>Siswa</h2>

	@if (!empty($siswa))
		<ul>
			@foreach ($siswa as $anak)
				<li> {{ $anak }} </li>
			@endforeach
		</ul>
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