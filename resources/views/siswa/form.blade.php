                <div class="form-group">
                    {!! Form::label('nisn', 'Nisn:', ['class' => 'control-label']) !!}
                    {!! Form::text('nisn', null, ['class' => 'form-control', 'autocomplete' => 'off', 'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('nama_siswa', 'Nama Siswa:', ['class' => 'control-label']) !!}
                    {!! Form::text('nama_siswa', null, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:', ['class' => 'control-label']) !!}
                    {!! Form::date('tanggal_lahir', !empty($siswa) ? $siswa -> tanggal_lahir -> format('Y-m-d') : null, ['class' => 'form-control', 'id' => 'tanggal_lahir', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('id_kelas', 'Kelas:', ['class' => 'control-label']) !!}
                    @if (count($list_kelas) > 0 )
                    {!! Form::select('id_kelas', $list_kelas, null, ['class' => 'form-control', 'id' => 'id_kelas', 'placeholder' => 'Pilih Kelas Bro']) !!}
                    @else
                        <p>Tidak ada pilihan kelas, input dulu broo!</p>
                    @endif
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
                    {!! Form::label('nomor_telepon', 'Telepon:', ['class' => 'control-label']) !!}
                    {!! Form::text('nomor_telepon', null, ['class' => 'form-control', 'autocomplete' => 'off', 'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('hobi_siswa', 'Hobi:', ['class' => 'control-label']) !!}
                        @if(count($list_hobi) > 0)
                            @foreach($list_hobi as $key => $value)
                                <div class="checkbox">
                                    <label>{!! Form::checkbox('hobi_siswa[]', $key, null) !!} {{ $value }} </label>
                                </div>
                            @endforeach
                        @else
                            <p>tidah ada pilihan Hobi,, hubungi admin</p>
                        @endif
                </div>
                <div class="form-group">
                    {!! Form::label('foto', 'Foto:') !!}
                    {!! Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                </div>
                <!-- menampilkan foto -->
                @if (isset($siswa))
                    @if (isset($siswa->foto))
					<img class="img-rounded" width="150" src="{{ asset('fotoupload/' . $siswa->foto) }}">
					@else
						@if ($siswa->jenis_kelamin == 'L')
					<img width="150" src="{{ asset('fotoupload/dummymale.jpg') }}">
						@else
					<img width="150" src="{{ asset('fotoupload/dummyfemale.jpg') }}">
						@endif
					@endif
                @endif
                <div class="form-group">
                    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
                </div>