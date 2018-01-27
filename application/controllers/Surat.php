<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('role') =='mahasiswa') {
			redirect('mahasiswa');
		}elseif(!$this->session->has_userdata('role')){
			redirect('login');
		}
	}

	public function ubahProsesKP($id_surat)
	{
		$SelectSurat 		= $this->tampilsurat_model->SelectSurat($id_surat);
		$nomorsuratkp       = $this->nomorsurat_model->NomorSuratKP($SelectSurat->prodi);

		$ubahStatusToProses	= $this->statussurat_model->SuratKpToProses($id_surat,$nomorsuratkp);

		redirect('admin');	
	}

}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
