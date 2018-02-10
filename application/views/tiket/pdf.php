<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>CSS Ticket</title>

<style>
  .bg-blue{
    background:#1976D2;
  }
  .text-blue{
    color: #1976D2;
  }
  .text-white{
    color: white;
  }
  .text-center{
    text-align: center;
  }
  .text-muted{
    color: #34495E;
  }
  .notice{
    background: black;
    color: white;
    padding: 10px ;
    margin-bottom: 20px;
  }
  table{
  margin: 0 auto;
    border: 3px dashed black;
    border-collapse: collapse;
    /*padding: 20px;*/
  }
  table td{
    border: 2px solid gray;
    padding: 0 10px;
  }
</style>
  
</head>
  
<body>
<div class="notice text-center">
  Print dan bawa tiket ini untuk ditukarkan dengan surat Kerja Praktek/Riset Tugas Akhir di Tata Usaha
</div>
<br /><br /><br />
  <table>

    <tr>
      <td colspan="3" class="bg-blue">
      
        <h2 class="text-center text-white">
          E SURAT | <?=$jenis_surat?>
        </h2>
      </td>
     <!--  <td class="text-center">
        <img src="<?php echo base_url('assets/image/logomercu.png') ?>" width="120" alt="">
      </td> -->
     
    </tr>

    <tr>
      <td>
      <p class="text-blue">Nomor Surat:</p>
        
        <h3 class="text-center text-muted">
          <?=$no_surat?>
        </h3>
      </td>
      <td>
        <p class="text-blue">Nama Mahasiswa:</p>
        
        <h3 class="text-center text-muted">
          <?="$nama_mahasiswa - $nim"?>
        </h3>
      </td>
      <td>
        <p class="text-blue">Tanggal Diajukan:</p>
        
        <h3 class="text-center text-muted">
          <?=date("d M Y",strtotime($tanggal_diajukan))?>
        </h3>
      </td>

    </tr>
   <!--  <tr>
      <td>
      <p class="text-blue">Nama Perusahaan:</p>
        
        <h3 class="text-center text-muted">
          <?=$nama_perusahaan?>
        </h3>
      </td>
      <td colspan="2">
        <p class="text-blue">Alamat Perusahaan:</p>
        
        <h3 class="text-center text-muted">
          <?="$alamat_perusahaan"?>
        </h3>
      </td>
      
    </tr> -->
  </table>


</body>

</html>