<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tabel Tugas Akhir
              <medium class="label label-info">Take</medium>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-home"></i> Dashboard</a></li>
              <li><i class="fa fa-building-o"></i> Surat Tugas Akhir</li>
              <li class="active"><i class="fa fa-table"></i> Tabel Surat Tugas Akhir</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Take Table</h3>
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
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td><?php echo date('d/m/Y');?></td>
                          <td>4151.......</td>
                          <td>Mala</td>
                          <td>Ngok@Crud.com</td>
                          <td>Persilatan</td>
                          <td>
                            <h5 align="center"><strong>SELESAI</strong></h5>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><?php echo date('d/m/Y');?></td>
                          <td>4151......</td>
                          <td>Joss</td>
                          <td>Ngok@crud.com</td>
                          <td>Pertanian</td>
                          <td>
                            <h5 align="center"><strong>SELESAI</strong></h5>
                          </td>
                        </tr>
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