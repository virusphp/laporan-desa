<?php
// Tentukan path yang tepat ke mPDF
$nama_dokumen='REPORT APBD'; //Beri nama file PDF hasil.
//define('_MPDF_PATH','MPDF57/'); // Tentukan folder dimana anda menyimpan folder mpdf
// Arahkan ke file mpdf.php didalam folder mpdf
$mpdf	=	new mPDF('utf-8', 'F4-L',10.5, 'arial'); // Membuat file mpdf baru

//Memulai proses untuk menyimpan variabel php dan html
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php ini_set('max_execution_time', 300); ?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>PDF</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
		html {
			/* font-family: sans-serif; */
		}

		/* table.table-laporan {
			border-collapse: collapse;
			color: #444;
			border: 1px solid #000;
		} */

		thead tr th {
			text-align:center;

		}

		h3 {
			font-weight: bold;
			text-align:center;
		}

		table tr th{
			font-size: 14px;
			background: #35A9DB;
			color: #fff;
			font-weight: normal;
		}


		.table-responsive-md tr td {
			text-align: center;
			border-collapse: collapse;
			font-size: 14px;
		}

		.lampiran tr td {
			font-size: 12px;

		}

		hr {
			margin-top: 1px;
		}
	</style>

</head>
<body>
<div class="main-laporan">
	<?php foreach($laporan as $tahun => $th): ?>
	<?php foreach($th as $kecamatan => $kec): ?>
	<?php foreach($kec as $desa => $des): ?>
	<h3>
		ANGGARAN PENDAPATAN DAN BELANJA DESA<br>
		<?php echo $desa; ?><br>
		TAHUN ANGGARAN <?php echo $tahun; ?>
	</h3>
	<hr>
	<p>
		Sumberdata : DDS Dana Desa (Droping APBN)
	</p>
	<div class="table-responsive-md">
		<table class="table table-bordered table-dark">
		<thead>
			<tr>
				<th>URAIAN</th>
				<th>
					ANGGARAN<br> (Rp)
				</th>
				<th>KETERANGAN</th>
			</tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					PENDAPATAN
					<br>
					Pendapatan Transfer
					<br>
					Dana Desa
				</td>
				<td>
					<br>
					769.835.000,00
					<br>
					769.835.000,00
				</td>
				<td rowspan="3" style="text-align:center;">
					Sumber DDS
				</td>
			</tr>
			<tr>
				<td>JUMLAH PENDAPATAN</td>
				<td>769.835.000,00</td>
			</tr>
			<tr>
				<td colspan="2">BELANJA</td>
			</tr>
			<?php foreach($des as $kd => $value): ?>
			<?php foreach($value as $bidang => $bid): ?>
			<?php foreach($bid as $data => $value): ?>
			<tr>
				<td>
					<br>
					<?php echo $bidang; ?>
					<br>
					<?php echo $value['nama_jenis']; ?>
					<br>
					<?php echo $value['nama_kegiatan']; ?>
					<br>
				</td>
				<td>
					<br>
					<?php echo $value['anggaran_rinc']; ?>
					<br>
					<?php echo $value['JumlahAnggaran']; ?>
					<br>
				</td>
				<td style="text-align:center;">
					Sumber DDS
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<tr>
				<td>JUMLAH BELANJA</td>
				<td>769.835.000,00</td>
			</tr>
			<tr>
				<td>SISA LEBIH /(KURANG) PERHITUNGAN ANGGARAN</td>
				<td>000</td>
				<td>&nbsp;</td>
			</tr>
	</table>
	<?php endforeach; ?>
	<?php endforeach; ?>
	<?php endforeach; ?>

<?php echo "<p align='right'>Batang, ".date('d-m-Y')."<br>KEPALA DESA KEPUH<br><br><br>( Ahmad Mubarok )</p>"; ?>
</div>

</body>
</html>

<?php

// $mpdf->setFooter('{PAGENO}');
//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);

$mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.'-'.$desa.'-'.$tahun.".pdf" ,'I');
exit;
?>
