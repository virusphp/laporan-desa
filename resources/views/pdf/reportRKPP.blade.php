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

		table.table-laporan {
			margin-left:auto; 
			margin-right:auto;
			border-collapse: collapse;
			color: #444;
			border: 1px solid #000;
		}

		thead tr th {
			border: 1px solid #880000;
		}

		.table-laporan tbody tr td {
			border: 1px solid #000000;
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
<div class="main-laporan page-break">
	<?php foreach($laporan as $key => $kades): ?>
		<?php $jabatan = $key; ?>
	<?php foreach($kades as $key => $pemerintahan): ?>
		<?php $nama_kades = $key; ?>
	<?php foreach($pemerintahan as $desa => $des): ?>
	<?php foreach($des as $kecamatan => $kec): ?>
	<?php $subtotalArray = [0]; ?>
	<h3>
		RENCANA KERJA PEMERINTAH DESA<br>
		TAHUN 2018
	</h3>
	<hr>
	<table class="lampiran">
		<tr>
			<td>DESA</td>
			<td>:</td>
			<td><?php echo $desa; ?></td>
		</tr>
		<tr>
			<td>KECAMATAN</td>
			<td>:</td>
			<td><?php echo $kecamatan; ?></td>
		</tr>
		<tr>
			<td>KABUPATEN/KOTA</td>
			<td>:</td>
			<td>KABUPATEN BATANG</td>
		</tr>
		<tr>
			<td>PROVINSI</td>
			<td>:</td>
			<td>PROVINSI JAWA TENGAH</td>
		</tr>
	</table>
	<table width="100%" class="table-laporan" border="1">
		<thead>
			<tr>
				<th rowspan="2">NO</th>
				<th colspan="2">JENIS BIDANG</th>
				<th rowspan="2">
					LOKASI
					(RT/RW
					DUSUN)
				</th>
				<th rowspan="2">
					PERKIRAAN VOLUME
				</th>
				<th rowspan="2">
					SASARAN / MANFAAT	
				</th>
				<th rowspan="2">
					WAKTU PELAKSANAAN
				</th>
				<th colspan="2">
					PERKIRAAN BIAYA & SMBER
				</th>
				<th colspan="3">
					POLA PELAKSANAAN
				</th>
				<th rowspan="2">
					RENCANA PELAKSANAAN
				</th>
			</tr>
			<tr>
				<th>BIDANG/SUB BIDANG</th>
				<th>JENIS KEGIATAN</th>
				<th>
					JUMLAH
					(RUPIAH)
				</th>
				<th>SUMBER</th>
				<th>SWA KELOLA</th>
				<th>KERJASAMA</th>
				<th>PIHAK KETIGA</th>
			</tr>
			<tr>
				<th>1</th>
				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th>7</th>
				<th>8</th>
				<th>9</th>
				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($kec as $key => $value): ?>
		<?php foreach($value as $bidang => $value): ?>
			<?php $rowspan = count($value) + 1; ?>
			<tr>
				<!-- Dummy Sample Laporan -->
				<!-- Rowspan di isi sesuai jumlah count data +1  jika data ada 6 maka rowspan akan otomatis jadi 6+1-->
				<td rowspan="<?php echo $rowspan ?>">{{ $key }}</td>
				<td rowspan="<?php echo $rowspan ?>">{{ $bidang }}</td>
			</tr>
			<?php $subtotal = 0; ?>
			<?php foreach($value as $data => $value): ?>
			<?php $subtotal += $value['biaya']; ?>
			<tr>
				<td><?php echo $value['nama_kegiatan']; ?></td>
				<td><?php echo $value['lokasi']; ?></td>
				<td><?php echo $value['perkiraan_volum']; ?></td>
				<td><?php echo $value['sasaran']; ?></td>
				<td><?php echo $value['waktu']; ?></td>
				<td><?php echo $value['biaya']; ?></td>
				<td><?php echo $value['kd_sumber']; ?></td>
				<td><?php echo $value['swakelola']; ?></td>
				<td><?php echo $value['kerjasama']; ?></td>
				<td><?php echo $value['pihak_ketiga']; ?></td>
				<td><?php echo $value['pelaksana']; ?></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td align="center" colspan="6">JUMLAH PER BIDANG</td>
				<td><?php echo $subtotalArray[] = $subtotal; ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>	
			<?php endforeach; ?>
			<?php endforeach; ?>
			<tr>
				<td align="center" colspan="6">JUMLAH TOTAL</td>
				<td><?php echo array_sum($subtotalArray); ?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>	
		</tbody>
	</table>
	<?php endforeach; ?>
	<?php endforeach; ?>
	<?php endforeach; ?>
	<?php endforeach; ?>

<?php echo "<p align='right'>Batang, ".date('d-m-Y')."<br>".$jabatan."<br><br><br>( ".$nama_kades." )</p>"; ?>
</div>
	
</body>
</html>
