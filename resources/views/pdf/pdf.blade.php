<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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
	@foreach($laporan as $desa => $des)
	@foreach($des as $kecamatan => $kec)
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
				</th>
				<th rowspan="2">
					VOLUME
				</th>
				<th rowspan="2">
					SATUAN	
				</th>
				<th rowspan="2">
					BIAYA (RUPIAH)
				</th>
				<th colspan="4">
					SASARAN
				</th>
				<th colspan="3">
					WAKTU PELAKSANAAN
				</th>
				<th rowspan="2">
					PELAKSANA KEGIATAN
				</th>
			</tr>
			<tr>
				<th>BIDANG/SUB BIDANG</th>
				<th>JENIS KEGIATAN</th>
				<th>JUMLAH</th>
				<th>LAKI LAKI</th>
				<th>PEREMPUAN</th>
				<th>ARTM</th>
				<th>DURASI</th>
				<th>MULAI</th>
				<th>SELESAI</th>
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
				<th>14</th>
				<th>15</th>
			</tr>
		</thead>
		<tbody>
		@foreach($kec as $key => $value)
			@foreach($value as $bidang => $value)
			<?php $rowspan = count($value) + 1; ?>
			<tr>
				<!-- Dummy Sample Laporan -->
				<!-- Rowspan di isi sesuai jumlah count data +1  jika data ada 6 maka rowspan akan otomatis jadi 6+1-->
				<td rowspan="<?php echo $rowspan ?>">{{ $key }}</td>
				<td rowspan="<?php echo $rowspan ?>">{{ $bidang }}</td>
			</tr>
			<?php $subtotal = 0; ?>
			@foreach($value as $data => $value)
			<?php $subtotal += $value['biaya']; ?>
			<tr>
				<td><?php echo $value['nama_kegiatan']; ?></td>
				<td><?php echo $value['lokasi']; ?></td>
				<td><?php $volume = explode(" ",$value['Perkiraan_Volum']); echo !is_null($value['Perkiraan_Volum']) ? $volume[0] : 0 ; ?></td>
				<td><?php $volume = explode(" ",$value['Perkiraan_Volum']); echo !is_null($value['Perkiraan_Volum']) ? $volume[1] : 0 ; ?></td>
				<td><?php echo $value['biaya']; ?></td>
				<td><?php echo rand(1,100); ?></td>
				<td><?php echo rand(1,100); ?></td>
				<td><?php echo rand(1,100); ?></td>
				<td><?php echo rand(1,100); ?></td>
				<td><?php echo $value['waktu']; ?></td>
				<td><?php echo date('m/Y', strtotime('2018-01-01')); ?></td>
				<td><?php echo date('m/Y', strtotime('2018-12-01')); ?></td>
				<td><?php echo $value['pelaksana']; ?></td>
			</tr>
			@endforeach
			<tr>
				<td align="center" colspan="6">JUMLAH PER BIDANG</td>
				<td>{{ $subtotalArray[] = $subtotal }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>	
			@endforeach
			@endforeach
			<tr>
				<td align="center" colspan="6">JUMLAH TOTAL</td>
				<td>{{ array_sum($subtotalArray) }}</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>	
		</tbody>
	</table>
@endforeach
@endforeach

<?php echo "<p align='right'>Batang, ".date('d-m-Y')."<br>KEPALA DESA KEPUH<br><br><br>( Ahmad Mubarok )</p>"; ?>
</div>
	
</body>
</html>
