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

		.no-bottom {
			border-bottom: none;
		}

		.no-top {
			border-top: none;
		}

		.border-kanan {
			border-right: 1px;
		}


		.table-laporan tr td {
			text-align: left;
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
	<?php $subtotalArray = [0]; ?>
	<?php foreach($kec as $desa => $des): ?>
	<h3>
		ANGGARAN PENDAPATAN DAN BELANJA DESA<br>
		<?php echo $desa; ?><br>
		TAHUN ANGGARAN <?php echo $tahun; ?>
	</h3>
	<hr>
		Sumberdata : DDS Dana Desa (Droping APBN)
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
					Dana Desa
				</td>
				<td style="text-align:right;">
					<br>
					<?php
						$m = $s = 0;
						array_walk($des, function ($a) use (&$m, &$s) {
							array_walk($a, function ($a) use (&$m, &$s) {
								array_walk($a, function ($a) use (&$m, &$s) {
									array_walk($a, function ($a) use (&$m, &$s) {
										array_walk($a, function ($a) use (&$m, &$s) {
											$s += isset($a["anggaran_rinc"]) ? $a["anggaran_rinc"] : 0;
										});
									});
								});
							});
						});
					?>
					<?php echo number_format($dds->anggaran_dds,2, ",", "."); ?>
				</td>
				<td rowspan="3" style="text-align:center;">
					Sumber DDS
				</td>
			</tr>
			<tr>
				<td style="text-align:center;">JUMLAH PENDAPATAN</td>
				<td style="text-align:right;">
					<?php echo number_format($dds->anggaran_dds,2, ",", "."); ?>
				</td>
			</tr>
			<tr>
				<td class="no-bottom">BELANJA</td>
				<td class="no-bottom"></td>
			</tr>
			<?php foreach($des as $kd => $value): ?>
			<?php foreach($value as $bidang => $bid): ?>
			<?php $subtotal = 0; ?>
			<tr>
				<td class="no-top">
					<u><b><?php echo $bidang; ?></b></u>
			<?php foreach($bid as $kegiatan => $keg): ?>
					<br>
					<b><?php echo $kegiatan; ?></b>
					<br>
			<?php foreach($keg as $jumlah => $value): ?>
					<?php echo $value[0]['nama_jenis']; ?>
			<?php foreach($value as $objek => $value): ?>
					<br>
					
			<?php endforeach; ?>
			<?php endforeach; ?>
			<?php endforeach; ?>
				</td>
				<td style="text-align:right;" class="no-top">
			<?php foreach($bid as $kegiatan => $keg): ?>
			<?php// $subtotal += $value['anggaran_rinc']; ?>
			<?php foreach($keg as $jumlah => $value): ?>
					<br>
					<b><?php echo number_format($jumlah,2, ",", "."); ?></b>
					<br>
					<?php echo number_format($jumlah,2, ",", "."); ?>
			<?php foreach($value as $objek => $value): ?>
					<br>
					<?php echo number_format($value['anggaran_rinc'],2, ",", "."); ?>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<?php endforeach; ?>
				</td>
				<td class="no-top" style="text-align:center;">
					Sumber DDS
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<tr>
				<td><b>JUMLAH BELANJA</b></td>
				<td style="text-align:right;"><b><?php echo number_format($s,2,",","."); ?></b></td>
				<td class="no-top" >&nbsp;</td>
			</tr>
			<tr>
				<td><b>SURPLUS/(DEFISIT)</b></td>
				<td style="text-align:right;"><b><?php echo number_format($modal->anggaran_dds,2,",","."); ?></b></td>
				<td class="no-top" >&nbsp;</td>
			</tr>
			<tr>
				<td>
					<b>PEMBELANJAAN DESA</b>
					<br>	
					<b>Pengeluaran Pembiayaan</b>
					<br>	
					Pengeluaran Pembiayaan
				</td>
				<td style="text-align:right;">
					<br>
					<b><?php echo number_format($modal->anggaran_dds,2,",","."); ?></b>
					<br>
					<?php echo number_format($modal->anggaran_dds,2,",","."); ?>
				</td>
				<td class="no-top" >&nbsp;</td>
			</tr>
			<tr>
				<td>SISA LEBIH /(KURANG) PERHITUNGAN ANGGARAN</td>
				<td style="text-align:right;"><?php echo number_format(0,2,",","."); ?></td>
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
