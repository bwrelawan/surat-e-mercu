<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
</head>
<body><center>
	<h2>Daftar Laporan Pengambilan Surat Kp Jurusan <?=$jurusan?></h2>
	<h3><?=date('d-m-Y',strtotime($dari))?> - <?=date('d-m-Y',strtotime($sampai))?></h3>
	<table  border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>No Surat</th>
				<th>NIM</th>
				<th>Nama Mahasiswa</th>
				<th>Nama Perusahaan</th>
				<th>Tanggal Diambil</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$i=0;
			foreach($data as $d) {
				$i++;
				?>
				<tr>
					<td><?=$i;?></td>
					<td><?php cetak($d['no_surat']);?></td>
					<td><?php cetak($d['nim']);?></td>
					<td><?php cetak($d['nama_perusahaan']);?></td>
					<td><?php cetak($d['alamat_perusahaan']);?></td>
					<td><?php cetak($d['tanggal_diambil']);?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table></center>
	</body>
	</html>