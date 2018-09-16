<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style type="text/css">
    .tg-sort-header::-moz-selection {
      background: 0 0
    }

    .tg-sort-header::selection {
      background: 0 0
    }

    .tg-sort-header {
      cursor: pointer
    }

    .tg-sort-header:after {
      content: '';
      float: right;
      margin-top: 7px;
      border-width: 0 5px 5px;
      border-style: solid;
      border-color: #404040 transparent;
      visibility: hidden
    }

    .tg-sort-header:hover:after {
      visibility: visible
    }

    .tg-sort-asc:after,
    .tg-sort-asc:hover:after,
    .tg-sort-desc:after {
      visibility: visible;
      opacity: .4
    }

    .tg-sort-desc:after {
      border-bottom: none;
      border-width: 5px 5px 0
    }

    @media screen and (max-width: 767px) {
      .tg {
        width: auto !important;
      }

      .tg col {
        width: auto !important;
      }

      .tg-wrap {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        margin: auto 0px;
      }
    }

    th {
      font-family: Arial, sans-serif;
      font-size: 14px;
      font-weight: bold;
      padding: 2px 9px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: inherit;
      background-color: #cccccc;
      text-align: center
    }

    .bg-heading {
      font-family: Arial, sans-serif;
      font-size: 14px;
      padding: 2px 9px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: inherit;
      font-weight: bold;
      background-color: #cccccc;
      text-align: center;
      vertical-align: top
    }

    .bg-nomer {
      font-family: Arial, sans-serif;
      font-size: 14px;
      padding: 2px 9px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: inherit;
      text-align: center;
      vertical-align: top
    }

    .isi-satu {
      font-family: Arial, sans-serif;
      font-size: 14px;
      padding: 2px 9px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: inherit;
      text-align: left;
      vertical-align: top
    }

    .isi-dua {
      font-family: Arial, sans-serif;
      font-size: 14px;
      padding: 2px 9px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: inherit;
      text-align: right;
      vertical-align: top
    }

    .jumlah {
      font-family: Arial, sans-serif;
      font-size: 14px;
      padding: 2px 9px;
      border-style: solid;
      border-width: 1px;
      overflow: hidden;
      word-break: normal;
      border-color: black;
      font-weight: bold;
      text-align: center;
      vertical-align: top
    }

    .sub-list-1 {
      margin-left: 130px;

    }

    .sub-list-2 {
      margin-left: 72px;
      position: absolute;

    }

    .sub-list-3 {
      margin-left: 27px;
      position: absolute;

    }

    .sub-list-4 {
      margin-left: 97px;
      position: absolute;

    }

    .judul-utama {
      text-align: center;

    }

    ul {
      list-style-type: none;
      font-weight: bold;
      text-transform: uppercase;

    }
  .page-break {
    page-break-after: before;
  }
  </style>
