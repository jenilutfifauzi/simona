<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {
    public function __construct()
    {
      parent::__construct();
      // load session library
      $this->load->library('session');
      $this->load->helper('url');
      //kembali ke dashoard
      if($this->session->userdata('role')){
        redirect('dashboard/dashboard');
      }
    }

    public function index(){
        $this->load->view('login_page');
    }

    //mencegah penyusup, data session
    function akses_masuk(){
      $this->load->view('template/403');
    }
  

    public function Auth() {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->db->get_where('user',['email' => $email])->row_array();
      if (password_verify($password,$user['password'])) {
        $data = [
          'id' => $user['id'],
          'email' => $user['email'],
          'name' => $user['name'],
          'role' => $user['role']
        ];
        $session = $this->session->set_userdata($user);
        // print_r($this->session->userdata());
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
            Berhasil Login!
      </div>
      </div>
      ');
        redirect('dashboard/dashboard',$session);
        
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Email atau password salah!
      </div>');
      redirect('/');
    }

    }
}
