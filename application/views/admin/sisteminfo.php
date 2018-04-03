       <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tabel Mahasiswa
              <span class="label label-info">Sistem Informasi</span>
              <span class="label label-success"><?=$jmlmhssi?> Pengguna</span>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-home"></i> Beranda</a></li>
              <li><i class="fa fa-book"></i> Mahasiswa</li>
              <li class="active"><i class="fa fa-table"></i> Sistem Informasi</li>
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
                          <th>NIM</th>
                          <th>Nama</th>

                          <th>Program Studi</th>
                          <th>Email</th>

                        </tr>
                      </thead>
                      <tbody>
                       <?php $no=1;
                       foreach ( $mhssi as $u) {
                       ?> 
                        <tr>

                            <td><?php cetak($no++); ?></td>
                            <td><?php cetak($u->nim); ?></td>
                            <td><?php cetak($u->nama_mahasiswa); ?></td>
                            <td><?php cetak($u->prodi); ?></td>
                            <td><?php cetak($u->email); ?></td>

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
