<h1 align="center"> STATUS PENGAJUAN RISET KP</h1>
<br>
<br>
<br>
<?php  if($this->session->flashdata('berhasil')): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>Info</h4>
    Berhasil Mendaftar Surat KP
  </div>
<?php endif; ?>

<table class="table table-striped" id="datatable" >
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>Jenis Surat</th>
      <th>Tanggal Pengajuan</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>

    <?php $class=""; ?>
    <?php foreach ($statuskp as $value): ?>
      <?php 
      switch ($value->status) {
        case 'Di Tolak':
        $class="label-danger";
        break;
        case 'Menunggu':
        $class="label-primary";
        break;
        case 'Proses':
        $class="label-warning";
        break; 
        case 'Selesai':
        $class="label-success";
        break;     
        case 'Ambil':
        $class="label-terima";
        break;
      }
      ?>
      <tr>
        <td><?php cetak($value->nama_mahasiswa)  ?></td>
        <td><?php cetak($value->jenis_surat)  ?></td>
        <td><?php cetak(date('d-M-Y',strtotime($value->tanggal_diajukan)))  ?></td>
        <td class=<?=$class?> style="text-align: center;">
          <?php if ($value->status == 'Ambil'): ?>
            Sudah Diambil
          <?php else: ?>  
            <?php cetak($value->status) ?>
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>

  </tbody>
</table>

<hr>
<hr>

<h1 align="center">STATUS PENGAJUAN RISET TA</h1>
<br>
<br>
<br>
<?php  if($this->session->flashdata('berhasil')): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i>Info</h4>
    Berhasil Mendaftar Surat TA
  </div>
<?php endif; ?>

<table class="table table-striped" id="datatable2">
  <thead>
    <tr>
      <th>Nama Mahasiswa</th>
      <th>Jenis Surat</th>
      <th>Tanggal Pengajuan</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>

    <?php $class=""; ?>
    <?php foreach ($statusta as $value): ?>
      <?php 
      switch ($value->status) {
        case 'Di Tolak':
        $class="label-danger";
        break;
        case 'Menunggu':
        $class="label-primary";
        break;
        case 'Proses':
        $class="label-warning";
        break; 
        case 'Selesai':
        $class="label-success";
        break;     
        case 'Ambil':
        $class="label-terima";
        break;
      }
      ?>
      <tr>
        <td><?php cetak($value->nama_mahasiswa) ?></td>
        <td><?php cetak($value->jenis_surat) ?></td>
        <td><?php cetak(date('d-M-Y',strtotime($value->tanggal_diajukan))) ?></td>
        <td class=<?=$class?> style="text-align: center;">
          <?php if ($value->status == 'Ambil'): ?>
            Sudah Diambil
          <?php else: ?>  
            <?php cetak($value->status) ?>
          <?php endif ?>
        </td>
      </tr>
    <?php endforeach ?>

  </tbody> 
</table>