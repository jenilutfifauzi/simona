<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Perencanaan extends MY_Controller {
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

    public function index()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Perencanaan';
        $data['user'] = $this->m_perencanaan->tampil_data()->result_array();

        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_perencanaan');
        $this->load->view('template/dashboard');
        $this->load->view('template/footer');
        
    }

    public function tambahrka()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Perencanaan';
      $data['user'] = $this->m_perencanaan->tampil_data()->result_array();
      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('tambahrka');
      $this->load->view('template/footer');
        
    }

    public function tambah_komponen()
    {
      
              $id 		    	= '';
              $kode 		   	= $this->input->post('kode');
              $komponen			= $this->input->post('komponen');
              $volume 			= $this->input->post('volume');
              $hargasatuan1 = $this->input->post('hargasatuan');
              $jumlahbiaya 	= $volume*$hargasatuan1;
              $sdcp 		    = $this->input->post('satuan');
              
        $data = array(
              'id' => $id,
              'kode' => $kode,
              'komponen' => $komponen,
              'volume' => $volume,
              'hargasatuan' => $hargasatuan1,
              'jumlahbiaya' => $jumlahbiaya,    
              'satuan' => $sdcp,    
        );
        $this->m_perencanaan->insert_data('komponen',$data);
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Mahasiswa Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        echo $this->session->set_flashdata('message');
        redirect('perencanaan/tambahrka');  
	  }

    public function aksi_tambah_rab()
    {
      
              $id 		    	= '';
              $kode 		   	= $this->input->post('kode');
              $rincian			= $this->input->post('rincian');
              $volume 			= $this->input->post('volume');
              $satuan       = $this->input->post('satuan');
              $jumlah       = $this->input->post('jumlah');
              $satuan_jml 	 = $this->input->post('satuan_jml');
              $total 	      = $volume*$jumlah;
              $satuan_ukur	 = $this->input->post('satuan_ukur');
              $biaya_satuan	 = $this->input->post('biaya_satuan');
              $jumlah_tot = $total*$biaya_satuan;
              
        $data = array(
              'id' => $id,
              'kode' => $kode,
              'rincian' => $rincian,
              'volume' => $volume,
              'satuan' => $satuan,
              'jumlah' => $jumlah,    
              'satuan_jml' => $satuan_jml,    
              'total' => $total,    
              'satuan_ukur' => $satuan_ukur,    
              'biaya_satuan' => $biaya_satuan,    
              'jumlah_tot' => $jumlah_tot,    
        );
        $this->m_perencanaan->insert_data('rab',$data);
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data RAB Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        echo $this->session->set_flashdata('message');
        redirect('perencanaan/kelola_rab');  
	  }


    public function edit_spp($id)
    {
      $where = array('id' => $id);
	    $data['data_pengajuan'] = $this->m_penilaian->edit_data($where,'data_pengajuan')->result();
    }

    public function update_validasi_spp($id)
    {
      $otp =  random_string('numeric', 4); 
      $tanggalSekarang=date('Y-m-d H:i:s');
      $datetime = new DateTime($tanggalSekarang);
      $datetime->modify('+120 minute');
      $tanggalKadaluarsa=$datetime->format('Y-m-d H:i:s');
      
      $id = $this->input->post('id');
      $id_unit = $this->input->post('id_unit');
      $kode = $this->input->post('kode');
      // masukan ke data
      $data = array(
        'id' 		=> '$id',
        'id_unit' 		=> $id_unit,
        'kode' 			=> $kode,
        'otp' 			=> $otp,
        'tanggal_kadaluarsa' 	=> $tanggalKadaluarsa,
        'status' 		=> 'Y'
      );
      $where = array(
        'id' => $id
      );
      $this->m_pencairan->update_data($where,$data,'data_pengajuan_validasi');
    }
    public function kelola_rab()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Kelola RAB';
      $data['user'] = $this->m_perencanaan->data_kegiatan()->result_array();
      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('daftar_kegiatan');
      $this->load->view('template/footer');
        
    }

    public function tambah_rab($kode)
    {
      $data['id_data'] = $this->uri->segment(4);		
      $id_data = $this->uri->segment(3);	
      $data = $this->session->userdata();
      $data['title'] = 'Kelola RAB';
      $data['durasi'] = $this->db->get('durasiotp')->row();

      $where = array('kode' => $id_data);
	    $data['data_rab_kode'] = $this->m_perencanaan->edit_data($where,'kegiatan')->row();
	    $data['data_rab'] = $this->m_perencanaan->edit_data($where,'rab')->result_array();



      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('data_rab',$data);
      $this->load->view('template/footer');
    }
    
    public function data_dukung()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Kelola Data Dukung';
      $data['user'] = $this->m_perencanaan->data_kegiatan()->result_array();
      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('data_dukung_kegiatan',$data);
      $this->load->view('template/footer');
        
    }

    public function tambah_data_dukung()
    {
      $data['id_data'] = $this->uri->segment(4);		
      $id_data = $this->uri->segment(3);	
      $data = $this->session->userdata();
      $data['title'] = 'Tambah Data Dukung';

      $where = array('kode' => $id_data);
	    $data['data_dukung_kode'] = $this->m_perencanaan->edit_data($where,'kegiatan')->row();
	    $data['data_gambar'] = $this->m_perencanaan->edit_data($where,'data_dukung')->row();
	    $data['data_dukung'] = $this->m_perencanaan->edit_data($where,'data_dukung')->result_array();

      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('data_dukung',$data);
      $this->load->view('template/footer');
    }

    public function aksi_tambah_data_dukung()
    {
    
      $id 			          = '';
      $kode 			      = $this->input->post('kode');
      $nama_kegiatan			= $this->input->post('nama_kegiatan');
      $dokumen 	          = $this->input->post('berkas');
      $status 		        = 'yes';
  
  //dokumen
      // $file_name = str_replace('.','',$id);
      $config['upload_path']          = './upload/datadukung/';
      $config['allowed_types']        = 'jpg|jpeg|png';
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
                
      $data_dukung = array(
      'id' => $id,
      'kode' => $kode,
      'nama_kegiatan' => $nama_kegiatan,
      'dokumen' => $upload_data['file_name'],
      'status' => $status,    
      );
      $this->m_perencanaan->insert_data('data_dukung',$data_dukung);
      // $this->session->set_flashdata('id_unit',$id_unit);
      // update data_pengajuan
  
      // $updatedatapengajuan = array(
      //   'status' => 'spp'
      // );
      // $where = array(
      //   'kode' => $kode
      // );
      // $this->m_spp->update_data($where,$updatedatapengajuan,'data_pengajuan');
      echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data Dukung Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
          $id_data = $this->uri->segment(3);	
      redirect(base_url('perencanaan/data_dukung/'.$id_data.''));  
      // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
      }
      }

    public function daftar_draf_anggaran()
      {
    
      $data =	$this->session->userdata();  
      $data['title'] = 'Daftar Draft Anggaran';
      $where = array(
        'submit'   => 1,
        'direktur' => 1,
        'wadir1'   => 1,
        'wadir2'   => 1,
      );
	    $data['data_pengajuan'] = $this->m_perencanaan->edit_data($where,'kegiatan')->result_array();

      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('daftar_draf_anggaran',$data);
      $this->load->view('template/footer');
    }
    public function rab_datadukung()
    {
		
      $id_data = $this->uri->segment(3);	
      $data = $this->session->userdata();
      $data['kode_subkomponen'] = $id_data;
      $data['title'] = 'Kelola RAB';
      $data['durasi'] = $this->db->get('durasiotp')->row();

      $where = array('kode' => $id_data);
	    $data['data_rab_kode'] = $this->m_perencanaan->edit_data($where,'kegiatan')->row();
	    $data['data_rab'] = $this->m_perencanaan->edit_data($where,'rab')->result_array();
      //data dukung
      $where = array('kode_subkomponen' => $id_data);
	    $data['data_dukung_kode'] = $this->m_perencanaan->edit_data($where,'kegiatan')->row();
	    $data['data_gambar'] = $this->m_perencanaan->edit_data($where,'data_dukung')->row();
	    $data['data_dukung'] = $this->m_perencanaan->edit_data($where,'data_dukung')->result_array();


      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('data_rab_datadukung',$data);
      $this->load->view('template/footer');
    }

    public function rab_datadukung_keg_baru()
    {
		
      $id_data = $this->uri->segment(3);	
      $data = $this->session->userdata();
      $data['kode_subkomponen'] = $id_data;
      $data['title'] = 'Kelola RAB';
      $data['durasi'] = $this->db->get('durasiotp')->row();

      $where = array('kode' => $id_data);
	    $data['data_rab_kode'] = $this->m_perencanaan->edit_data($where,'kegiatan_baru')->row();
	    $data['data_rab'] = $this->m_perencanaan->edit_data($where,'rab')->result_array();
      //data dukung
      $where = array('kode_subkomponen' => $id_data);
	    $data['data_dukung_kode'] = $this->m_perencanaan->edit_data($where,'kegiatan_baru')->row();
	    $data['data_gambar'] = $this->m_perencanaan->edit_data($where,'data_dukung')->row();
	    $data['data_dukung'] = $this->m_perencanaan->edit_data($where,'data_dukung')->result_array();


      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('data_rab_datadukung',$data);
      $this->load->view('template/footer');
    }

      
      /* 
      Untuk handel tmbah RKA
      */
      public function form_tambah_komponen()
    {
      $this->load->view('komponen/tambah.php');
    }

    public function aksi_tambah_komponen()
    {
       
      
        if(isset($_FILES["file"]["name"])){
              // upload
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_name = $_FILES['file']['name'];
            $file_size =$_FILES['file']['size'];
            $file_type=$_FILES['file']['type'];
            // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads
            // $objReader = PHPExcel_IOFactory::createReader('Excel2007');
            $object = PHPExcel_IOFactory::load($file_tmp);
    
            foreach($object->getWorksheetIterator() as $worksheet){
    
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
    
                for($row=9; $row<=$highestRow; $row++){
    
                    $id_unit = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $kode_kom = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $komponen = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $volume = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $hargasatuan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $jumlahbiaya = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $sd_cp = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

                    $data[] = array(
                       'id_unit' => $id_unit,
                       'kode_kom' => $kode_kom,
                       'komponen' => $komponen,
                       'volume' => $volume,
                       'hargasatuan' => $hargasatuan,
                       'jumlahbiaya' => $jumlahbiaya,
                       'sd_cp' => $sd_cp,
                       'status' => 0,
                    );
    
                } 
    
            }
    
            $this->db->insert_batch('komponen', $data);
    
            $message = array(
                'message'=>'<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('import');
        }
        else
        {
             $message = array(
                'message'=>'<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );
            
            $this->session->set_flashdata($message);
            redirect('import');
        }
    }

    public function uploadrka()
    {
      $data =	$this->session->userdata();  
      $data['title'] = 'Upload RKA';
      $data['data_up_rka'] = $this->m_perencanaan->data_rka();
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('upload_rka');
      $this->load->view('template/footer');
    }
    public function form_uploadrka()
    {
      $data =	$this->session->userdata();  
      $data['title'] = 'Form Upload RKA';
      $data['data_up_rka'] = $this->m_perencanaan->data_rka();
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('form_uploadrka');
      $this->load->view('template/footer');
    }
    public function aksi_uploadrka()
    {
      $dokumen 	        = $this->input->post('berkas');
      $tahun 	          = $this->input->post('tahun');
      $keterangan 	          = $this->input->post('keterangan');

  
      //dokumen
      // $file_name = str_replace('.','',$id);
      $config['upload_path']          = './upload/rka/';
      $config['allowed_types']        = 'pdf';
      // $config['file_name']            = $file_name;
      $config['overwrite']            = true;
      $config['encrypt_name']         = true;
      $config['max_size']             = 0; // 10MB
  
      $this->load->library('upload', $config);
      
      if ( ! $this->upload->do_upload('berkas')){
        $data['pesan'] =  "Type file tidak didukung, upload sesuai type file";
        $this->load->view('template/403_error', $data);
      }else{
        $upload_data = $this->upload->data();
                
        $data = array(
          'dokumen' => $upload_data['file_name'],
          'tahun' => $tahun,
          'keterangan' => $keterangan,
        );
        $this->m_perencanaan->insert_data('data_rka',$data);
        echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
        Data RKA Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
            </div>');	
      redirect(base_url('perencanaan/uploadrka'));  
      }
    }
    public function detail_uploadrka()
    {
      $data =	$this->session->userdata();  
      $data['title'] = 'Detail Upload RKA';
      $data['data_dokumen'] = $this->uri->segment(3);
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('detail_uploadrka');
      $this->load->view('template/footer');      
    }
    public function aksi_aktif_uploadrka()
    {
      $data =	$this->session->userdata();
      $dokumen = $this->uri->segment(3);  
      $where = array("dokumen" => $dokumen);
      $update_data = array("status" => 1);
      $this->m_perencanaan->update_data($where,$update_data,'data_rka');
      echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data RKA Berhasil Diaktifkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
      </div>');
      redirect('perencanaan/uploadrka');
    }
    public function aksi_nonaktif_uploadrka()
    {
      $data =	$this->session->userdata();
      $dokumen = $this->uri->segment(3);  
      $where = array("dokumen" => $dokumen);
      $update_data = array("status" => 0);
      $this->m_perencanaan->update_data($where,$update_data,'data_rka');
      echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data RKA Berhasil DiNonaktifkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
      </div>');
      redirect('perencanaan/uploadrka');
    }
    public function disposisi()
    {
      $data =	$this->session->userdata();  
      $data['title'] = 'Disposisi';
      $data['data_disposisi'] = $this->m_perencanaan->disposisi();
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('disposisi',$data);
      $this->load->view('template/footer');
    }
    public function aksi_proses_disposisi()
    {
      $id = $this->uri->segment(3);
      $where = array('id' => $id);
      $update_data = array('status' => 1);
      $this->m_perencanaan->update_data($where,$update_data,'disposisi');
      echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data Disposisi Berhasil Diproses <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
      </div>');
      redirect('perencanaan/disposisi');
      
    }
    public function dateline()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Dateline Kegiatan';
      // $data['user'] = $this->m_perencanaan->rekap()->result_array();
      $data['user'] = $this->db->get('dateline')->result_array();

    
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('ajukan_keg_baru_perencanaan',$data);
      $this->load->view('template/footer');
    }
    // TAMBAH KOMPONEN
    public function tambahkomponen()
    {
      $data = $this->session->userdata();
      $data['title'] = 'Tambah Komponen';
      // $data['user'] = $this->m_perencanaan->rekap()->result_array();
      $data['user'] = $this->db->get('kode_komponen')->result_array();
      
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('tambahkomponen',$data);
      $this->load->view('template/footer');
    }
    public function aksi_tambah_kode_komponen()
    {
      $kode = $this->uri->segment(3);
      // cari nama kegiatan
     
      $kode_kom = $this->input->post('kode');
      $kegiatan = $this->input->post('kegiatan');
      //aksi
      $data = array(
        'kode_komponen' => $kode_kom,
        'kegiatan' => $kegiatan,
      );
      $this->m_perencanaan->insert_data('kode_komponen',$data);

      

    redirect('perencanaan/tambahkomponen');
    }
    public function aksi_tambah_perintah_dateline()
    {
      $kode 			      = $this->input->post('kode');
      $periode			= $this->input->post('periode');

      $data = array(
        'kode' => $kode,
        'periode' => $periode,
        'status' => 0,
      );
      $this->m_perencanaan->insert_data('dateline',$data);

      redirect('perencanaan/dateline');
    }
    public function aksi_hapus_unggah_ajukan_keg_baru()
    {
      // cari nama kegiatan
      $kode = $this->uri->segment(3);
     
      //aksi
      $where = array(
        'kode' => $kode,
      );
      $this->m_perencanaan->hapus_data($where,'dateline');
      echo $this->session->set_flashdata('message', '<div        class="alert alert-danger" role="alert">
      Data Periode Berhasil Dihapus <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
      </div>');
    redirect('perencanaan/dateline');
    }
    public function aksi_aktif_unggah_ajukan_keg_baru()
    {
      $data = $this->session->userdata();
      $id = $this->uri->segment(3);
      $where = array(
        'kode' => $id,
      );
    
      $update = array(
        'status' => 1,
      );
      $this->m_perencanaan->update_data($where,$update,'dateline');

       //test
      //aksi notif
      // cari no hp unit
      $where = array(
        'role' => 'unit'
      );
      $datano = $this->m_perencanaan->edit_data($where,'user')->row();

      $nohp = $datano->no_hp;

      $tujuan = $nohp;
      $pesan = urlencode("*Notif Periode* 
Periode revisi usulan telah diperbaharui, silahkan cek pada sistem. ");
      $result = file_get_contents("http://localhost:3000/"."api?tujuan=".$tujuan."&pesan=".$pesan);


      echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Dateline Berhasil diaktifkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('perencanaan/dateline');
    }
    public function aksi_nonaktif_unggah_ajukan_keg_baru()
    {
      $data = $this->session->userdata();
      $id = $this->uri->segment(3);
      $where = array(
        'kode' => $id,
      );
    
      $update = array(
        'status' => 0,
      );
      $this->m_perencanaan->update_data($where,$update,'dateline');
      echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Dateline Berhasil dinonaktifkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('perencanaan/dateline');
    }

    public function lihat_keg_baru_validasi()
    {
      $data = $this->session->userdata();
      $id = $this->uri->segment(3);
      $data['title'] = 'Daftar Kegiatan Validasi';

      $where = array(
        'pengumpulan' => $id,
      );
      // $data['user'] = $this->m_perencanaan->rekap()->result_array();
      $data['user'] = $this->m_perencanaan->edit_data($where,'kegiatan_baru')->result_array();
    
      $this->load->view('template/header',$data);
      $this->load->view('template/navbar',$data);
      $this->load->view('template/sidebar_perencanaan');
      $this->load->view('dateline',$data);
      $this->load->view('template/footer');

    }
        

    //status pencairan jeni
    public function status_pencairan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Status Pencairan';
        $data['user'] = $this->m_perencanaan->lihat_data()->result_array();

        
        $this->load->view('template/header',$data);
        $this->load->view('template/navbar',$data);
        $this->load->view('template/sidebar_perencanaan');
        $this->load->view('Vstatuspengajuan');
        $this->load->view('template/footer');
        
    }
    
}
