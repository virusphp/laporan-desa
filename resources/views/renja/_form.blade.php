<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
	<label for="nama" class="col-md-4 control-label">Kategori</label>

	<div class="col-md-6">
		{!! Form::select('category_id', App\Category::pluck('category_name','id'), null, ['class'=>'form-control']) !!}
		{!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
	</div>
</div>
<div class="form-group">
    <div class="col-md-4 col-md-offset-2">
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
    </div>
</div>
