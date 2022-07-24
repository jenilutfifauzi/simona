<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rka extends MY_Controller {
    public function __construct()
    {
      parent::__construct();
      parent::__construct();
      // load session library
      $this->load->library('session','excel');
      $this->load->helper('url');
      //mencegah peretas
      if(empty($this->session->userdata('role') && $this->session->userdata('role') =='bagianperencanaan' )){
        redirect('login/akses_masuk');
      }
	  $data = $this->session->userdata();
	  $this->load->model('m_perencanaan');
    }

    
}