<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppspm extends MY_Controller {
    public function __construct()
    {
      parent::__construct();
      parent::__construct();
      // load session library
      $this->load->library('session');
      $this->load->helper('url');
      //mencegah peretas
      if(empty($this->session->userdata('role') && $this->session->userdata('role') =='ppspm' )){
        redirect('login/akses_masuk');
      }
	  $data = $this->session->userdata();
	  $this->load->model('m_ppspm');
    }

    public function index()
    {
        $data = $this->session->userdata();
        $data['title'] = 'PPSPM';
        $data['user'] = $this->m_ppspm->tampil_data()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_ppspm');
        $this->load->view('template/dashboard');
        $this->load->view('template/footer');
        
    }

    public function generatecode()
    {
        $data = $this->session->userdata();
        $data['title'] = 'PPSPM';
        $data['user'] = $this->m_ppspm->tampil_data('otp')->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_ppspm');
        $this->load->view('generate');
        $this->load->view('template/footer');
 
        //

    }
    
    public function generateotp()
    {
       $durasiotp = $this->m_ppspm->tampil_data('durasiotp')->row();
       $durasi = $durasiotp->durasi;
       $otp =  rand(1231,7879);
       date_default_timezone_set('Asia/Jakarta');
       $tanggalSekarang=date('Y-m-d H:i:s');
       $datetime = new DateTime($tanggalSekarang);
       $datetime->modify('+'.$durasi.' minute');
       $tanggalKadaluarsa=$datetime->format('Y-m-d H:i:s');
    

       $id      = '';
       $id_unit = $this->input->post('id_unit');
       $kode    = $this->input->post('kode');
       // masukan ke data
       $data = array(
         'id' 		=> '$id',
         'id_unit' 		=> $id_unit,
         'kode' 			=> $kode,
         'otp' 		  	=> $otp,
         'tanggal_kadaluarsa' 	=> $tanggalKadaluarsa,
         'status' 		=> 'Y'
           );
        $this->m_ppspm->insert_data('otp',$data);
        redirect('ppspm/generatecode');    
    }

    public function rekap_kegiatan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Rekap Kegiatan';
        $data['user'] = $this->m_ppspm->rekap()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_ppspm');
        $this->load->view('Vrekapkegiatan',$data);
        $this->load->view('template/footer');
        
    }

    public function kirim_peringatan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Rekap Kegiatan';
        $data_kegiatan = $this->uri->segment(3);

        // ======================== tgl update
        date_default_timezone_set('Asia/Jakarta');
        $hari_tambahan =7;
        $jumlah_hari ='+'.$hari_tambahan.' days';
        $tgl = date('Y-m-d');
        $tgl_update    = date('Y-m-d', strtotime($jumlah_hari, strtotime($tgl))); 


        $where = array(
          'kode_subkomponen' => $data_kegiatan,
        );

        $update = array(
          'status' => 1,
          'peringatan_ppspm' => 1,
        );

        $this->m_ppspm->update_data($where,$update,'kegiatan');


      //send WA
      $kode = $this->uri->segment(3);
      // cari nama kegiatan
      $where = array(
        'kode_subkomponen' => $kode
      );
      $data = $this->m_ppspm->edit_data($where,'kegiatan')->row();
      $nama_kegiatan = $data->nama_kegiatan;
      
      // cari no hp unit
      $id_unit = $data->id_unit;
      $where = array(
        'kode' => $kode
      );
      $unit = $this->m_ppspm->data_no_hp($id_unit)->row();

      $tujuan = $unit->no_hp;
      $pesan = urlencode("Kegiatan ".$nama_kegiatan." telah melewati *batas waktu*. Segera buat *TOR dan RAB* dalam waktu 7 hari kedepan.
      
Assign by PPSPM
      ");
      
      $result = file_get_contents("http://localhost:3000/"."api?tujuan=".$tujuan."&pesan=".$pesan);

    
    

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Kegiatan berhasil dikirim Peringatan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('ppspm/rekap_kegiatan/');
        
    }

    
}
