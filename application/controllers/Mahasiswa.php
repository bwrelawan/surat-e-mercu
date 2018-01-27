<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set("Asia/Jakarta");
		parent::__construct();
		if (!$this->session->has_userdata('status')) {
			redirect('login');
		}else if(($this->session->userdata('role') =='admin') || ($this->session->userdata('role') =='superadmin') ){
			redirect('admin');
		}
	}
	

	public function index()
	{

		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/pilihan');
	     $this->load->view('home/footer');
		echo "berhasil login sebagai user ";
	    echo $this->session->userdata('nama_mahasiswa');
	    echo anchor('login?logout=signout', 'keluar');

	}

	public function formkp()
	{
		$this->load->view('mahasiswa/header');
		$this->load->view('mahasiswa/formkp');
		$this->load->view('home/footer');
	}

	public function daftarsuratkp()
	{
	 $row 	   = $this->input->post('anggota');
	
	 
	 $jumlahmahasiswa = 0;

	 for ($y=1; $y <=$row ; $y++) { 
		$fnim 		  = $this->input->post("fnim$y");
  		$nim  		  = $this->input->post("nim$y");
  		$nimmahasiswa = $fnim.$nim;

  		$hasil = $this->daftarsurat_model->validasimahasiswa($nimmahasiswa);	
  		$jumlahmahasiswa = $hasil+$jumlahmahasiswa;
	 }


	  if ($jumlahmahasiswa > 0 ) {
		  	$this->session->set_flashdata('gagal', 'true');
		  	redirect('mahasiswa/formkp');
	  }else{
		  	

			  	$data = array (
					'id_surat'			 => $this->nomorsurat_model->IDSurat(),
					'no_surat'  		 => '',
					'nama_perusahaan' 	 => $this->input->post('namaperusahaan'),
					'alamat_perusahaan'  => $this->input->post('alamat'),
					'orang_dituju'   	 => $this->input->post('namefor'),
					'jenis_surat'    	 => 'Kerja Praktek',
					'tanggal_diajukan'   => date('Y-m-d'),
					'tanggal_selesai'    => '0000-00-00',
					'tanggal_diambil'    => '0000-00-00',
					'status'         	 => 'Menunggu',
					'tahun'				 => date('Y'),	
					'nim' 				 => $this->session->userdata('nim'),
					'nik'				 => '0002'
			   );

		  	  $this->daftarsurat_model->daftarsuratkp($data,'surat');
			  $idsurat = $this->daftarsurat_model->GetIdSuratToMahasiswa($this->session->userdata('nim'))->id_surat;
		  	  
		  	  for ($i=1; $i <=$row ; $i++) { 
			  		$fnim 		  = $this->input->post("fnim$i");
			  		$nim  		  = $this->input->post("nim$i");
			  		$nimmahasiswa = $fnim.$nim;
			  		$nama 		  = $this->input->post("nama$i");

			  		$data = array(
			  			'id_surat'			=> $idsurat,
			  			'nim'	  			=> $nimmahasiswa,
			  			'nama_mahasiswa'	=> $nama	
			  		);
					
					$this->daftarsurat_model->InsertMahasiswa($data);
				}

				$this->session->set_flashdata('berhasil', 'true');
				redirect('mahasiswa/formkp');
		}

	}

}

/* End of file Mahasiswa.php */
/* Location: ./application/controllers/Mahasiswa.php */