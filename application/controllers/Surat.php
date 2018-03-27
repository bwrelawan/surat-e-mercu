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
		$data = $this->tampilsurat_model->detailKP($id_surat);
		$isi= html_entity_decode(
			"Halo, ".$data['nama_mahasiswa']." pengajuan surat kerja praktek Anda sudah masuk ke tahap proses untuk dapat mengambil surat kerja praktek Anda diharapkan untuk menunggu hingga pemberitahuan selanjutnya, Terimakasih

			<br><br>
			Salam,
			TU FASILKOM"
		) ;

		$config = Array(  
	        'protocol' => 'smtp',  
	        'smtp_host' => 'https://www.mohagustiar.info/',  
	        'smtp_port' =>  465,  
	        'smtp_user' => 'contactme@mohagustiar.info',   
	        'smtp_pass' => 'project2m123!@#',  
	        'smtp_keepalive'=>'TRUE',
	        'mailtype' => 'html',   
	        'charset' => 'iso-8859-1'  
        );

        $this->load->library('email', $config);  
        $this->email->set_newline("\r\n");  
	    $this->email->from('contactme@mohagustiar.info','Raka Hikmah');
		$this->email->to($data['email']); 
			
		$this->email->subject("Surat Anda Sedang Di Proses");
		$this->email->message($isi);
		$this->email->set_mailtype("html");
		$this->email->send();

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
		$isi       = html_entity_decode("Halo ".$kirimemail->nama_mahasiswa." surat yang kamu ajukan telah selesai dibuat, untuk dapat mengambil surat yang kamu ajukan di TU FASILKOM kamu <b>diharuskan</b> untuk membawa tanda bukti yang bisa kamu unduh di lampiran yang bersamaan dengan pesan ini.
		<br><br>
		Salam,
		TU FASILKOM");
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
	    $this->html2pdf->html($this->load->view('tiket/pdf2', $data, true));
	    $subjek = "[E-SURAT] "." ".$kirimemail->nama_mahasiswa." ".$kirimemail->jenis_surat;
	    //Check that the PDF was created before we send it
	    if($path = $this->html2pdf->create('save')) {
	    	
	    	$config = Array(  
            'protocol' => 'smtp',  
            'smtp_host' => 'https://www.mohagustiar.info/',  
            'smtp_port' =>  465,  
            'smtp_user' => 'contactme@mohagustiar.info',   
            'smtp_pass' => 'project2m123!@#',  
            'smtp_keepalive'=>'TRUE',
            'mailtype' => 'html',   
            'charset' => 'iso-8859-1'  
          );  
	        $this->load->library('email', $config);  
	        $this->email->set_newline("\r\n");  
		    $this->email->from('contactme@mohagustiar.info','Raka Hikmah');
			$this->email->to($emailmahasiswa); 
				
			$this->email->subject($subjek);
			$this->email->message($isi);	
			$this->email->set_mailtype("html");
			$this->email->attach($path);
			$this->email->send();
			
			$this->session->set_flashdata('info','true');
			redirect('admin/proseskp');
		}
		
	}


	public function kirimpesantolakkp($idsurat)
	{
		$data = $this->tampilsurat_model->detailKP($idsurat);
		$pesan = htmlentities($this->input->post('isipesantolak'));
		$isi= html_entity_decode($pesan) ;

		$config = Array(  
	        'protocol' => 'smtp',  
	        'smtp_host' => 'https://www.mohagustiar.info/',  
	        'smtp_port' =>  465,  
	        'smtp_user' => 'contactme@mohagustiar.info',   
	        'smtp_pass' => 'project2m123!@#',  
	        'smtp_keepalive'=>'TRUE',
	        'mailtype' => 'html',   
	        'charset' => 'iso-8859-1'  
        );

        $this->load->library('email', $config);  
        $this->email->set_newline("\r\n");  
	    $this->email->from('contactme@mohagustiar.info','Raka Hikmah');
		$this->email->to($data['email']); 
			
		$this->email->subject($this->input->post('subjek'));
		$this->email->message($isi);
		$this->email->set_mailtype("html");
		$this->email->send();

		$this->statussurat_model->SuratKpToTolak($data['id_surat']);

		$this->session->set_flashdata('infotolak','true');
	    redirect('admin/waitingkp');
	}

	public function ubahAmbilKP($id_surat)
	{
		$this->statussurat_model->SuratKpToTake($id_surat);

		$this->session->set_flashdata('info','true');
	    redirect('admin/finishkp');
	}
	public function ubahProsesTA($id_surat)
	{
		$data = $this->tampilsurat_model->detailTA($id_surat);
		$isi= html_entity_decode(
			"Halo, ".$data['nama_mahasiswa']." pengajuan surat tugas akhir Anda sudah masuk ke tahap proses untuk dapat mengambil surat kerja praktek Anda diharapkan untuk menunggu hingga pemberitahuan selanjutnya, Terimakasih

			<br><br>
			Salam,
			TU FASILKOM"
		) ;

		$config = Array(  
	        'protocol' => 'smtp',  
	        'smtp_host' => 'https://www.mohagustiar.info/',  
	        'smtp_port' =>  465,  
	        'smtp_user' => 'contactme@mohagustiar.info',   
	        'smtp_pass' => 'project2m123!@#',  
	        'smtp_keepalive'=>'TRUE',
	        'mailtype' => 'html',   
	        'charset' => 'iso-8859-1'  
        );

        $this->load->library('email', $config);  
        $this->email->set_newline("\r\n");  
	    $this->email->from('contactme@mohagustiar.info','Raka Hikmah');
		$this->email->to($data['email']); 
			
		$this->email->subject("Surat Anda Sedang Di Proses");
		$this->email->message($isi);
		$this->email->set_mailtype("html");
		$this->email->send();

		$SelectSurat 		= $this->tampilsurat_model->SelectSurat($id_surat);
		$nomorsuratta       = $this->nomorsurat_model->NomorSuratRisetTA($SelectSurat->prodi);

		$ubahStatusToProses	= $this->statussurat_model->SuratTAToProses($id_surat,$nomorsuratta);

		$this->session->set_flashdata('info','true');
		redirect('admin/waitingta');	
	}

}

/* End of file Surat.php */
/* Location: ./application/controllers/Surat.php */
