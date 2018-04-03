         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tabel Tugas Akhir
              <span class="label label-primary">Menunggu</span>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-home"></i> Beranda</a></li>
              <li><i class="fa fa-book"></i> Surat Tugas Akhir</li>
              <li class="active"><i class="fa fa-table"></i> Tabel Tugas Akhir</li>
            </ol>
          </section>

          <section class="content">
            <div class="row">
              <div class="col-sm-12">

                <div class="box">
                  <!-- /.box-header -->
                  <div class="box-body table-responsive">
                    <table id="datatable" class="table table-bordered table-striped text-center">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>Program Studi</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1;
                        foreach ($surat as $u) {
                        ?>
                        <tr>
                          <td><?php cetak($no++); ?></td>
                            <td><?php cetak($u->tanggal_diajukan); ?></td>
                            <td><?php cetak($u->nim); ?></td>
                            <td><?php cetak($u->nama_mahasiswa); ?></td>
                            <td><?php cetak($u->prodi); ?></td>
                          <td class="col-md-3">
                              <button type="button" class="btn btn-primary">Proses</button>
                              <button type="button" class="btn btn-default">Detail</button>
                              <a href="<?php echo site_url('admin/tolakemailta') ?>" class="btn btn-danger">Tolak</a>
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
      </div>
    </section>
  </div>
</body>
