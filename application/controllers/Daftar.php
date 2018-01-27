<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('status')) {
			if ($this->session->userdata('role')=='mahasiswa') {
				redirect('mahasiswa');
			}elseif($this->session->userdata('role')=='admin' || $this->session->userdata('role')=='superadmin'){
				redirect('admin');
			}
		}
	}

	public function index()
	{
		//form validasi
		$this->form_validation->set_rules('nama','Nama','trim|required');
		$this->form_validation->set_rules('nimmhs','NIM', 'trim|required|exact_length[8]|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|alpha_numeric');
		$this->form_validation->set_rules('repassword', 'Re-Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('reemail', 'Re-Email', 'trim|required|matches[email]');
		$this->form_validation->set_rules('kodenim', 'Program Studi', 'required');
		$this->form_validation->set_rules('prodi', 'Program Studi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('home/header');
			$this->load->view('daftar/daftar');
			$this->load->view('home/footer');
		} else {
			$nimmhs  =$this->input->post('nimmhs');
			$kodemhs =$this->input->post('kodenim');
			$nimlengkap =$kodemhs.$nimmhs;
			$resultchecknim = $this->daftar_model->ceknimmahasiswa($nimlengkap);

			if ($resultchecknim > 0) {
				$this->session->set_flashdata('nimsudahada', 'true');
				redirect('daftar');
			}else{
				$this->daftar_model->registerMahasiswa();
				$this->session->set_flashdata('info_berhasil', 'true');
				redirect('daftar');
			}

		}
	}
}

