<section class="content-header">
	<h1 class="text-center ">Surat Pengantar Kerja Praktek</h1>
</section>
<div class="form-horizontal m-t-30">
	<section class="content container">
		<div class="row">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('gagal')): ?>
				<div class="alert alert-danger alert-dismissible ">
					<button type="button " class="close " data-dismiss="alert " aria-hidden="true ">×</button>
					<h4>
						<i class="icon fa fa-close "></i>Info</h4>
					Maaf Nim sudah terdaftar dan belum diambil atau anda baru mengambil dan harus jeda 1 hari untuk mendaftar lagi
				</div>
				<?php elseif($this->session->flashdata('berhasil')): ?>
				<div class="alert alert-success alert-dismissible ">
					<button type="button " class="close " data-dismiss="alert " aria-hidden="true ">×</button>
					<h4>
						<i class="icon fa fa-check "></i>Info</h4>
					Anda Berhasil Mendaftar Surat Kerja Praktek
				</div>
				<?php endif ?>
			</div>
		</div>
		<?php echo form_open('mahasiswa/daftarsuratkp',array('class'=>'form-test','method'=>'post')); ?>

		<section class="content">

			<div class="form-group inline ">
				<!-- Nama Perusahaan -->
				<label class="col-md-3 " for="namaperusahaan">Nama Perusahaan yang dituju</label>
				<div class="col-md-6 ">
					<input type="text " name="namaperusahaan" class="form-control " required placeholder="Nama Perusahaan ">
				</div>
			</div>

			<div class="form-group inline ">
				<!-- Orang yang dituju -->
				<label class="col-md-3 " for="namaygdituju">Personal yang Dituju</label>
				<div class="col-md-6 ">
					<input type="text " name="namefor" class="form-control " required placeholder="Orang Dituju ">
				</div>
			</div>

			<div class="form-group inline ">
				<!-- Orang yang dituju -->
				<label class="col-md-3 " for="jabatan">Jabatan</label>
				<div class="col-md-6 ">
					<input type="text " name="jabatan" class="form-control " required placeholder="Jabatan ">
				</div>
			</div>

		</section>

		<section class="content m-t-60">

			<div class="form-group inline ">
				<!-- Alamat Perusahaan -->
				<label class="col-md-3 " for="propinsi ">Propinsi</label>
				<div class="col-md-6 ">
					<select class='form-control' id='provinsi' name="provinsi " required>
						<option value=''>Pilih Provinsi</option>
						<?php 
						foreach ($provinsi as $prov) {
							echo "<option value='$prov[id]'>$prov[nama]</option>"; } ?>
					</select>
				</div>
			</div>

			<div class="form-group inline">
				<!-- Alamat Perusahaan -->
				<label class="col-md-3" for="alamat">Kabupaten/Kota</label>
				<div class="col-md-6">
					<select class='form-control' id='kabupaten-kota' name="kota_kabupaten" required>
						<option value=''>Pilih Kabupaten/Kota</option>
					</select>
				</div>
			</div>

			<div class="form-group inline">
				<!-- Alamat Perusahaan -->
				<label class="col-md-3" for="kecamatan">Kecamatan</label>
				<div class="col-md-6">
					<select class='form-control' id='kecamatan' name="kecamatan" required>
						<option value=''>Pilih Kecamatan</option>
					</select>
				</div>
			</div>

			<div class="form-group inline">
				<!-- Alamat Perusahaan -->
				<label class="col-md-3" for="kecamatan">Kelurahan/Desan</label>
				<div class="col-md-6">
					<select class='form-control' id='kelurahan-desa' name="kelurahan" required>
						<option value=''>Pilih Kelurahan</option>
					</select>
				</div>
			</div>

			<div class="form-group inline">
				<!-- Alamat Perusahaan -->
				<label class="col-md-3" for="kodepos">Kode Pos</label>
				<div class="col-md-6">
					<select class='form-control' id='kodepos' name="kodepos" required>
						<option value=''>Pilih Kode Pos</option>
					</select>
				</div>
			</div>

			<div class="form-group inline">
				<!-- Alamat Perusahaan -->
				<label class="col-md-3" for="alamat">Alamat Jalan Perusahaan</label>
				<div class="col-md-6">
					contoh : Jl. Rebana No.9
					<input type="text" name="alamat" class="form-control" required placeholder="contoh: Jln Galunggung no.xx">
				</div>
			</div>

		</section>
		<section class="content m-t-60">

			<div class="form-group inline">
				<!-- Jumlah Anggota -->
				<label class="col-md-3" for="tambah">Jumlah Anggota </label>
				<div class="col-md-6">
					<select id="anggota" name="anggota" class="form-control text-center">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</div>
			</div>
			<!-- Penentuan Nim -->
			<?php 
			if ($this->session->userdata('jurusan')=='Teknik Informatika') {
				$nimdepan = "415";
			}elseif($this->session->userdata('jurusan')=='Sistem Informasi'){
				$nimdepan = "418";
			}
			?>
			<div class="form-group">
				<!-- Jurusan -->
				<label for="jurusan" class="control-label col-md-4 col-xs-3">Jurusan</label>
				<div class="col-md-4 col-xs-8">
					<select name="jurusan" class="form-control" id="jurusan" onchange="prodi()" disabled>
						<option value="" selected>Pilih Jurusan</option>
						<option value="Teknik Informatika" <?php if($this->session->userdata('jurusan')=='Teknik Informatika'){echo "selected";} ?> >Informatika</option>
						<option value="Sistem Informasi" <?php if($this->session->userdata('jurusan')=='Sistem Informasi'){echo "selected";}?> >Sistem Informasi</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<!-- NIM Mahasiswa 1-->
				<label class="control-label col-md-4 col-xs-3" for="nim">NIM</label>

				<div class="col-md-1 col-xs-3 col-sm-2">
					<input type="text" class="form-control" id="fnim1" name="fnim1" value="<?=substr($this->session->userdata('nim'),0,3)?>"
					readonly>
				</div>


				<div class="col-md-3 col-xs-5 col-sm-6">
					<input type="text" class="form-control" name="nim1" id="nim1" value="<?=substr($this->session->userdata('nim'),3)?>" onkeypress="return no(event)"
					readonly>
				</div>

			</div>

			<div class="form-group">
				<!-- Nama Mahasiswa 1 -->
				<label class="control-label col-md-offset-1 col-xs-3" for="nama">Nama Lengkap</label>

				<div class="col-md-4 col-xs-8">
					<input type="text" name="nama1" class="form-control" id="nama1" value="<?=$this->session->userdata('nama_mahasiswa')?>" readonly>
				</div>

			</div>

			<div class="form-group">
				<!-- Nama Mahasiswa 1 -->
				<label class="control-label col-md-offset-1 col-xs-3" for="nama">No Handphone</label>

				<div class="col-md-4 col-xs-8">
					<input type="text" name="nohp1" class="form-control" id="nohp1" value="" placeholder="No Handphone" onkeypress="return no(event)"
					required>
				</div>

			</div>

			<div class="form-tambahan ft2">
				<hr>
				<div class="form-group test">
					<!-- NIM Mahasiswa 2 -->
					<label class="control-label col-md-4 col-xs-3" for="nim">NIM</label>

					<div class="col-md-1 col-xs-3 col-sm-2">
						<input type="text" class="form-control" id="fnim2" name="fnim2" value="<?=$nimdepan?>" readonly>
					</div>

					<div class="col-md-3 col-xs-5 col-sm-6">
						<input type="text" class="form-control" name="nim2" id="nim2" onkeypress="return no(event)">
					</div>

				</div>


				<div class="form-group">
					<!-- Nama Mahasiswa 2 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">Nama Lengkap</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nama2" class="form-control" id="nama2">
					</div>

				</div>

				<div class="form-group">
					<!-- Nama Mahasiswa 1 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">No Handphone</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nohp2" class="form-control" id="nohp2" value="" placeholder="No Handphone" onkeypress="return no(event)">
					</div>

				</div>

			</div>

			<div class="form-tambahan ft3">
				<hr>
				<div class="form-group">
					<!-- NIM Mahasiswa 3 -->
					<label class="control-label col-md-4 col-xs-3" for="nim">NIM</label>

					<div class="col-md-1 col-xs-3 col-sm-2">
						<input type="text" class="form-control" id="fnim3" name="fnim3" value="<?=$nimdepan?>" readonly>
					</div>

					<div class="col-md-3 col-xs-5 col-sm-6">
						<input type="text" class="form-control" name="nim3" id="nim3" onkeypress="return no(event)">
					</div>

				</div>

				<div class="form-group">
					<!-- Nama Mahasiswa 3 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">Nama Lengkap</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nama3" class="form-control" id="nama3">
					</div>
				</div>

				<div class="form-group">
					<!-- Nama Mahasiswa 1 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">No Handphone</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nohp3" class="form-control" id="nohp3" value="" placeholder="No Handphone" onkeypress="return no(event)">
					</div>

				</div>
			</div>

			<div class="form-tambahan ft4">
				<hr>
				<div class="form-group">
					<!-- NIM Mahasiswa 4 -->
					<label class="control-label col-md-4 col-xs-3" for="nim">NIM</label>

					<div class="col-md-1 col-xs-3 col-sm-2">
						<input type="text" class="form-control" id="fnim4" name="fnim4" value="<?=$nimdepan?>" readonly>
					</div>
					<div class="col-md-3 col-xs-5 col-sm-6">
						<input type="text" class="form-control" name="nim4" id="nim4" onkeypress="return no(event)">
					</div>


				</div>
				<div class="form-group">
					<!-- Nama Mahasiswa 4 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">Nama Lengkap</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nama4" class="form-control" id="nama4">
					</div>
				</div>

				<div class="form-group">
					<!-- Nama Mahasiswa 1 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">No Handphone</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nohp4" class="form-control" id="nohp4" value="" placeholder="No Handphone" onkeypress="return no(event)">
					</div>

				</div>

			</div>

			<div class="form-tambahan ft5">
				<hr>
				<div class="form-group">
					<!-- NIM Mahasiswa 5 -->
					<label class="control-label col-md-4 col-xs-3" for="nim">NIM</label>

					<div class="col-md-1 col-xs-3 col-sm-2">
						<input type="text" class="form-control" name="fnim5" id="fnim5" value="<?=$nimdepan?>" readonly>
					</div>

					<div class="col-md-3 col-xs-5 col-sm-6">
						<input type="text" class="form-control" name="nim5" id="nim5" onkeypress="return no(event)">
					</div>

				</div>


				<div class="form-group">
					<!-- Nama Mahasiswa 5 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">Nama Lengkap</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nama5" class="form-control" name="nama5" style="margin-bottom: 15px">
					</div>
				</div>

				<div class="form-group">
					<!-- Nama Mahasiswa 1 -->
					<label class="control-label col-md-offset-1 col-xs-3" for="nama">No Handphone</label>

					<div class="col-md-4 col-xs-8">
						<input type="text" name="nohp5" class="form-control" id="nohp5" value="" placeholder="No Handphone" onkeypress="return no(event)">
					</div>

				</div>

			</div>
		</section>
		<div class="checkbox text-center">
			<label>
				<input type="checkbox" value="" onchange="isChecked(this, 'sub1')">Data yang saya masukkan adalah data yang sesuai dan sebenarnya.</label>
		</div>

		<div class="form-group m-t-25 m-b-25">
			<!-- Button daftar -->
			<div class="align-center">
				<button id="sub1" class="btn btn-primary btn-lg" disabled="disabled">Daftar</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</section>
</div>

<script>
	function prodi() {
		var jurusan = document.getElementById("jurusan").value;
		document.getElementById("fnim1").value = jurusan;
		document.getElementById("fnim2").value = jurusan;
		document.getElementById("fnim3").value = jurusan;
		document.getElementById("fnim4").value = jurusan;
		document.getElementById("fnim5").value = jurusan;
	}

	function no(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
	}

</script>

