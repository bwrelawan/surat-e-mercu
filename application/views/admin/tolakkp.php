         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tabel Kerja Praktek
              <medium class="label label-danger">Arsip Penolakan</medium>
            </h1>
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url('admin') ?>"><i class="fa fa-home"></i> Beranda</a></li>
              <li><i class="fa fa-building-o"></i> Surat Kerja Praktek</li>
              <li class="active"><i class="fa fa-table"></i> Tabel Surat Kerja Praktek</li>
            </ol>
          </section>
          <!-- Main content -->
          <section class="content">
            <div class="row">
              <div class="col-xs-12">

                <div class="box">
                  <!-- header -->
                    <div class="box-body table-responsive">
                      <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th width="20px">No.</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>E-Mail</th>
                            <th>Program Studi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1; ?>
                          <?php foreach ($surat as $value): ?>
                            <tr>
                              <td><?php cetak($no++)?></td>
                              <td><?php cetak($value->nim)?></td>
                              <td><?php cetak($value->nama_mahasiswa)?></td>
                              <td><?php cetak($value->email)?></td>
                              <td><?php cetak($value->prodi)?></td>
                            </tr>
                          <?php endforeach ?>
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