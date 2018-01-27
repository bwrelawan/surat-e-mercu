<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content container" style="padding: 0px 0px;">
     <div class="row">
       <div class="login-box">
          <div class="login-logo">
          </div>
          <!-- /.login-logo -->
          <?php echo form_open('login/ceklogin'); ?>
          <div class="login-box-body">
            <p class="login-box-msg">Silahkan Login Dengan Menggunakan <b>NIM/EMAIL</b></p>
            <?php if($this->session->flashdata('info')): ?>
              <div class="row">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    Maaf username/nim dan password salah
                </div>
              </div>
            <?php endif; ?>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="NIM/email" name="username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-md-4 col-md-offset-8">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login" />
                </div>
                <!-- /.col -->
              </div>
          </div>
          <?php echo form_close(); ?>
          <!-- /.login-box-body -->
        </div>
      </div>

<div class="row">
  <center>
  <p>Belum Punya Akun E-Surat?</p>
  <a class="btn btn-danger" href="#">DAFTAR</a>
</div>
</center>

    </section>


<script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap/dist/js/bootstrap.min.js')?>" ></script>
</body>
</html>
     
   




