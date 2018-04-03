<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tabel Kerja Praktek

			<medium class="label label-success">Selesai</medium>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url('admin') ?>">
					<i class="fa fa-home"></i> Beranda</a>
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
			<div class="col-xs-12">
				<!-- /.box -->
				<?php if ($this->session->flashdata('info')): ?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4>
						<i class="icon fa fa-check"></i>Info</h4>
					Berhasil Merubah Status Kerja Praktek menjadi Ambil
				</div>
				<?php endif ?>
				<div class="box">
					<!-- /<div class="bo">/div>x-header -->
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
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no=1;
                      foreach ($surat as $u) {
                       ?>
								<tr>
									<td>
										<?php echo $no++; ?>
									</td>
									<td>
										<?php cetak(date('d-M-Y',strtotime($u->tanggal_selesai)));?>
									</td>
									<td>
										<?php cetak($u->no_surat);?>
									</td>
									<td>
										<?php cetak($u->nim);?>
									</td>
									<td>
										<?php cetak($u->nama_mahasiswa); ?>
									</td>
									<td>
										<?php cetak($u->email); ?>
									</td>
									<td>
										<?php cetak($u->prodi); ?>
									</td>
									<td>
										<button class="btn btn-primary col-sm-9" data-href="<?=site_url(" surat/ubahAmbilKP/$u->id_surat")?>" data-toggle="modal" data-target="#confirm" >
											<span class="fa fa-check"></span> Take
										</button>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->

<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
			</div>

			<div class="modal-body">
				<p class="debug-url"></p>
				<p>
					Isi nama pengambil surat : <input type="text" name="namaPengambil" id="namaPengambil">
				</p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary btn-ok" id="btnKonfirmasiNama">Konfirmasi</a>
			</div>
		</div>
	</div>
</div>
