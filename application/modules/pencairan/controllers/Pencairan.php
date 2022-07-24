<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencairan extends MY_Controller {
    public function __construct()
    {
      parent::__construct();
      // load session library
      $this->load->library('session');
      $this->load->helper('form');
      $this->load->helper('url');
      //mencegah peretas
      if(empty($this->session->userdata('role') && $this->session->userdata('role') =='bagiankeuangan' )){
        redirect('login/akses_masuk');
      }
	  $data = $this->session->userdata();
	  $this->load->model('m_pencairan');
	  $this->load->model('m_spp');
    }

    public function index()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Pencairan';
        $data['user'] = $this->m_pencairan->tampil_data()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('template/dashboard_keuangan');
        $this->load->view('template/footer');
        
    }
    public function pengajuan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Pencairan';
        $data['user'] = $this->m_pencairan->tampil_data()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('Vpengajuan');
        $this->load->view('template/footer');
        
    }

    public function status_pencairan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Status Pencairan';
        $data['user'] = $this->m_pencairan->lihat_data()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('Vstatuspengajuan');
        $this->load->view('template/footer');
        
    }

    public function edit_spp($id)
    {
      $data['id_data'] = $this->uri->segment(4);		
      $id_data = $this->uri->segment(4);		
      $data = $this->session->userdata();
      $data['title'] = 'Validasi SPP';
      $data['durasi'] = $this->db->get('durasiotp')->row();

      $where = array('kode' => $id_data);
	    $data['data_pengajuan'] = $this->m_pencairan->edit_data($where,'data_pengajuan')->result();

      $id_data = $this->uri->segment(4);
      $this->session->set_userdata('id_data',$id_data);


      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_bagiankeuangan');
      $this->load->view('Vspp',$data);
      $this->load->view('template/footer');
    }

    public function update_otp()
    {
      $id = 1;
      $otp = $this->input->post('otp');

      date_default_timezone_set('Asia/Jakarta');
      $tanggalSekarang=date('Y-m-d h:i:s');
      $datetime = new DateTime($tanggalSekarang);

      $datetime->modify('+0 minute');
      $create=$datetime->format('Y-m-d H:i:s');

      $data = array(
        'id' => $id,
        'otp' => $otp,
        'created_at' => $create
      );
      $where = array(
        'id' => $id
      );

      $this->m_ppk->update_data($where,$data,'is_otp');
      echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Kode OTP berhasil diubah <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('ppk/generatecode');
    }

    public function tambah_spp()
    {
    $id 			          = '';
    $kode 			      = $this->input->post('kode');
    $nama_kegiatan			= $this->input->post('nama_kegiatan');
    $dokumen 	          = $this->input->post('dokumen');
    $status 		        = 'yes';

//dokumen
    // $file_name = str_replace('.','',$id);
		$config['upload_path']          = './upload/spp/';
		$config['allowed_types']        = 'pdf|jpg|jpeg|png';
		// $config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;
		$config['max_size']             = 0; // 10MB

		$this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
      echo "gagal";
		}else{
			$upload_data = $this->upload->data();
			// $this->load->view('v_upload_sukses', $data)
              
    $dataspp = array(
    'id' => $id,
    'kode' => $kode,
    'nama_kegiatan' => $nama_kegiatan,
    'dokumen' => $upload_data['file_name'],
    'status' => $status,    
    );
    $this->m_spp->insert_data('is_spp',$dataspp);
    $this->session->set_flashdata('id_unit');
    // update data_pengajuan

    $updatedatapengajuan = array(
      'status' => 'spp'
    );
    $where = array(
      'kode' => $kode
    );
    $this->m_spp->update_data($where,$updatedatapengajuan,'data_pengajuan');
    echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
    Data User Berhasil Ditambahk0an <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect(base_url('pencairan/validasi_pin/'));  
    // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
	  }

    public function tambah_spm()
    {
    $id 			          = '';
    $kode 			        = $this->input->post('kode');
    $nama_kegiatan			= $this->input->post('nama_kegiatan');
    $dokumen 	          = $this->input->post('dokumen');
    $status 		        = 'yes';

//dokumen
    // $file_name = str_replace('.','',$id);
		$config['upload_path']          = './upload/spm/';
		$config['allowed_types']        = 'pdf|jpg|jpeg|png';
		// $config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;
		$config['max_size']             = 0; // 10MB

		$this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
      echo "gagal";
		}else{
			$upload_data = $this->upload->data();
			// $this->load->view('v_upload_sukses', $data)
              
    $dataspp = array(
    'id' => $id,
    'kode' => $kode,
    'nama_kegiatan' => $nama_kegiatan,
    'dokumen' => $upload_data['file_name'],
    'status' => $status,    
    );
    $this->m_spp->insert_data('is_spm',$dataspp);
    // update data_pengajuan

    $updatedatapengajuan = array(
      'status' => 'spm'
    );
    $where = array(
      'kode' => $kode
    );
    $this->m_spp->update_data($where,$updatedatapengajuan,'data_pengajuan');
    echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
    Data User Berhasil Ditambahk0an <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect(base_url('pencairan/validasi_pin2/'));  
    // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
	  }

    public function tambah_sp2d()
    {
    $id 			          = '';
    $kode 			      = $this->input->post('kode');
    $nama_kegiatan			= $this->input->post('nama_kegiatan');
    $dokumen 	          = $this->input->post('dokumen');
    $kesiapan_uang 	          = $this->input->post('kesiapan_uang');
    $status 		        = 'yes';

    //dokumen
    // $file_name = str_replace('.','',$id);
		$config['upload_path']          = './upload/sp2d/';
		$config['allowed_types']        = 'pdf|jpg|jpeg|png';
		// $config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;
		$config['max_size']             = 0; // 10MB

		$this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
      echo "gagal";
		}else{
			$upload_data = $this->upload->data();
			// $this->load->view('v_upload_sukses', $data)
              
    $dataspp = array(
    'id' => $id,
    'kode' => $kode,
    'nama_kegiatan' => $nama_kegiatan,
    'dokumen' => $upload_data['file_name'],
    'status' => $status,    
    );
    $this->m_spp->insert_data('is_sp2d',$dataspp);
    // update data_pengajuan

    $updatedatapengajuan = array(
      'status' => '1'
    );
    $where = array(
      'kode' => $kode
    );
    $this->m_spp->update_data($where,$updatedatapengajuan,'data_pengajuan');
    echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
    Data Pengajuan Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
  
    $this->session->unset_userdata('id_data');
    redirect(base_url('pencairan/'));  
    // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
	  }


    public function validasi_pin()
    {
      
    $id_data2 = $this->session->userdata('id_data');
      $data = $this->session->userdata();
      $data['title'] ='Validasi PIN';
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_bagiankeuangan');
      $this->load->view('validasi_pin',$data);
      $this->load->view('template/footer');
    }

    public function validasi_pin2()
    {
      
    $id_data2 = $this->session->userdata('id_data');
      $data = $this->session->userdata();
      $data['title'] ='Validasi PIN SPM';
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_bagiankeuangan');
      $this->load->view('validasi_pin2',$data);
      $this->load->view('template/footer');
    }

    public function proses_pin()
    {
        $pin = $this->input->post('pin',TRUE);
        $cek = $this->m_spp->cekPin();
        $pinAktif = $cek->otp;
        $tglKadaluarsa = $cek->kadaluarsa;

        //waktu
        date_default_timezone_set('Asia/Jakarta');
        $tglSekarang = date('Y-m-d');
        
        if (($pin == $pinAktif)) {
          if ($tglKadaluarsa <= $tglSekarang) {
            $data['pesan'] = "PIN yang anda masukkan telah kadaluarsa";
            $this->load->view('template/403_error',$data);
          }else {

            $kode = $this->session->userdata('id_data');
            $data = $this->session->userdata();
            $data['title'] = 'Validasi SPM';
            $data['durasi'] = $this->db->get('durasiotp')->row();
      
            $where = array('kode' => $kode);
            $data['data_pengajuan'] = $this->m_pencairan->edit_data($where,'data_pengajuan')->result();
      
            $this->load->view('template/header',$data);
            $this->load->view('template/navbar',$data);
            $this->load->view('template/sidebar_bagiankeuangan');
            $this->load->view('Vspm',$data);
            $this->load->view('template/footer');
          }
            // $this->m_ppk->update_data($where,$data,'is_otp');
          // redirect('pencairan/validasitest');	
      }else{ //jika otp sudah benar maka session akan berubah menjadi sukseslogin
        $data['pesan'] = "PIN yang anda masukkan salah";
        $this->load->view('template/403_error',$data);
                // redirect('pencairan/dashboard');
      }
    }

    public function proses_pin2()
    {
      $pin = $this->input->post('pin',TRUE);
      $cek = $this->m_spp->cekPin();
      $pinAktif = $cek->otp;
      $tglKadaluarsa = $cek->kadaluarsa;

      //waktu
      date_default_timezone_set('Asia/Jakarta');
      $tglSekarang = date('Y-m-d');

        if (($pin == $pinAktif)) { 
          if ($tglKadaluarsa <= $tglSekarang) {
            $data['pesan'] = "PIN yang anda masukkan telah kadaluarsa";
            $this->load->view('template/403_error',$data);
          }else {
            $kode = $this->session->userdata('id_data');
            $data = $this->session->userdata();
            $data['title'] = 'Validasi SP2D';
            $data['durasi'] = $this->db->get('durasiotp')->row();
      
            $where = array('kode' => $kode);
            $data['data_pengajuan'] = $this->m_pencairan->edit_data($where,'data_pengajuan')->result();
      
            $this->load->view('template/header',$data);
            $this->load->view('template/navbar',$data);
            $this->load->view('template/sidebar_bagiankeuangan');
            $this->load->view('Vsp2d',$data);
            $this->load->view('template/footer');
          }
            // $this->m_ppk->update_data($where,$data,'is_otp');
          // redirect('pencairan/validasitest');	
      }else{ //jika otp sudah benar maka session akan berubah menjadi sukseslogin
        $data['pesan'] = "PIN yang anda masukkan salah";
        $this->load->view('template/403_error',$data);
                // redirect('pencairan/dashboard');
      }
    }

    public function validasi_terima_uang()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Status Pencairan';
      $where = array(
        'status' => 2 or 1,
        'terima_uang' => 0,
      );
      $data['user'] = $this->m_pencairan->edit_data($where,'data_pengajuan')->result_array();

      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_bagiankeuangan');
      $this->load->view('status_terima_uang');
      $this->load->view('template/footer');
      
    }
    public function form_validasi_terima_uang()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Status Pencairan';
      $where = array(
        'status' => 2 or 1,
        'terima_uang' => 0,
      );
      $data['data_pengajuan'] = $this->m_pencairan->edit_data($where,'data_pengajuan')->result_array();

      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_bagiankeuangan');
      $this->load->view('form_terima_uang');
      $this->load->view('template/footer');
      
    }

    public function aksi_terima_uang()
    {
    $kode_data 			          = $this->uri->segment(3);

    //dokumen
    // $file_name = str_replace('.','',$id);
		$config['upload_path']          = './upload/bukti_ambil_uang/';
		$config['allowed_types']        = 'pdf|jpg|jpeg|png';
		// $config['file_name']            = $file_name;
		$config['overwrite']            = true;
		$config['encrypt_name']         = true;
		$config['max_size']             = 0; // 10MB

		$this->load->library('upload', $config);
    
    if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
      echo "gagal";
		}else{
			$upload_data = $this->upload->data();
			// $this->load->view('v_upload_sukses', $data)
              
    $data_ambil_uang = array(
    'terima_uang' => 1,    
    );
    // update data_pengajuan
    $where = array(
      'kode' => $kode_data
    );
    $this->m_spp->update_data($where,$data_ambil_uang,'data_pengajuan');
    echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
    Data Ambil Uang Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
  
    $this->session->unset_userdata('id_data');
    redirect(base_url('pencairan/'));  
    // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
	  }


}
