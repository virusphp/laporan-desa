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
	<h3>
		ANGGARAN PENDAPATAN DAN BELANJA DESA<br>
		PEMERINTAH DESA KEPUH<br>
		TAHUN ANGGARAN 2018
	</h3>
	<hr>
	<p>
		Sumberdata : DDS Dana Desa (Droping APBN)
	</p>	
	<table width="100%" class="table-laporan" border="1">
		<thead>
			<tr>
				<th>KODE REK</th>
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
				<th>4</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td rowspan="2" style="text-align:center;">
					1.
					<br>
					1.2
				</td>
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
				<td rowspan="2" style="text-align:center;">
					Sumber DDS
				</td>
			</tr>
			<tr>
				<td>JUMLAH PENDAPATAN</td>
				<td>769.835.000,00</td>
			</tr>

			<tr>
				<td rowspan="2" style="text-align:center;">
					2.
					<br>
					2.2
					<br>
					2.2.1
				</td>
				<td>
					BELANJA 
					<br>
					Bidang Pelaksanaa Pembangunan Desa
					<br>
					Kegiatan pembangunan irigasi
					<br>
					Kegiatan apa saja	
				</td>
				<td>
					<br>
					769.835.000,00
					<br>
					769.835.000,00
					<br>
					769.835.000,00
				</td>
				<td rowspan="2" style="text-align:center;">
					Sumber DDS
				</td>
			</tr>
			<tr>
				<td>JUMLAH PENDAPATAN</td>
				<td>769.835.000,00</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>SISA LEBIH /(KURANG) PERHITUNGAN ANGGARAN</td>
				<td>000</td>
				<td>&nbsp;</td>
			</tr>
	</table>

<?php echo "<p align='right'>Batang, ".date('d-m-Y')."<br>KEPALA DESA KEPUH<br><br><br>( Ahmad Mubarok )</p>"; ?>
</div>
	
</body>
</html>
