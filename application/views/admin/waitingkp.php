         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tabel Kerja Praktek
              <span class="label label-primary">Waiting</span>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-home"></i> Dashboard</a></li>
              <li><i class="fa fa-building-o"></i> Surat Kerja Praktek</li>
              <li class="active"><i class="fa fa-table"></i> Tabel Surat Kerja Praktek</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Table Waiting</h3>
                  </div>
                  <!-- /<div class="bo">/div>x-header -->
                    <div class="box-body table-responsive">
                      <table id="datatable" class="table table-bordered table-striped">
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
                          <?php $no =1;
                          foreach ($surat as $u) {
                          ?>
                          <tr>
                           <td><?php echo $no++; ?></td>
                            <td><?php echo date('d-M-Y',strtotime($u->tanggal_diajukan))  ?></td>
                            <td><?php echo $u->nim; ?></td>
                            <td><?php echo $u->nama_mahasiswa; ?></td>
                            <td><?php echo $u->prodi; ?></td>
                            <td>
                              <div class="btn-group">
                                <a href="<?php echo site_url("surat/ubahProsesKP/$u->id_surat") ?>" class="btn btn-primary">Proses</a>
                                <a href="<?php echo site_url("admin/tolakemailkp") ?>" class="btn btn-default">Detail</a>
                                <a href="<?php echo site_url("admin/tolakemailkp") ?>" class="btn btn-danger">TOLAK</a>
                              </div>
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
              <!-- /.row -->
            </section>
            <!-- /.content -->
          </div>
        </body>