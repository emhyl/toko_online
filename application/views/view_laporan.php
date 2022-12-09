<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<style type="text/css">
		table{
			margin: 30px auto;
		}
	</style>
</head>
<body>
	<h1><center> Laporan penjualan toko hidroponik bulukumba</center></h1>
	<hr>
	<div>
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>NO</th>
				<th>NAMA</th>
				<th>ALAMAT</th>
				<th>NO HP</th>
				<th>TANGAL</th>
				<th>HARGA</th>
			</tr>
			<?php $no=1; foreach($data as $row): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row->nama  ?></td>
				<td><?= $row->alamat  ?></td>
				<td><?= $row->no_hp  ?></td>
				<td><?= $row->tgl  ?></td>
				<td><?= $row->total  ?></td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="5">TOTAL :</td>
				<td><?= $total ?></td>
			</tr>
		</table>
		
	</div>
	
</body>
</html>