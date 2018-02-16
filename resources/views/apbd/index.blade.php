@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">PORTAL</a></li>
                    <li class="breadcrumb-item active">Laporan APBDES</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Pencarian Laporan</h2>
                    </div>
                    <div class="panel-body">
						{!! Form::open(['url' => route('apbd.search'),
                        	'method' => 'post', 'class'=>'form-horizontal']) !!}
                            @include('rpj._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$("select[name='tahun']").change(function() {
  var tahun = $(this).val();
  var token = $("input[name='_token']").val();
  $.ajax({
    url : "{{ route('apbd.kecamatan') }}",
    method : "POST",
    data : {
		tahun : tahun,
		_token : token
    },
    success : function(data) {
		console.log(data.options);	
   	  	$("select[name='kd_kec']").html('');
      	$("#kecamatan").html(data.options);
      //
    }
  });
});

$("select[name='kd_kec']").change(function() {
  var tahun = $("#tahun").val();
  var kd_kec = $(this).val();
  var token = $("input[name='_token']").val();
  $.ajax({
    url : "{{ route('apbd.desa') }}",
    method : "POST",
    data : {
		tahun : tahun,
		kd_kec : kd_kec,
		_token : token
    },
    success : function(data) {
		console.log(data.options);	
   	  	$("select[name='kd_desa']").html('');
      	$("#desa").html(data.options);
      //
    }
  });
});

</script>
@endpush

