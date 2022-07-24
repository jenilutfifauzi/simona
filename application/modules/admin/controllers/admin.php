<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct()
    {
      parent::__construct();
      // load session library
      $this->load->library('session');
      $this->load->helper('url');
      //mencegah peretas
      if(empty($this->session->userdata('role') && $this->session->userdata('role') =='admin' )){
        redirect('login/akses_masuk');
      }
	  $data = $this->session->userdata();
	  $this->load->model('m_user');
    }

    public function index(){
        $data = $this->session->userdata();
        $data['title'] = 'Dashboard Admin';
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('admin/sidebar_admin');
        $this->load->view('template/dashboard',$data);
        $this->load->view('template/footer');
    }
    public function manage_user()
    {
      $data = $this->session->userdata();
      $data['user'] = $this->m_user->tampil_data()->result_array();
      $data['title'] = 'Manage User';
          $this->load->view('template/header',$data);
          $this->load->view('template/navbar',$data);
          $this->load->view('sidebar_admin');
          $this->load->view('manage_user',$data);
          $this->load->view('template/footer');
    }

    public function tambah_aksi_user()
    {
      
              $id 			  = '';
              $name 			= $this->input->post('name');
              $email			= $this->input->post('email');
              $password 	=  $this->input->post('password');
              $password1  = password_hash($password, PASSWORD_DEFAULT);
              $role 		  = $this->input->post('role');
              
        $data = array(
              'id' => $id,
              'name' => $name,
              'email' => $email,
              'password' => $password1,
              'role' => $role,    
        );
        $this->m_user->insert_data('user',$data);
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data User Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('admin/manage_user');  
	  }
    public function delete($id)
    {
      $where = array('id' => $id);
      $this->m_user->hapus_data($where,'user');
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Data User Berhasil Dihapus
      </div>');
      redirect('admin/manage_user');
    }

    public function durasiotp()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Durasi Otp';
      $data['durasi'] = $this->db->get('durasiotp')->row();

      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_admin');
      $this->load->view('durasiotp',$data);
      $this->load->view('template/footer');   
    }
    public function durasi_pin()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Kadarluasa PIN';
      $data['durasi'] = $this->db->get('is_otp')->row();

      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_admin');
      $this->load->view('durasi_pin',$data);
      $this->load->view('template/footer');   
    }

    public function durasilogin()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Durasi Login';
      $data['durasi'] = $this->db->get('timeout')->row();

      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_admin');
      $this->load->view('timeout',$data);
      $this->load->view('template/footer');   
    }

    public function editotp($id)
    {
      $data = $this->session->userdata();
      $data['title'] = 'Edit durasi';

      $where = array('id' => $id);
	    $data['durasi'] = $this->m_user->edit_data($where,'durasiotp')->result();

      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_admin');
      $this->load->view('editdurasi',$data);
      $this->load->view('template/footer');
    }
    public function edit_pin($id)
    {
      $data = $this->session->userdata();
      $data['title'] = 'Edit durasi PIN';

      $where = array('id' => $id);
	    $data['durasi'] = $this->m_user->edit_data($where,'is_otp')->result();

      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_admin');
      $this->load->view('editdurasipin',$data);
      $this->load->view('template/footer');
    }
    public function edit_session($id)
    {
      $data = $this->session->userdata();
      $data['title'] = 'Edit durasi session';
      
      $where = array('id' => $id);
	    $data['durasi'] = $this->m_user->edit_data($where,'timeout')->result();
	    // $durasi = $this->m_user->edit_data($where,'timeout')->result();

      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_admin');
      $this->load->view('editdurasilogin',$data);
      $this->load->view('template/footer');
    }

    public function update_otp()
    {
      $id = 1;
      $durasi = $this->input->post('durasi');

      date_default_timezone_set('Asia/Jakarta');
      $tanggalSekarang=date('Y-m-d h:i:s');
      $datetime = new DateTime($tanggalSekarang);
      $datetime->modify('+'.$durasi.' minute');

      $create=$datetime->format('Y-m-d H:i:s');

      $data = array(
        'id' => $id,
        'durasi' => $durasi,
        'create_at' => $create
      );
      $where = array(
        'id' => $id
      );

      $this->m_user->update_data($where,$data,'durasiotp');
      redirect('admin/durasiotp');
    }
    public function update_pin()
    {
      $id = 1;
      $durasi = $this->input->post('durasi');

      date_default_timezone_set('Asia/Jakarta');
      $tanggalSekarang=date('Y-m-d h:i:s');
      $datetime = new DateTime($tanggalSekarang);
      $datetime->modify('+'.$durasi.' minute');

      $create=$datetime->format('Y-m-d H:i:s');

      $data = array(
        'id' => $id,
        'kadaluarsa' => $durasi,
        'created_at' => $tanggalSekarang,
      );
      $where = array(
        'id' => $id
      );

      $this->m_user->update_data($where,$data,'is_otp');
      redirect('admin/durasi_pin');
    }
    public function update_durasi_login()
    {
      $id = 1;
      $durasi = $this->input->post('durasi');
      $durasi = $durasi*60000;

      date_default_timezone_set('Asia/Jakarta');
      $tanggalSekarang=date('Y-m-d h:i:s');
      

      $data = array(
        'id' => $id,
        'time' => $durasi,
        'create_at' => $tanggalSekarang,
      );
      $where = array(
        'id' => $id
      );

      $this->m_user->update_data($where,$data,'timeout');
      redirect('admin/durasilogin');
    }

}
