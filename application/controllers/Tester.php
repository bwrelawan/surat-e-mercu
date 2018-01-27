
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends CI_Controller {

	public function index()
	{
		$kodesurat = $this->nomorsurat_model->NomorSuratKP();
		echo $kodesurat;		
	}

	public function kirim_email()
	{
		$ci = get_instance();
        $ci->load->library('email');
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = 465;
        $config['smtp_user'] = "--sensor--";
        $config['smtp_pass'] = "--sensorr";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        
        
        $ci->email->initialize($config);
 
        $ci->email->from('--sensor--', '--sensor--');
        $list = array('--sensor--');
        $ci->email->to($list);
        $ci->email->subject('judul email');
        $ci->email->message('isi email');
        if ($this->email->send()) {
            echo 'Email sent.';
        } else {
            show_error($this->email->print_debugger());
        }

	}

    public function testsurat()
    {
        echo $this->daftarsurat_model->GetIdSuratToMahasiswa($this->session->userdata('nim'))->id_surat;
        
    }

}

/* End of file Tester.php */
/* Location: ./application/controllers/Tester.php */