</head>
<body>
  <div class="page-break">
  <h4 class="judul-utama"> RENCANA KEGIATAN PEMERINTAH DESA  <br> <br>TAHUN {{ $tahun }}</h4>
  <hr class="garis-atas">
  <div class="list">
    <ul>
      @foreach($list as $ka)
      <li>
        DESA <span class="sub-list-1"> : {{ $ka->nama_desa }}</span>
      </li>
      <li>
        KECAMATAN <span class="sub-list-2"> : {{ $ka->nama_kecamatan }}</span>
      </li>
      <li>
        KABUPATEN/KOTA <span class="sub-list-3"> : KABUPATEN {{ $ka->kabupaten }}</span>
      </li>
      <li>
        PROVINSI <span class="sub-list-4"> : JAWA TENGAH</span>
      </li>
      @endforeach
    </ul>
  </div>
  <div class="tg-wrap">
    <table id="tg-LHxM1" style="border-collapse:collapse;border-spacing:0;margin:0px auto" class="tg">
      <tr>
        <th rowspan="2">KD</th>
        <th colspan="2">BIDANG / JENIS KEGIATAN</th>
        <th rowspan="2">LOKASI</th>
        <th rowspan="2">VOLUME</th>
        <th rowspan="2">SATUAN</th>
        <th rowspan="2">BIAYA</th>
        <th colspan="4">SASARAN</th>
        <th style="vertical-align:top;" colspan="3">WAKTU PELAKSANAAN</th>
        <th rowspan="2">PELAKSANAAN KEGIATAN</th>
      </tr>
      <tr>
        <td class="bg-heading">BIDANG/SUB BIDANG</td>
        <td class="bg-heading">JENIS KEGIATAN</td>
        <td style="font-family:Arial, sans-serif;font-size:14px;padding:2px 9px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:inherit;font-weight:bold;background-color:#cccccc;text-align:center">JUMLAH</td>
        <td class="bg-heading">LAKI-LAKI</td>
        <td style="font-family:Arial, sans-serif;font-size:14px;padding:2px 9px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:inherit;font-weight:bold;background-color:#cccccc;text-align:center">PEREMPUAN</td>
        <td class="bg-heading">A-RTM</td>
        <td class="bg-heading">DURASI</td>
        <td class="bg-heading">MULAI</td>
        <td class="bg-heading">SELESAI</td>
      </tr>
      <tr>
        <td class="bg-nomer">1</td>
        <td class="bg-nomer">2</td>
        <td class="bg-nomer">3</td>
        <td class="bg-nomer">4</td>
        <td class="bg-nomer">5</td>
        <td class="bg-nomer">6</td>
        <td class="bg-nomer">7</td>
        <td class="bg-nomer">8</td>
        <td class="bg-nomer">9</td>
        <td class="bg-nomer">10</td>
        <td class="bg-nomer">11</td>
        <td class="bg-nomer">12</td>
        <td class="bg-nomer">13</td>
        <td class="bg-nomer">14</td>
        <td class="bg-nomer">15</td>
      </tr>
      <?php $kd =1; ?>
      @foreach($data as $d)
      <tr>
        <td class="bg-nomer">
          {{ $kd++ }}
        </td>
        <td class="isi-satu">
          {{ $d->nama_bidang }}
        </td>
        <td class="isi-satu">
          {{ $d->nama_kegiatan }}
        </td>
        <td class="isi-satu">
          {{ $d->lokasi }}
        </td>
        <td class="isi-satu">
          {{ $d->perkiraan_volum }}
        </td>
        <td class="isi-satu">satuan</td>
        <td class="isi-dua">
          {{ $d->biaya }}
        </td>
        <td class="isi-dua">jumlah</td>
        <td class="isi-dua">laki-laki</td>
        <td class="isi-dua">perempuan</td>
        <td class="isi-dua">artm</td>
        <td class="isi-satu">
          {{ $d->waktu }}
        </td>
        <td class="isi-satu">01/2018</td>
        <td class="isi-satu">12/2018</td>
        <td class="isi-satu">
          {{ $d->pelaksana }}
        </td>
      </tr>
      @endforeach
      <tr>
        <td class="jumlah" colspan="6">JUMLAH PER BIDANG</td>
        <td class="jumlah"></td>
        <td class="jumlah"></td>
        <td class="jumlah"></td>
        <td class="jumlah"></td>
        <td class="jumlah"></td>
        <td cpage-break-afterlass="jumlah" colspan="4"></td>
      </tr>
    </table>
  </div>
</div>
<script type="text/php">
    if ( isset($pdf) ) {
        $font = $fontMetrics->getFont("helvetica", "bold");
        $pdf->page_text(900, 550, "HALAMAN: {PAGE_NUM}", $font, 10, array(0,0,0));
        {{--  $pdf->page_text(90, 18, "HALAMAN: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));  --}}
    }
</script>
<script type="text/php">
    if ( isset($pdf) ) {
        $font = $fontMetrics->getFont("helvetica", "bold");
        $pdf->page_text(900, 550, "HALAMAN: {PAGE_NUM}", $font, 10, array(0,0,0));
        {{--  $pdf->page_text(90, 18, "HALAMAN: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));  --}}
    }
</script>
<script type="text/php">
    if ( isset($pdf) ) {
        $font = $fontMetrics->getFont("helvetica", "bold");
        $pdf->page_text(90, 550, "Printed By Siskeudes", $font, 10, array(0,0,0));
        {{--  $pdf->page_text(90, 18, "HALAMAN: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));  --}}
    }
</script>
{{--  <script type="text/php">
    if (isset($pdf)) {
        $x = 100;
        $y = 550;
        $text = "Printed By Siskeudes";
        $font = $fontMetrics->getFont("helvetica", "bold");
        $size = 14;
        $background = array(255,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $background, $word_space, $char_space, $angle);
    }
</script>   --}}
</body>
</html>
