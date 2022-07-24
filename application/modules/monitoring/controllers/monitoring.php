<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends MY_Controller {
    public function __construct()
    {
      parent::__construct();
      // load session library
      $this->load->library('session');
      $this->load->helper('url');
      //mencegah peretas
      if(empty($this->session->userdata('role'))){
        redirect('login/akses_masuk');
      }
      $this->load->model('kota_model');
      $this->load->model('m_monitoring');
    }

    public function index()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Monitoring';
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('sidebar_monitoring');
        $this->load->view('template/footer');
        
    }
    public function d_pengajuan()
    {
        $data['title'] = "Validasi pengajuan";
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('d_pengajuan',$data);
        $this->load->view('template/footer');
        
    }

    public function pie() {
      //memanggil function read pada kota model
      //function read berfungsi mengambil/read data dari table kota di database
      $data_kota = $this->kota_model->lihat_data()->result_array();
      
      //mengirim data ke view
      $output = array(
            'judul' => 'Pie Chart',
            'data_kota' => $data_kota
          );
  
      //memanggil file view
      $this->load->view('chart_pie', $output);
    }

    public function tahap_pengajuan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Tahap Pengajuan';
        $data['user'] = $this->m_monitoring->lihat_data_pengajuan()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('Vtahappengajuan');
        $this->load->view('template/footer');
        
    }


    public function pelaksanaan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Pelaksanaan Terdekat';
        $data['user'] = $this->m_monitoring->lihat_data()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('Vpelaksanaan');
        $this->load->view('template/footer');
        
    }
    public function rekap_kegiatan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Rekap Kegiatan';
        $data['user'] = $this->m_monitoring->rekap()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('Vrekapkegiatan',$data);
        $this->load->view('template/footer');
        
    }

    public function terserap()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Monitoring Realisasi';
        $where = array(
          'status_lpj' => 2,
        );
        $data['data_terlaksana'] = $this->m_monitoring->edit_data($where,'data_pengajuan')->result_array();


        $where = array(
          'status_pengajuan' => 0,
        );
        $data['data_belum_terlaksana'] = $this->m_monitoring->edit_data($where,'kegiatan')->result_array();


        $data['user'] = $this->m_monitoring->lihat_data()->result_array();
        $data_anggaran = $this->kota_model->lihat_data()->result_array();
        $data['anggaran_terserap'] = $this->m_monitoring->data_anggaran_terserap()->row();
        $data['total_anggaran'] = $this->m_monitoring->data_anggaran_total()->row();

        //data target
        $data['data_target'] = $this->m_monitoring->getData('target')->row();
        $data_anggaran_tot = $this->m_monitoring->data_anggaran_terserap_tot();
        $data_anggaran_terbaru = $this->m_monitoring->data_anggaran_terserap_terbaru();
        $data['data_anggaran_terbaru1'] = $this->m_monitoring->data_anggaran_terserap_terbaru1();
        $data_tot = $data_anggaran_tot->jumlah_anggaran; 
        $data_terbaru = $data_anggaran_terbaru->jumlah_anggaran; 

        $data['data_persen_terbaru'] = ($data_terbaru / $data_tot ) * (100);
      //mengirim data ke view
      $output = array(
            'judul' => 'Pie Chart',
          );
        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('Vterserap',$output);
        $this->load->view('template/footer');
        
    }
}
