<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="nama" class="col-md-4 control-label">Desa</label>

	<div class="col-md-6">
		{{ Form::select('desa', App\Renja::pluck('nama_desa', 'kd_desa'), null, ['class' => 'form-control']) }}
	</div>
</div>

<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
		{!! Form::submit('Cari', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
