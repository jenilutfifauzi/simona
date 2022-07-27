<?php

use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Direktur extends MY_Controller {

	public function __construct()
    {
      parent::__construct();
      // load session library
      $this->load->library('session');
      $this->load->helper('url');
      //mencegah peretas
      if(empty($this->session->userdata('role') && $this->session->userdata('role') =='direktur' )){
        redirect('login/akses_masuk');
      }
	  $data = $this->session->userdata();
	  $this->load->model('M_direktur');
    }

    public function index(){
        $data = $this->session->userdata();
        $data['title'] = 'Dashboard Direktur';
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_direktur');
        $this->load->view('template/dashboard',$data);
        $this->load->view('template/footer');
    }
    public function usulan_anggaran_thn()
    {
      $data = $this->session->userdata();
      $data['user'] = $this->M_direktur->usulan_thn()->result_array();
      $data['title'] = 'Usulan Anggaran Tahunan';
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_direktur');
      $this->load->view('draf_thn',$data);
      $this->load->view('template/footer');
    }

    //keg baru
    public function usulan_anggaran_thn_keg_baru()
    {
      $data = $this->session->userdata();
      $data['user'] = $this->M_direktur->usulan_thn_keg_baru()->result_array();
      $data['title'] = 'Usulan Anggaran Tahunan';
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_direktur');
      $this->load->view('draf_thn_keg_baru',$data);
      $this->load->view('template/footer');
    }
    public function lihat_rab()
    {
      $id_data = $this->uri->segment(3);	
      $data = $this->session->userdata();
      
      $data['title'] = 'Kelola RAB';
      $data['durasi'] = $this->db->get('durasiotp')->row();

      $where = array('kode' => $id_data);
	    $data['data_rab_kode'] = $this->M_direktur->edit_data($where,'kegiatan')->row();
	    $data['data_rab'] = $this->M_direktur->edit_data($where,'rab')->result_array();
      //data dukung
      
	    $data['data_dukung_kode'] = $this->M_direktur->edit_data($where,'kegiatan')->row();
	    $data['data_gambar'] = $this->M_direktur->edit_data($where,'data_dukung')->row();
	    $data['data_dukung'] = $this->M_direktur->edit_data($where,'data_dukung')->result_array();


      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_direktur');
      $this->load->view('data_rab_datadukung',$data);
      $this->load->view('template/footer');
    }


    public function revisi()
    {
      $data = $this->session->userdata();
      $id = $this->uri->segment(3);
      $data['title'] = 'Revisi RAB dan Data Dukung';
      $where = array('kode_subkomponen' => $id);
	    $data['data_kegiatan'] = $this->M_direktur->edit_data($where,'kegiatan')->result_array();

      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('sidebar_direktur');
      $this->load->view('revisi',$data);
      $this->load->view('template/footer');
    }

    public function aksi_revisi()
    {
      $id_unit		= $this->input->post('id_unit');
      $kode 			= $this->input->post('kode');
      $komentar			= $this->input->post('komentar');
        
      $data = array(
        'id_unit' => $id_unit,
        'kode' => $kode,
        'komentar' => $komentar,
         
      );        
        
      $this->M_direktur->insert_data('revisi',$data);
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Revisi Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('direktur/usulan_anggaran_thn');  
	  }
    public function aksi_validasi()
    {
      $kode = $this->uri->segment(3);
      $direktur = 1;
      $data = array(
        'direktur' => $direktur,
        
      );
      $where = array(
        'kode_subkomponen' => $kode
      );

      $this->M_direktur->update_data($where,$data,'kegiatan');
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('direktur/usulan_anggaran_thn');
    }

    public function aksi_validasi_keg_baru()
    {
      $kode = $this->uri->segment(3);
      $status = 1;
      $data = array(
        'direktur' => $status,
        
      );
      $where = array(
        'kode_subkomponen' => $kode
      );

      $this->M_direktur->update_data($where,$data,'kegiatan_baru');
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('Direktur/usulan_anggaran_thn_keg_baru');
    }

    //keg baru
    public function revisi_keg_baru()
    {
      $data = $this->session->userdata();
      $id = $this->uri->segment(3);
      $data['title'] = 'Revisi RAB dan Data Dukung';
      $where = array('kode_subkomponen' => $id);
	    $data['data_kegiatan'] = $this->M_direktur->edit_data($where,'kegiatan_baru')->result_array();

      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_direktur');
      $this->load->view('revisi',$data);
      $this->load->view('template/footer');
    }


}
