<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
</head>
<body>
	<center>
	<h1>Arsip Pembuatan surat Kerja Praktek Tahun Akademik 2018/2019</h1>
	<table border="1" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>No Surat</th>
				<th>Nama Perusahaan</th>
				<th>Alamat Perusahaan</th>
				<th>Jenis Surat</th>
				<th>Tanggal Diambil</th>
				<th>Prodi</th>
				<th>NIM</th>
				<th>NIK</th>
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
                <td><?php cetak($d['nama_perusahaan']);?></td>
                <td><?php cetak($d['alamat_perusahaan']);?></td>
                <td><?php cetak($d['jenis_surat']);?></td>
                <td><?php cetak($d['tanggal_diambil']);?></td>
                <td><?php cetak($d['prodi']);?></td>
                <td><?php cetak($d['nim']);?></td>
                <td><?php cetak($d['nik']);?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</center>
</body>
</html>