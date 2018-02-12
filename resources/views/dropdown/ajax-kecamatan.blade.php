<option>--- Pilih Desa ---</option>
@if(!empty($kecamatan))
  @foreach($kecamatan as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
