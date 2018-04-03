
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tester extends CI_Controller {
// CONTROLLER INI HANYA UNTUK CONTROLLER TESTER SEBELUM DIMASUKAN KE CONTROLLER YANG AKAN DI DEPLOY
  public function __construct()
  {
    parent::__construct();
    $this->load->library('Recaptcha');
  }

  public function captcha()
  {
     $data = array(
          'action' => site_url('tester/logintest'),
          'username' => set_value('username'),
          'password' => set_value('password'),
          'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
          'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
      );

      $this->load->view('tester/welcome_message', $data);
  }

  public function logintest()
  {
     // validasi form
      $this->form_validation->set_rules('username', ' ', 'trim|required');
      $this->form_validation->set_rules('password', ' ', 'trim|required');
      
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

      $recaptcha = $this->input->post('g-recaptcha-response');
      $response = $this->recaptcha->verifyResponse($recaptcha);

      if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
          echo "gagal";
      } else {
          // lakukan proses validasi login disini
          // pada contoh ini saya anggap login berhasil dan saya hanya menampilkan pesan berhasil
          // tapi ini jangan di contoh ya menulis echo di controller hahahaha
          echo 'Berhasil';
      }
  }

  public function manipulasinim()
  {
    $nama ="MOH";

    echo ucwords(strtolower($nama)) ;

  }

  public function testhtml()
  {
    $string = "<h1>halooaa</h1>";
    $string2 = htmlentities($string);
    echo html_entity_decode($string2);
  }

  
  public function cektranskrip()
  {
      $headers = array(
      'Content-Type: application/json',
      'sia:mercubuana2017!'
    );
    // query string
    
    $url = 'https://api.mercubuana.ac.id/akademik/transkripmhs/41814010026';
    // Open connection
    $ch = curl_init();
    // Set the url, number of GET vars, GET data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Execute request
    $result = curl_exec($ch);
    // Close connection
    curl_close($ch);
    // get the result and parse to JSON
    echo $result;

    // $result_arr = json_decode($result, true);
    // print_r($result_arr);
  }

  public function testwebservice()
  {
    $this->load->library('webservice');

    echo $this->webservice->CheckMatkulKP('41814010066','raka hikmah ramadhan');
    echo $this->webservice->CheckMatkulKeseluruhan('41814010066','raka hikmah ramadhan');
    // echo $this->webservice->CheckSKSKp('41814010204');
    // echo $this->webservice->CheckSKSKp('41814010066');
  }

  // public function CheckMatkulKP($nim)
  // {
  //   // request list of contacts from Web API
  //   $url="https://api.mercubuana.ac.id/akademik/esurat/".$nim;

    
  //   $json = file_get_contents($url);
    
  //   echo $this->wenservice->
    
  // }



}

/* End of file Tester.php */
/* Location: ./application/controllers/Tester.php */