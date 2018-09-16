@section('title', 'Error')
@section('message', 'Sorry, Maaf Kami sedang Melukan Upgrade Database') 
@extends('layouts.error')
@section('content')
<div class="main">
    <div class="container-fluid page-text text-center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="rotate"><strong>O</strong>ops!, Error 503!</h1>
                <h3>Aplikasi SIPADAN Masih Dalam Mantainence</h3>
                <h3>Tunggu beberapa saat sebelum mengakses kembali halaman kami.<br>
					Mohon maaf atas ketidaknyamanan kami akan berusaha meningkatkan pelayana. <br>
					Untuk Informasi lebih lanjut silhakan hubungi kontak di bawah :</h3>
                <div class="tombolhubungi">
                    <a href="https://www.facebook.com/gandi.dark.heart" class="btn btn-danger btn-lg">
                        <i class="fa fa-fw fa-envelope"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
