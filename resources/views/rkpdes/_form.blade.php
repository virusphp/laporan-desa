<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="kd_desa" class="col-md-4 control-label">Desa</label>

	<div class="col-md-6">
		{{ Form::select('tahun',['' => '--Pilih Tahun--','2018' => '2018'], null, ['class' => 'form-control', 'required' => 'required']) }}
	</div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="kd_kec" class="col-md-4 control-label">Kecamatan</label>

	<div class="col-md-6">
		{{ Form::select('kd_kec', ['' => '--Pilih Kecamatan--']+$kecamatan, null, ['class' => 'form-control', 'id' => 'kecamatan']) }}
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
