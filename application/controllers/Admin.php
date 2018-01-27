<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		if (!$this->session->has_userdata('status')) {
			redirect('home');

		}else if($this->session->userdata('role') =='mahasiswa'){
			redirect('mahasiswa');
		}
	}
   public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/dashboardadmin_v');
		$this->load->view('admin/footer');
	}
  
	public function waitingkp()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data['surat'] = $this->tampilsurat_model->tampil_datakp_waiting();
		$this->load->view('admin/waitingkp',$data);
		$this->load->view('admin/footer');
	}

	public function tolakemailta(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/tolakemailta_v');
		$this->load->view('admin/footer');
	}
    public function tolakemailkp(){
    	$this->load->view('admin/header');
    	$this->load->view('admin/sidebar');
    	$this->load->view('admin/tolakemailkp_v');
    	$this->load->view('admin/footer');
    }
	public function waitingTA()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data['surat'] = $this->tampilsurat_model->tampil_datata_waiting();		
		$this->load->view('admin/waitingta',$data);
		$this->load->view('admin/footer');
	}
	public function proseskp()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data['surat'] = $this->tampilsurat_model->tampil_datakp_proses();		
		$this->load->view('admin/proseskp',$data);
		$this->load->view('admin/footer');
	}
	public function prosesTA()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data['surat'] = $this->tampilsurat_model->tampil_datata_proses();
		$this->load->view('admin/prosesta',$data);
		$this->load->view('admin/footer');
	}
	public function finishkp()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data['surat'] = $this->tampilsurat_model->tampil_datakp_finish();
		$this->load->view('admin/finishkp',$data);
		$this->load->view('admin/footer');
	}
	public function finishTA()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data['surat'] = $this->tampilsurat_model->tampil_datata_finish();
		$this->load->view('admin/finishTA',$data);
		$this->load->view('admin/footer');
	}

	public function takeTA()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/takeTA');
		$this->load->view('admin/footer');
	}
	public function takekp()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/takeKP');
		$this->load->view('admin/footer');
	}


	public function koordinatorupdate($nik){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
    	$dosen = $this->dosen_model->GetWhereDosen("where nik ='$nik'");
    	$data = array(
    		"nik" =>$dosen[0]['nik'],
    		"nama_dosen" =>$dosen[0]['nama_dosen'],
    		"prodi" =>$dosen[0]['prodi'],
    		"jabatan" =>$dosen[0]['jabatan']
    	);
    	$this->load->view('admin/koordinatorupdate_v',$data);
		$this->load->view('admin/footer');
	}


	public function update_data_dosen(){

		$nik=$_POST['nik'];
		$nama_dosen=$_POST['nama_dosen'];
		$prodi=$_POST['prodi'];
		$jabatan=$_POST['jabatan'];
		$nikwhere = $_POST['nikwhere'];

		$data_update=array(
			'nik'=>$nik,
			'nama_dosen'=>$nama_dosen,
			'prodi'=>$prodi,
			'jabatan'=>$jabatan
		);
		$where=array('nik'=>$nikwhere);
		$result=$this->dosen_model->UpdateDataDosen('dosen',$data_update,$where);

		if($result>=1){
			$this->session->set_flashdata('berhasil','true');
			redirect('admin/koordinatorsetting');
		}else{
			$this->session->set_flashdata('gagal','true');
			redirect('admin/koordinatorsetting');
		}

	}
	public function koordinatorsetting(){
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$data=$this->dosen_model->GetDataDosen();
		$this->load->view('admin/koordinatorsetting',array('data'=>$data));
		$this->load->view('admin/footer');
	}
	public function printKPTA(){
		$this->load->view('admin/printKPTA');
	}
	
}



