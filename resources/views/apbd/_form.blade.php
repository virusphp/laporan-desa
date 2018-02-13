<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="tahun" class="col-md-4 control-label">Tahun</label>

	<div class="col-md-6">
		{{ Form::select('tahun', ['' => '--Pilih tahun--']+$tahun, null, ['class' => 'form-control', 'id' => 'tahun']) }}
	</div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="kd_kec" class="col-md-4 control-label">Kecamatan</label>

	<div class="col-md-6">
		{{ Form::select('kd_kec', ['' => '--Pilih Kecamatan--'], null, ['class' => 'form-control', 'id' => 'kecamatan']) }}
	</div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="kd_desa" class="col-md-4 control-label">Desa</label>

	<div class="col-md-6">
		{{ Form::select('kd_desa',	['' => '--Pilih Desa--'], null, ['id' => 'desa', 'class' => 'form-control']) }}
	</div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
    </div>
</div>

