<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="kd_kec" class="col-md-4 control-label">Kecamatan</label>

	<div class="col-md-6">
		{{ Form::select('id_smas_kecamatan', ['' => '--Pilih kecamatan--']+$kecamatan, null, ['class' => 'form-control', 'id' => 'kecamatan']) }}
	</div>
</div>

<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="kd_desa" class="col-md-4 control-label">Desa</label>

	<div class="col-md-6">
		{{ Form::select('id_smas_desa', ['' => '--Pilih desa--'], null, ['id' => 'desa', 'class' => 'form-control']) }}
	</div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
