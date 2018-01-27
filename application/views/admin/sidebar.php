    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url('assets/image/logoadmin.png')?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $this->session->userdata('username'); ?></p>
            <i class="fa fa-circle text-success"></i> Online 
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <!-- isi side bar navigation -->

          <!-- Menu Dashboard -->
          <li class="<?php if($this->uri->segment(2)==""){echo 'active';} ?>">
            <a href="<?php echo site_url('admin')?>">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- Menu Surat Kerja Praktek -->
          <li class="treeview <?php if($this->uri->segment(2)=="waitingkp" OR $this->uri->segment(2)=="tolakemailkp"){ echo 'active waiting-active';} 
          else if($this->uri->segment(2)=="finishkp"){echo 'active finish-active';} 
          else if ($this->uri->segment(2)=="proseskp"){echo 'active proses-active';} 
          else if($this->uri->segment(2)=="takekp"){echo 'active take-active';}?>">
            <a href="#">
              <i class="fa fa-building-o"></i>
              <span>Surat Kerja Praktek</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if($this->uri->segment(2)=="waitingkp" OR $this->uri->segment(2)=="tolakemailkp"){ echo 'active waiting-active ';} ?>"><a href="<?php echo site_url('admin/waitingkp') ?>"><i class="fa fa-spinner"></i> Waiting</a></li>
              <li class="<?php if($this->uri->segment(2)=="proseskp"){echo 'active proses-active';} ?>"><a href="<?php echo site_url('admin/proseskp') ?>"><i class="fa fa-pencil"></i> Process</a></li>
              <li class="<?php if($this->uri->segment(2)=="finishkp"){ echo 'active finish-active';} ?>"><a href="<?php echo site_url('admin/finishkp') ?>"><i class="fa fa-check"></i> Finish</a></li>
              <li class="<?php if($this->uri->segment(2)=="takekp"){echo 'active take-active';}?>"><a href="<?php echo site_url('admin/takekp') ?>"><i class="fa fa-external-link"></i> Take</a></li>
            </ul>
          </li>
<!-- Menu Surat Sidang -->
          <li class="treeview <?php if($this->uri->segment(2)=="waitingTA" OR $this->uri->segment(2)=="tolakemailta"){ echo 'active waiting-active';} 
          else if($this->uri->segment(2)=="finishTA"){ echo 'active finish-active';}
          else if ($this->uri->segment(2)=="prosesTA"){echo 'active proses-active';} 
          else if($this->uri->segment(2)=="takeTA"){echo 'active take-active';}?>">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Surat Tugas Akhir</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php if($this->uri->segment(2)=="waitingTA" OR $this->uri->segment(2)=="tolakemailta"){ echo 'active waiting-active';} ?>"><a href="<?php echo site_url('admin/waitingTA') ?>"><i class="fa fa-spinner"></i> Waiting</a></li>
              <li class="<?php if($this->uri->segment(2)=="prosesTA"){echo 'active proses-active';} ?>"><a href="<?php echo site_url('admin/prosesTA') ?>"><i class="fa fa-pencil"></i> Process</a></li>
              <li class="<?php if($this->uri->segment(2)=="finishTA"){echo 'active finish-active';} ?>"><a href="<?php echo site_url('admin/finishTA') ?>"><i class="fa fa-check"></i> Finish</a></li>
              <li class="<?php if($this->uri->segment(2)=="taketa"){echo 'active take-active';} ?>"><a href="<?php echo site_url('admin/taketa') ?>"><i class="fa fa-external-link"></i> Take</a></li>
            </ul>
          </li>
          <!-- Menu untuk setting dosen -->
          <li class="<?php if($this->uri->segment(2)=="koordinatorsetting" OR $this->uri->segment(2)=="koordinatorupdate"){echo 'active';} ?>">
            <a href="<?php echo site_url('admin/koordinatorsetting') ?>">
              <i class="fa fa-user"></i>
              <span>Setting Koordinator</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>