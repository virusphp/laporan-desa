@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header" align="center">PORTAL GENERATE PDF SIPADAN</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
					<p align="center">
                    	SELAMAT DATANG DI PORTAL GENERATE LAPORAN SIPADAN
					</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
