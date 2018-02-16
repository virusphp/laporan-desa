<option>--- Pilih Desa ---</option>
@if(!empty($desa))
  @foreach($desa as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif
