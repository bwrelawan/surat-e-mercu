<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class="m-b-30">
			Tabel Kerja Praktek
			<medium class="label label-terima">Terima</medium>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url('admin') ?>">
					<i class="fa fa-home"></i> Dashboard</a>
			</li>
			<li>
				<i class="fa fa-building-o"></i> Surat Kerja Praktek</li>
			<li class="active">
				<i class="fa fa-table"></i> Tabel Surat Kerja Praktek</li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('gagal_tanggal')): ?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4>
						<i class="icon fa fa-close"></i>Info</h4>
					Maaf tanggal awal harus lebih kecil dari tanggal akhir
				</div>
				<?php elseif($this->session->flashdata('berhasil_hapus')): ?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4>
						<i class="icon fa fa-close"></i>Info</h4>
					Berhasil Menghapus Surat Untuk Kerja Praktek
				</div>
				<?php endif ?>
			</div>
			<div class="col-xs-12">
				<div class="box">

					<div class="box-body table-responsive">
						<table id="datatable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th width="20px">No.</th>
									<th>Tanggal</th>
									<th>Nomor Surat</th>
									<th>NIM</th>
									<th>Nama</th>
									<th>E-Mail</th>
									<th>Program Studi</th>
									<th>Status</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($surat as $u): ?>
								<tr>
									<td>
										<?php cetak($no++)?>
									</td>
									<td>
										<?php cetak(date('d-M-Y',strtotime($u->tanggal_diambil)))?>
									</td>
									<td>
										<?php cetak($u->no_surat)?>
									</td>
									<td>
										<?php cetak($u->nim)?>
									</td>
									<td>
										<?php cetak($u->nama_mahasiswa)?>
									</td>
									<td>
										<?php cetak($u->email)?>
									</td>
									<td>
										<?php cetak($u->prodi)?>
									</td>
									<td>
										<p class="label label-success" style="font-size: 15px">Selesai</p>
									</td>
									<td align="center">
										<button class="label btn label-default m-t--10" data-toggle="modal" data-target="#modal-detail" style="font-size: 16px;">Detail</button>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Hapus Data Surat</h4>
			</div>
			<form action="<?php echo base_url('admin/HapusSuratKP')?>" class="form-horizontal" method="POST" role="form">
				<div class="form-group">
					<label for="startdate" class="col-md-3 control-label">Dari Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="startdate" class="form-control datepicker" placeholder="Tanggal awal">
					</div>
				</div>
				<div class="form-group">
					<label for="enddate" class="col-md-3 control-label">Sampai Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="finishdate" class="form-control datepicker" placeholder="Tanggal awal">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>



<div class="modal fade" id="rekapitulasiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Laporan Untuk Rekapitulasi</h4>
			</div>
			<form action="<?php echo base_url('admin/cetakLAPkp')?>" class="form-horizontal" method="POST" role="form">
				<div class="form-group">
					<label for="jurusan" class="col-md-3 control-label">Jurusan</label>
					<div class="col-md-8">
						<select name="jurusan" class="form-control" required>
							<option value=''>Pilih Jurusan</option>
							<option value="Sistem Informasi">Sistem Informasi</option>
							<option value="Teknik Informatika">Teknik Informatika</option>
						</select>
					</div>
				</div>
				<div class="form-group ">
					<label for="startdate" class="col-md-3 control-label">Dari Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="startdate" class="form-control datepicker" placeholder="Tanggal awal">
					</div>
				</div>
				<div class="form-group ">
					<label for="startdate" class="col-md-3 control-label">Sampai Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="finishdate" class="form-control datepicker" placeholder="Tanggal Akhir">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="laporanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Laporan Data Surat</h4>
			</div>
			<form action="<?php echo base_url('tester/chart')?>" class="form-horizontal" method="POST" role="form">
				<div class="form-group">
					<label for="startdate" class="col-md-3 control-label">Dari Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="startdate" class="form-control datepicker" placeholder="Tanggal awal">
					</div>
				</div>
				<div class="form-group">
					<label for="enddate" class="col-md-3 control-label">Sampai Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="enddate" class="form-control datepicker" placeholder="Tanggal awal">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="laporanJurusanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Laporan Data Surat Perjurusan</h4>
			</div>
			<form action="<?php echo base_url('tester/perjurusan')?>" class="form-horizontal" method="POST" role="form">
				<div class="form-group">
					<label for="startdate" class="col-md-3 control-label">Dari Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="startdate" class="form-control datepicker" placeholder="Tanggal awal">
					</div>
				</div>
				<div class="form-group">
					<label for="enddate" class="col-md-3 control-label">Sampai Tanggal</label>
					<div class="col-md-8">
						<input type="text" name="enddate" class="form-control datepicker" placeholder="Tanggal awal">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<div class="pull-left header">
					<i class="fa fa-th"></i> Detail</li>
				</div>
			</div>
			<div class="modal-body">
				<div class="nav-tabs-custom">
					<!-- judul tab -->
					<ul class="nav nav-tabs align-center">
						<li class="active">
							<a href="#pengambilSurat" data-toggle="tab">Pengambil Surat</a>
						</li>
						<li>
							<a href="#pengusulSurat" data-toggle="tab">Pengusul Kerja Praktek</a>
						</li>
						<li>
							<a href="#perusahaan" data-toggle="tab">Perusahaan</a>
						</li>
						<li>
							<a href="#anggota" data-toggle="tab">Anggota</a>
						</li>
					</ul>
					<!-- isi tab -->
					<div class="tab-content">
						<!-- detail nama pengambil -->
						<div class="tab-pane active" id="pengambilSurat">
							<div class="table-responsive no-padding">
								<table class="table table-hover" border="0">
									<tr>
										<th>Nama</th>
										<th>Waktu Ambil</th>
									</tr>
									<tr>
										<td>Tukiyem</td>
										<td>
											<?php echo date("d-m-y")?>
										</td>
									</tr>
								</table>
							</div>
						</div>

						<!-- detail pengusul -->
						<div class="tab-pane" id="pengusulSurat">
							<div class="table-responsive no-padding">
								<table class="table table-hover" border="0">
									<tr>
										<th>Tanggal Usul</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Program Studi</th>
									</tr>
									<tr>
										<td>
											<?php echo date("d-m-y")?>
										</td>
										<td>
											41815010033
										</td>
										<td>Nama pengusul</td>
										<td>Sistem Informasi</td>
									</tr>
								</table>
							</div>
						</div>

						<!-- detail perusahaan -->
						<div class="tab-pane" id="perusahaan">
							<div class="table-responsive no-padding">
								<table class="table table-hover" border="0">
									<tr>
										<th>Nama</th>
										<th>Alamat</th>
										<th>Untuk</th>
										<th>Jabatan</th>
									</tr>
									<tr>
										<td>PT abc
										</td>
										<td>
											Kalideres
										</td>
										<td>Pak Bengkong</td>
										<td>Office Boy</td>
									</tr>
								</table>
							</div>
						</div>

						<!-- detail anggota -->
						<div class="tab-pane" id="anggota">
							<div class="table-responsive no-padding">
								<table class="table table-hover" border="0">
									<tr>
										<th>Nomor</th>
										<th>Nama</th>
										<th>NIM</th>
									</tr>
									<tr>
										<td>1</td>
										<td>mbew</td>
										<td>41815010033</td>
									</tr>
									<tr>
										<td>2</td>
										<td>mbew</td>
										<td>41815010033</td>
									</tr>
									<tr>
										<td>3</td>
										<td>mbew</td>
										<td>41815010033</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- END Detail TABS -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-right" data-dismiss="modal" aria-label="Close">Close</button>
			</div>
		</div>
	</div>
</div>

