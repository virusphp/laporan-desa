@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">PORTAL</a></li>
                    <li class="breadcrumb-item active">Laporan RPJ M</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Pencarian Laporan</h2>
                    </div>
                    <div class="panel-body">
						{!! Form::open(['url' => route('rpj.search'),
                        	'method' => 'post', 'class'=>'form-horizontal']) !!}
                            @include('rpj._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

