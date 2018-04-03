<div class="container-fluid">
          <!-- CHART -->
       
          <div class="row">
            <!-- CHART STATUS LAPORAN -->
            <div class="col-xs-5">
            <div class="box box-primary" style="margin-top: 87px;">

            <div class="row">
              <div class="col-xs-1">
                <h4 class="tunggu-chart">&#9632</h4>
              </div>

              <div class="col-xs-4">
                <h4>Menunggu : <?php echo $kpwaiting?> </h4>
              </div>
              <div class="col-xs-1 col-xs-offset-2">
                <h4 class="proses-chart">&#9632</h4>
              </div>
              <div class="col-xs-4">
                <h4>Proses : <?php echo $kpproses?> </h4>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-1">
                <h4 class="selesai-chart">&#9632</h4>
              </div>
              <div class="col-xs-4">
                <h4>Selesai : <?php echo $kpfinish?> </h4>
              </div>
             <div class="col-xs-1 col-xs-offset-2">
               <h4 class="ambil-chart">&#9632</h4>
             </div>
             <div class="col-xs-4">
               <h4>Terima : <?php echo $kptake?> </h4>
             </div>

            </div>
            
            <div class="row">
              <div class="col-xs-1 col-xs-offset-4">
                <h4 class="ditolak-chart">&#9632</h4>
              </div>

              <div class="col-xs-5">
                <h4>Ditolak : <?php echo $kptolak?> </h4>

              </div>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
 <div class="col-xs-4 col-xs-offset-2">
                <div class="box-body">
                  <canvas id="pieChart"></canvas>
                </div>
            </div>
          </div>

          <!-- TABEL -->
          <div class="container">
            <div class="row">
                <div class="col-xs-12">
                  <h4 class="box-title tunggu-chart text-center">Menunggu</h4>       
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      <?php foreach ($suratwaiting as $surat): ?>
                        <tr>
                          <td><?php cetak($no++)?></td>
                          <td><?php cetak($surat['nim'])?></td>
                          <td><?php cetak($surat['nama_mahasiswa'])?></td>
                          <td><?php cetak($surat['email'])?></td>
                          <td><?php cetak($surat['prodi'])?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>

              </div>
              <div class="row">  
                <div class="col-xs-12">
                  <h4 class="box-title proses-chart text-center">Proses</h4>       
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      <?php foreach ($suratproses as $surat): ?>
                        <tr>
                          <td><?php cetak($no++)?></td>
                          <td><?php cetak($surat['nim'])?></td>
                          <td><?php cetak($surat['nama_mahasiswa'])?></td>
                          <td><?php cetak($surat['email'])?></td>
                          <td><?php cetak($surat['prodi'])?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <h4 class="box-title selesai-chart text-center">Selesai</h4>       

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $no=1; ?>
                      <?php foreach ($suratfinish as $surat): ?>
                        <tr>
                          <td><?php cetak($no++)?></td>
                          <td><?php cetak($surat['nim'])?></td>
                          <td><?php cetak($surat['nama_mahasiswa'])?></td>
                          <td><?php cetak($surat['email'])?></td>
                          <td><?php cetak($surat['prodi'])?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            <div class="row"> 
                <div class="col-xs-12">
                  <h4 class="box-title ambil-chart text-center">Terima</h4>       
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $no=1; ?>
                      <?php foreach ($surattake as $surat): ?>
                        <tr>
                          <td><?php cetak($no++)?></td>
                          <td><?php cetak($surat['nim'])?></td>
                          <td><?php cetak($surat['nama_mahasiswa'])?></td>
                          <td><?php cetak($surat['email'])?></td>
                          <td><?php cetak($surat['prodi'])?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <h4 class="box-title ditolak-chart text-center">Ditolak</h4>       
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      <?php foreach ($surattolak as $surat): ?>
                        <tr>
                          <td><?php cetak($no++)?></td>
                          <td><?php cetak($surat['nim'])?></td>
                          <td><?php cetak($surat['nama_mahasiswa'])?></td>
                          <td><?php cetak($surat['email'])?></td>
                          <td><?php cetak($surat['prodi'])?></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
</div>
</body>

<script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jQueryUI/jquery-ui.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/raphael/raphael.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/morris.js/morris.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/Flot/jquery.flot.js')?>"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('assets/plugins/Flot/jquery.flot.resize.js')?>"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('assets/plugins/Flot/jquery.flot.pie.js')?>"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url('assets/plugins/Flot/jquery.flot.categories.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.js')?>"></script>
<script>

 //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    // JSON STATUS
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : <?=$kptolak?>,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Ditolak'
      },
      {
        value    : <?=$kpwaiting?>,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Menunggu'
      },
      {
        value    : <?=$kpproses?>,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'Proses'
      },
      {
        value    : <?=$kpfinish?>,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Selesai'
      },
      {
        value    : <?=$kptake?>,
        color    : '#7D3C98',
        highlight: '#7D3C98',
        label    : 'Terima'
      },
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
</script>

</html>
