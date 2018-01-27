         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tabel Kerja Praktek
              <medium class="label label-warning">Process</medium>
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
                    <h3 class="box-title">Process Table</h3>
                  </div>
                  <!-- /<div class="bo">/div>x-header -->
                  <div class="box-body table-responsive">
                    <table id="datatable" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="20px">No.</th>
                          <th>Tanggal</th>
                          <th>NIM</th>
                          <th>Nama</th>
                          <th>E-Mail</th>
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
                          <td><?php echo date('d-M-Y',strtotime($u->tanggal_diajukan))?></td>
                          <td><?php echo $u->nim; ?></td>
                          <td><?php echo $u->nama_mahasiswa; ?></td>
                          <td><?php echo $u->email; ?></td>
                          <td><?php echo $u->prodi; ?></td>
                          <td>
                            <a class="btn btn-success col-sm-5 col-sm-offset-1 btn-finish" href="#"><span class="fa fa-check"></span>Finish</a><a class="btn btn-primary col-sm-5 col-sm-offset-1 btn-finish" href="#">Print <span class="glyphicon glyphicon-print"></span></a>
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