<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Tabel Kerja Praktek
              <medium class="label label-info">Terima</medium>
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
                

                  <label for="enddate">End Date</label>

                <!-- Modal -->
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> Hapus </button>
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
    
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-body">
              <center> <p> Masukan Tanggal Untuk Penghapusan Data </p> </center>
            </div>
         <center> <?php echo form_open('surat/hapusKP'); ?>
            Dari Tanggal :
            <input type="date" name="startdate">
            Sampai Tanggal :
            <input type="date" name="finishdate">
          <input type="submit" name="hapus" value="Kirim" />
          <?php echo form_close(); ?> </center> <br>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
      
        </div>
      </div>

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
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; foreach ($surat as $u): ?>
                          <tr>
                            <td><?=$no++?></td>
                            <td><?=$u->tanggal_diambil?></td>
                            <td><?=$u->no_surat?></td>
                            <td><?=$u->nim?></td>
                            <td><?=$u->nama_mahasiswa?></td>
                            <td><?=$u->email?></td>
                         2   <td><?=$u->prodi?></td>
                            <td>
                              <p class="label label-success" style="font-size: 15px">Selesai</p>
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
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
        </div>
      </body><script>
      $(function() {
  $('#datetimepicker1').datetimepicker({
    language: 'pt-BR'
  });
    $('#datetimepicker2').datetimepicker({
    language: 'pt-BR'
  });
});
</script>