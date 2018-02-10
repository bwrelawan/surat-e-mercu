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

		$this->session->set_flashdata('info','true');
		redirect('admin/waitingkp');	
	}

	public function ubahFinishKP($id_surat)
	{
		$this->statussurat_model->SuratKpToFinish($id_surat);
		$kirimemail = $this->tampilsurat_model->GetIdentitasMahasiswa($id_surat);

		$namafile 		= $kirimemail->id_surat;
		$emailmahasiswa	= $kirimemail->email;
		//Load the library
	    $this->load->library('html2pdf');
	    
	    $this->html2pdf->folder('./assets/pdfs/');
	    $this->html2pdf->filename($namafile.'.pdf');
	    $this->html2pdf->paper('a4', 'portrait');
	    
	    $data = array(
	    	'nama_mahasiswa' => $kirimemail->nama_mahasiswa,
	    	'jenis_surat' => $kirimemail->jenis_surat,
	    	'nim'		  => $kirimemail->nim,
	    	'tanggal_diajukan' =>$kirimemail->tanggal_diajukan,
	    	'no_surat'   => $kirimemail->no_surat
	    );
	    //Load html view
	    $this->html2pdf->html($this->load->view('tiket/pdf', $data, true));
	    $subjek = "[E-SURAT] "." ".$kirimemail->nama_mahasiswa." ".$kirimemail->jenis_surat;
	    //Check that the PDF was created before we send it
	    if($path = $this->html2pdf->create('save')) {
	    	
	    	$config = Array(  
            'protocol' => 'smtp',  
            'smtp_host' => 'https://www.mohagustiar.info/',  
            'smtp_port' =>  465,  
            'smtp_user' => 'contactme@mohagustiar.info',   
            'smtp_pass' => 'gundu12345',  
            'smtp_keepalive'=>'TRUE',
            'mailtype' => 'html',   
            'charset' => 'iso-8859-1'  
          );  
	        $this->load->library('email', $config);  
	        $this->email->set_newline("\r\n");  
		    $this->email->from('contactme@mohagustiar.info','Raka Hikmah');
			$this->email->to($emailmahasiswa); 
				
			$this->email->subject($subjek);
			$this->email->message('Haloo Ini adalah tiket bukti pembayaran kamu');	
			$this->email->attach($path);
			$this->email->send();
			
			$this->session->set_flashdata('info','true');
			redirect('admin/proseskp');
		}
		
	}

	

	public function kirimpesantolak()
	{
		
        $kepada = $this->input->post('emaildikirim');
		$subjek = $this->input->post('subjek');
		$id_surat = $this->input->post('id_surat');

		$isi    = $this->input->post('isipesantolak');
		
		$config = Array(  
	        'protocol' => 'smtp',  
	        'smtp_host' => 'https://www.mohagustiar.info/',  
	        'smtp_port' =>  465,  
	        'smtp_user' => 'contactme@mohagustiar.info',   
	        'smtp_pass' => 'gundu12345',  
	        'smtp_keepalive'=>'TRUE',
	        'mailtype' => 'html',   
	        'charset' => 'iso-8859-1'  
        );

        $this->load->library('email', $config);  
        $this->email->set_newline("\r\n");  
	    $this->email->from('contactme@mohagustiar.info','Raka Hikmah');
		$this->email->to($kepada); 
			
		$this->email->subject($subjek);
		$this->email->message($isi);
		$this->email->set_mailtype("html");
		$this->email->send();

		$this->statussurat_model->SuratKpToTolak($id_surat);

		$this->session->set_flashdata('infotolak','true');
	    redirect('admin/waitingkp');


	}

	public function ubahAmbilKP($id_surat)
	{
		$this->statussurat_model->SuratKpToTake($id_surat);

		$this->session->set_flashdata('info','true');
	    redirect('admin/finishkp');
	}

	public function hapusKP()
	{
		$start_date = $this->input->post('startdate');
		$end_date = $this->input->post('finishdate');

		$this->statussurat_model->HapusDataKP($start_date,$end_date);

	}

}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
