
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends CI_Controller {

	public function index()
	{
		$kodesurat = $this->nomorsurat_model->NomorSuratKP();
		echo $kodesurat;		
	}

	public function kirim_email($id_surat)
	{
		$kirimemail = $this->tampilsurat_model->GetIdentitasMahasiswa($id_surat);

        $namafile       = $kirimemail->id_surat;
        $emailmahasiswa = $kirimemail->email;
        //Load the library
        $this->load->library('html2pdf');
        
        $this->html2pdf->folder('./assets/pdfs/');
        $this->html2pdf->filename($namafile.'.pdf');
        $this->html2pdf->paper('a4', 'portrait');
        
        $data = array(
            'nama_mahasiswa' => $kirimemail->nama_mahasiswa,
            'jenis_surat' => $kirimemail->jenis_surat,
            'nim'         => $kirimemail->nim,
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

	}
}
    public function testsurat()
    {
        echo $this->daftarsurat_model->GetIdSuratToMahasiswa($this->session->userdata('nim'))->id_surat;
        
    }

    public function tiket(){
        $data= $this->tampilsurat_model->GetIdentitasMahasiswa('SR0001');
        $this->load->view('tiket/pdf',$data);
    }

    public function teststring()
    {
        $nim = ("41814010066@student.mercubuana.ac.id");
        echo substr($nim,11);
    }
}

/* End of file Tester.php */
/* Location: ./application/controllers/Tester.php */