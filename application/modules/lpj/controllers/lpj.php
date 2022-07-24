<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpj extends MY_Controller {
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
      $this->load->model('m_lpj');
    }

    public function index()
    {
        $data['data_id'] = $this->session->userdata('id');
        $data_id = $this->session->userdata('id');
        $data['title'] = 'LPJ';
        $where = array('id' => $data_id);
	      $data['data_pengajuan'] = $this->m_lpj->edit_data($where,'data_pengajuan')->result();
        var_dump($data['data_pengajuan']);
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_unit');
        $this->load->view('data_lpj',$data);
        $this->load->view('template/footer');
        
    }
    
    public function status_pencairan()
    {
        $data = $this->session->userdata();
        $id_unit = $this->session->userdata('id');
        $data['title'] = 'Status Pencairan';
        $data['user'] = $this->m_lpj->status_pencairan()->result_array();

        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_unit');
        $this->load->view('Vstatuspengajuan',$data);
        $this->load->view('template/footer');
        
    }
    public function data_kegiatan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->m_lpj->lihat_data()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_unit');
        $this->load->view('Vpengajuan',$data);
        $this->load->view('template/footer');
        
    }

    public function validasi_lpj()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Validasi LPJ';
        $status = 3;
        $data['data_lpj'] = $this->m_lpj->data_lpj($status);

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('data_validasi_lpj');
        $this->load->view('template/footer');
        
    }
    public function rincian_lpj()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Pencairan';
        $kode = $this->uri->segment(3);
        $data['data_rincian_lpj'] = $this->m_lpj->data_rincian_lpj($kode);
        $data['data_lpj_id'] = $this->m_lpj->data_lpj_id($kode);

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('data_rincian_lpj');
        $this->load->view('template/footer');
        
    }
    public function lihat()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Pencairan';
        $data['gambar'] = $this->uri->segment(3);
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('lihat_bukti');
        $this->load->view('template/footer');
        
    }
    
    public function aksi_validasi_lpj()
    {
        $kode 		   = $this->uri->segment(3);
        
        $update_status = array(
            'status' => 4,
              
            );
        $update_lpj = array(
            'status_lpj' => 2,
                
            );
        $where = array(
                'kode' => $kode
            );
            //update data_pengajuan
            $this->m_lpj->update_data($where,$update_status,'data_pengajuan');
            $this->m_lpj->update_data($where,$update_lpj,'data_pengajuan');
        

            //update data anggaran
            $where = array(
                'kode' => $kode
            );
            $data_anggaran_lpj = $this->m_lpj->edit_data($where,'d_lpj')->row();
            $data_jumlah_anggaran_sebelum = $this->db->query("SELECT * FROM anggaran Where id = 1")->row();
            $jumlah_sebelum = (int)$data_jumlah_anggaran_sebelum->jumlah_anggaran;
            $data_kegiatan = $data_anggaran_lpj->kode;

            $jumlah1 = $this->m_lpj->jumlah_anggaran($kode)->row();  
            $jumlah = (int) $jumlah1->biaya; 
            $jumtot = $jumlah_sebelum + $jumlah;

            $where1 = array(
                'id' => 1
            );
            $update_anggaran = array(
                'jumlah_anggaran' => $jumtot,
            );

            $this->m_lpj->update_data1($where1,$update_anggaran,'anggaran');
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data KegiLatan Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        echo $this->session->set_flashdata('message');
        redirect('lpj/validasi_lpj'); 
    }


    public function aksi_tolak_validasi_lpj()
    {
        $kode 		   = $this->uri->segment(3);
        
        $update_status = array(
            'status' => 3,
              
            );
        $update_lpj = array(
            'status_lpj' => 10,
                
            );
        $where = array(
                'kode' => $kode
            );
            //update data_pengajuan
            $this->m_lpj->update_data($where,$update_status,'data_pengajuan');
            $this->m_lpj->update_data($where,$update_lpj,'data_pengajuan');
        //update data_
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data KegiLatan Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        echo $this->session->set_flashdata('message');
        redirect('lpj/validasi_lpj'); 
    }

    public function test()
    {
        $data_jumlah_anggaran_sebelum = $this->db->query("SELECT * FROM anggaran Where id = 1")->row();
        $jumlah_sebelum = (int)$data_jumlah_anggaran_sebelum->jumlah_anggaran;
        $jumlah1 = $this->m_lpj->jumlah_anggaran('U001')->row();  
        $jumlah = (int) $jumlah1->biaya; 
        $jumtot = $jumlah_sebelum + $jumlah;
        var_dump($jumlah_sebelum);
        var_dump($jumlah);
        var_dump($jumtot);
    }
    public function aksi_revisi_datadukung()
    {
        $kode 		   = $this->uri->segment(3);
        $komentar = $this->input->post('komentar');
        
        $update= array(
            'komentar' =>$komentar,     
            );
       
        $where = array(
            'bukti' => $kode
            );
        //update d_lpj
        $this->m_lpj->update_data($where,$update,'d_lpj');
        //update data_
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data KegiLatan Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        echo $this->session->set_flashdata('message');
        redirect('lpj/validasi_lpj'); 
    }

    
    

}
