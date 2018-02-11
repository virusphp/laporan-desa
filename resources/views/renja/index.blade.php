@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/home') }}">PORTAL</a></li>
                    <li class="active">Cari Laporan</li>
                </ul>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title">Pencarian Laporan</h2>
                    </div>
                    <div class="panel-body">
						<form action="?kd_desa">
							@include('renja._form')
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

