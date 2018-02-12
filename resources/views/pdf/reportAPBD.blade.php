<!DOCTYPE html>
<html lang="en">
<?php ini_set('max_execution_time', 300); ?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>PDF</title>
	<style>
		html {
			font-family: sans-serif;
		}

		table.table-laporan {
			margin-top:10px;
			margin-left:auto; 
			margin-right:auto;
/*			border-collapse: collapse;
 */
			font-family: sans-serif;
			color: #444;
			border: 1px solid #f2f5f7;
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
			width:40px;
		}

		.page-break {    
			page-break-before: avoid;
		}

		.table-laporan tr td {
			text-align: center;
		}

		.lampiran tr td {
			font-size: 12px;
		}

		hr {
			margin-top: 5px;
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
	<table width="100%" class="table-laporan" border="1">
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
