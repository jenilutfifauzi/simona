<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    parent::__construct();
    // load session library
    $this->load->library('session');
    $this->load->helper('url');
    //mencegah peretas
    if (empty($this->session->userdata('role') && $this->session->userdata('role') == 'unit')) {
      redirect('login/akses_masuk');
    }
    $data = $this->session->userdata();
    $this->load->model('m_unit');
  }

  public function index()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Unit';
    $data['user'] = $this->m_unit->tampil_data()->result_array();


    $data['nama_kegiatan'] = $this->m_unit->data_peringatan_keg()->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('dashboard', $data);
    $this->load->view('template/footer');
  }

  public function kelola_komponen_timeline()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Kelola Timeline';
    $id = $this->session->userdata('id');
    $data['user'] = $this->m_unit->data_komponen($id)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_komponen_timeline');
    $this->load->view('template/footer');
  }

  public function kelola_komponen_timeline_keg_baru()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Kelola Timeline Kegiatan Baru';
    $id = $this->session->userdata('id');
    $data['user'] = $this->m_unit->data_komponen_keg_baru($id)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_komponen_timeline_keg_baru');
    $this->load->view('template/footer');
  }

  public function kelola_komponen_datadukung()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Kelola Data dukung';
    $id = $this->session->userdata('id');
    $data['user'] = $this->m_unit->data_komponen($id)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_komponen_datadukung');
    $this->load->view('template/footer');
  }

  public function kelola_kegiatan_timeline()
  {
    $data = $this->session->userdata();
    $kode_kom = $this->uri->segment(3);
    $data['title'] = 'Kelola Timeline';
    $data['user'] = $this->m_unit->data_kegiatan($kode_kom)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('daftar_kegiatan_timeline');
    $this->load->view('template/footer');
  }

  public function kelola_kegiatan_timeline_keg_baru()
  {
    $data = $this->session->userdata();
    $kode_kom = $this->uri->segment(3);
    $data['title'] = 'Kelola Timeline Kegiatan Baru';
    $data['user'] = $this->m_unit->data_kegiatan_baru($kode_kom)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('daftar_kegiatan_timeline_keg_baru');
    $this->load->view('template/footer');
  }

  public function kelola_kegiatan_datadukung()
  {
    $data = $this->session->userdata();
    $kode_kom = $this->uri->segment(3);
    $data['title'] = 'Kelola Data Dukung';
    $data['user'] = $this->m_unit->data_kegiatan($kode_kom)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('daftar_kegiatan_datadukung');
    $this->load->view('template/footer');
  }
  public function tambah_data_dukung()
  {
    $data['id_data'] = $this->uri->segment(4);
    $id_data = $this->uri->segment(3);
    $data = $this->session->userdata();
    $data['title'] = 'Tambah Data Dukung';

    $where = array('kode' => $id_data);
    $data['data_dukung_kode'] = $this->m_unit->edit_data($where, 'kegiatan')->row();
    $data['data_gambar'] = $this->m_unit->edit_data($where, 'data_dukung')->row();
    $data['data_dukung'] = $this->m_unit->edit_data($where, 'data_dukung')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_dukung', $data);
    $this->load->view('template/footer');
  }

  public function aksi_tambah_data_dukung()
  {

    $id                 = '';
    $kode               = $this->input->post('kode');
    $nama_kegiatan      = $this->input->post('nama_kegiatan');
    $dokumen             = $this->input->post('berkas');
    $keterangan         = $this->input->post('keterangan');
    $status             = 'yes';

    //dokumen
    // $file_name = str_replace('.','',$id);
    $config['upload_path']          = './upload/datadukung/';
    $config['allowed_types']        = 'jpg|jpeg|png';
    // $config['file_name']            = $file_name;
    $config['overwrite']            = true;
    $config['encrypt_name']         = true;
    $config['max_size']             = 0; // 10MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());
      // $this->load->view('v_upload', $error);
      echo "gagal";
    } else {
      $upload_data = $this->upload->data();
      // $this->load->view('v_upload_sukses', $data)

      $data_dukung = array(
        'id' => $id,
        'kode' => $kode,
        'kode_subkomponen' => $kode,
        'nama_kegiatan' => $nama_kegiatan,
        'dokumen' => $upload_data['file_name'],
        'keterangan' => $keterangan,
        'status' => $status,
      );
      $this->m_unit->insert_data('data_dukung', $data_dukung);
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
      redirect(base_url('unit/rab_datadukung/' . $kode));
      // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
  }

  public function aksi_tambah_data_dukung_keg_baru()
  {

    $id                 = '';
    $kode               = $this->input->post('kode');
    $nama_kegiatan      = $this->input->post('nama_kegiatan');
    $dokumen             = $this->input->post('berkas');
    $keterangan         = $this->input->post('keterangan');
    $status             = 'yes';

    //dokumen
    // $file_name = str_replace('.','',$id);
    $config['upload_path']          = './upload/datadukung/';
    $config['allowed_types']        = 'jpg|jpeg|png';
    // $config['file_name']            = $file_name;
    $config['overwrite']            = true;
    $config['encrypt_name']         = true;
    $config['max_size']             = 0; // 10MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());
      // $this->load->view('v_upload', $error);
      echo "gagal";
    } else {
      $upload_data = $this->upload->data();
      // $this->load->view('v_upload_sukses', $data)

      $data_dukung = array(
        'id' => $id,
        'kode' => $kode,
        'kode_subkomponen' => $kode,
        'nama_kegiatan' => $nama_kegiatan,
        'dokumen' => $upload_data['file_name'],
        'keterangan' => $keterangan,
        'status' => $status,
      );
      $this->m_unit->insert_data('data_dukung', $data_dukung);
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
      redirect(base_url('unit/rab_datadukung_keg_baru/' . $kode));
      // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
  }

  public function delete_datadukung($id)
  {
    $where = array('id' => $id);
    $ambil_data = $this->m_unit->edit_data($where, 'data_dukung')->row();
    $data_gambar = $ambil_data->dokumen;
    $data_kode = $ambil_data->kode;

    $this->m_unit->hapus_data($where, 'data_dukung');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Data Dukung Berhasil Dihapus
      </div>');

    $path = './upload/datadukung/' . $data_gambar;
    unlink($path);

    redirect(base_url('unit/rab_datadukung/' . $data_kode));
  }

  public function edit_datadukung()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Edit Data Dukung';
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['data_dukung'] = $this->m_unit->edit_data($where, 'data_dukung')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('edit_datadukung');
    $this->load->view('template/footer');
  }

  public function aksi_edit_datadukung()
  {

    $id           = $this->uri->segment(3);
    $keterangan   = $this->input->post('keterangan');
    $foto_lama   = $this->input->post('fotolama');

    $path = './upload/datadukung/' . $foto_lama;
    unlink($path);
    //dokumen
    // $file_name = str_replace('.','',$id);
    $config['upload_path']          = './upload/datadukung/';
    $config['allowed_types']        = 'jpg|jpeg|png';
    // $config['file_name']            = $file_name;
    $config['overwrite']            = true;
    $config['encrypt_name']         = true;
    $config['max_size']             = 0; // 10MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());
      // $this->load->view('v_upload', $error);
      echo "gagal";
    } else {
      $upload_data = $this->upload->data();
      // $this->load->view('v_upload_sukses', $data)

      $update_rab = array(
        'keterangan' => $keterangan,
        'dokumen' => $upload_data['file_name'],
      );
      $where = array(
        'id' => $id
      );
      $this->m_unit->update_data($where, $update_rab, 'data_dukung');



      echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Dukung Berhasil Diubah <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('unit/kelola_komponen');
    }
  }


  public function edit_timeline()
  {
    $data = $this->session->userdata();
    $data['id_unit'] = $this->session->userdata('id');
    $data['title'] = 'Unit';
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['data_timeline'] = $this->m_unit->edit_data($where, 'kegiatan')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('form_edit_timeline', $data);
    $this->load->view('template/footer');
  }

  public function edit_timeline_keg_baru()
  {
    $data = $this->session->userdata();
    $data['id_unit'] = $this->session->userdata('id');
    $data['title'] = 'Unit';
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['data_timeline'] = $this->m_unit->edit_data($where, 'kegiatan_baru')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('form_edit_timeline_keg_baru', $data);
    $this->load->view('template/footer');
  }


  public function tambah_kegiatan()
  {
    $data = $this->session->userdata();
    $data['id_unit'] = $this->session->userdata('id');
    $data['title'] = 'Unit';
    $id = $this->session->userdata('id');
    $data['user'] = $this->m_unit->data_kegiatan_timeline($id)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('tambah_kegiatan');
    $this->load->view('template/footer');
  }

  public function aksi_edit_timeline()
  {
    $tgl                 = $this->input->post('tgl');
    $id = $this->uri->segment(3);

    $where = array('id' => $id);

    $data_edit = array(
      'tgl' => $tgl,

    );
    $this->m_unit->update_data($where, $data_edit, 'kegiatan');

    echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data Timeline Kegiatan Berhasil Dirubah <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
    $id_data = $this->uri->segment(3);
    redirect(base_url('unit/kelola_komponen_timeline/'));
    // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
  }

  public function aksi_edit_timeline_keg_baru()
  {
    $tgl                 = $this->input->post('tgl');
    $id = $this->uri->segment(3);

    $where = array('id' => $id);

    $data_edit = array(
      'tgl' => $tgl,

    );
    $this->m_unit->update_data($where, $data_edit, 'kegiatan_baru');

    echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data Timeline Kegiatan Berhasil Dirubah <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
    $id_data = $this->uri->segment(3);
    redirect(base_url('unit/kelola_komponen_timeline_keg_baru/'));
    // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
  }

  public function kelola_komponen()
  {
    $data = $this->session->userdata();
    $data['kode_kom'] = $this->uri->segment(3);
    $data['title'] = 'Kelola RAB';
    $id = $this->session->userdata('id');
    $data['user'] = $this->m_unit->data_komponen($id)->result_array();
    $data['kode_kom'] = $this->db->get('kode_komponen')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_komponen', $data);
    $this->load->view('template/footer');
  }
  public function get_nama_kom()
  {
    $kode_komponen = $_POST['kode_komponen'];
    //if ($this->input->post('kode_komponen')) {
      $data = $this->m_unit->get_nama_kom($kode_komponen);
       echo json_encode($data);
    //}
  }

  public function get_nama_komponen()
  {
    $kode_komponen = $_POST['kode_komponen'];
    //if ($this->input->post('kode_komponen')) {
      $data = $this->m_unit->get_nama_komponen($kode_komponen);
       echo json_encode($data);
    //}
  }
  public function kelola_kegiatan()
  {
    $data = $this->session->userdata();
    $data['kode_kom'] = $this->uri->segment(3);
    //session untuk mengambil kode komponen
    $this->session->set_userdata('kode_kom', $data['kode_kom']);
    $kode_kom = $this->uri->segment(3);
    $data['title'] = 'Kelola RAB dan Data Dukung';
    $data['user'] = $this->m_unit->data_kegiatan($kode_kom)->result_array();
    //no urut otomatis
    $data['query'] = $this->db->query('Select max(kode_subkomponen) as idbesar FROM kegiatan')->row();
    //subkomponen baru
    $data['kode_kom_keg'] = $this->db->get('kode_subkomponen')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('daftar_kegiatan', $data);
    $this->load->view('template/footer');
  }
  //keg baru
  public function kelola_kegiatan_baru()
  {
    $data = $this->session->userdata();
    $data['kode_kom'] = $this->uri->segment(3);
    //session untuk mengambil kode komponen
    $this->session->set_userdata('kode_kom', $data['kode_kom']);
    $kode_kom = $this->uri->segment(3);
    //no urut otomatis
    $data['query'] = $this->db->query('Select max(kode_subkomponen) as idbesar FROM kegiatan_baru')->row();
    $data['title'] = 'Kelola RAB dan Data Dukung';
    $data['user'] = $this->m_unit->data_kegiatan_baru($kode_kom)->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('daftar_kegiatan_baru', $data);
    $this->load->view('template/footer');
  }

  public function tambah_rab()
  {

    $id_data = $this->uri->segment(3);
    $data = $this->session->userdata();

    $data['title'] = 'Kelola RAB';
    $data['durasi'] = $this->db->get('durasiotp')->row();

    $where = array('kode' => $id_data);
    $data['data_rab_kode'] = $this->m_unit->edit_data($where, 'kegiatan')->row();
    $data['data_rab'] = $this->m_unit->edit_data($where, 'rab')->result_array();
    //data dukung

    $data['data_dukung_kode'] = $this->m_unit->edit_data($where, 'kegiatan')->row();
    $data['data_gambar'] = $this->m_unit->edit_data($where, 'data_dukung')->row();
    $data['data_dukung'] = $this->m_unit->edit_data($where, 'data_dukung')->result_array();


    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_rab', $data);
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
    $data['data_rab_kode'] = $this->m_unit->edit_data($where, 'kegiatan')->row();
    $data['data_rab'] = $this->m_unit->edit_data($where, 'rab')->result_array();
    //data dukung
    $where = array('kode_subkomponen' => $id_data);
    $data['data_dukung_kode'] = $this->m_unit->edit_data($where, 'kegiatan')->row();
    $data['data_gambar'] = $this->m_unit->edit_data($where, 'data_dukung')->row();
    $data['data_dukung'] = $this->m_unit->edit_data($where, 'data_dukung')->result_array();


    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_rab_datadukung', $data);
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
    $data['data_rab_kode'] = $this->m_unit->edit_data($where, 'kegiatan_baru')->row();
    $data['data_rab'] = $this->m_unit->edit_data($where, 'rab')->result_array();
    //data dukung
    $where = array('kode_subkomponen' => $id_data);
    $data['data_dukung_kode'] = $this->m_unit->edit_data($where, 'kegiatan_baru')->row();
    $data['data_gambar'] = $this->m_unit->edit_data($where, 'data_dukung')->row();
    $data['data_dukung'] = $this->m_unit->edit_data($where, 'data_dukung')->result_array();


    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_rab_datadukung_keg_baru', $data);
    $this->load->view('template/footer');
  }


  public function aksi_tambah_rab()
  {

    $id           = '';
    $kode          = $this->input->post('kode');
    $rincian      = $this->input->post('rincian');
    $volume       = $this->input->post('volume');
    $satuan       = $this->input->post('satuan');
    $jumlah       = $this->input->post('jumlah');
    $satuan_jml    = $this->input->post('satuan_jml');
    $total         = $volume * $jumlah;
    $satuan_ukur   = $this->input->post('satuan_ukur');
    $biaya_satuan   = $this->input->post('biaya_satuan');
    $jumlah_tot = $total * $biaya_satuan;

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
    $this->m_unit->insert_data('rab', $data);
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data RAB Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    echo $this->session->set_flashdata('message');
    $params = $this->uri->segment(3);
    redirect('unit/rab_datadukung/' . $kode);
  }

  public function aksi_tambah_rab_keg_baru()
  {

    $id           = '';
    $kode          = $this->input->post('kode');
    $rincian      = $this->input->post('rincian');
    $volume       = $this->input->post('volume');
    $satuan       = $this->input->post('satuan');
    $jumlah       = $this->input->post('jumlah');
    $satuan_jml    = $this->input->post('satuan_jml');
    $total         = $volume * $jumlah;
    $satuan_ukur   = $this->input->post('satuan_ukur');
    $biaya_satuan   = $this->input->post('biaya_satuan');
    $jumlah_tot = $total * $biaya_satuan;

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
    $this->m_unit->insert_data('rab', $data);
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data RAB Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    echo $this->session->set_flashdata('message');
    $params = $this->uri->segment(3);
    redirect('unit/rab_datadukung_keg_baru/' . $kode);
  }
  public function delete_rab()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->m_unit->hapus_data($where, 'rab');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Data RAB Berhasil Dihapus
      </div>');
    redirect('unit/kelola_komponen');
  }

  public function edit_rab()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Edit RAB';
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['data_rab'] = $this->m_unit->edit_data($where, 'rab')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('edit_rab');
    $this->load->view('template/footer');
  }

  public function aksi_edit_rab()
  {

    $id           = $this->uri->segment(3);
    $kode          = $this->input->post('kode');
    $rincian      = $this->input->post('rincian');
    $volume       = $this->input->post('volume');
    $satuan       = $this->input->post('satuan');
    $jumlah       = $this->input->post('jumlah');
    $satuan_jml    = $this->input->post('satuan_jml');
    $total         = $volume * $jumlah;
    $satuan_ukur   = $this->input->post('satuan_ukur');
    $biaya_satuan   = $this->input->post('biaya_satuan');
    $jumlah_tot = $total * $biaya_satuan;

    $update_rab = array(
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
    $where = array(
      'id' => $id
    );
    $this->m_unit->update_data($where, $update_rab, 'rab');

    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data RAB Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    echo $this->session->set_flashdata('message');
    redirect('unit/kelola_komponen');
  }

  public function edit_rab_penggunaan()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Edit RAB Penggunaan';
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $data['data_rab'] = $this->m_unit->edit_data($where, 'd_lpj')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('edit_rab_penggunaan');
    $this->load->view('template/footer');
  }
  public function aksi_edit_rab_penggunanaan()
  {

    $id                  = $this->uri->segment(3);
    $kode = $this->input->post('kode');
    $penggunaan_anggaran = $this->input->post('penggunaan_anggaran');
    $biaya = $this->input->post('biaya');
    //dokumen
    // $file_name = str_replace('.','',$id);
    $config['upload_path']          = './upload/bukti/';
    $config['allowed_types']        = 'jpg|jpeg|png';
    // $config['file_name']            = $file_name;
    $config['overwrite']            = true;
    $config['encrypt_name']         = true;
    $config['max_size']             = 0; // 10MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());
      // $this->load->view('v_upload', $error);
      echo "gagal";
    } else {
      $upload_data = $this->upload->data();
      // $this->load->view('v_upload_sukses', $data)
      $update = array(
        'id_unit' => $id,
        'kode' => $kode,
        'penggunaan_anggaran' => $penggunaan_anggaran,
        'biaya' => $biaya,
        'bukti' => $upload_data['file_name'],
      );
      $where = array(
        'id' => $id
      );
      $this->m_unit->update_data($where, $update, 'd_lpj');

      echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Penggunaan RAB Berhasil Diedit <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
      redirect('unit/penggunaan_anggaran/' . $kode);
    }
  }


  public function data_kegiatan()
  {
    $data = $this->session->userdata();
    $data['title'] = 'LPJ Kegiatan';
    $data['user'] = $this->m_unit->data_keg_lpj()->result_array();


    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('Vpengajuan', $data);
    $this->load->view('template/footer');
  }
  public function penggunaan_anggaran()
  {
    $data = $this->session->userdata();
    $kode_kom = $this->uri->segment(3);
    $this->session->set_userdata('id_params', $kode_kom);
    $data['kode_kom'] = $kode_kom;
    $data['id_params'] = $this->session->userdata('id_params');
    $data['title'] = 'Kelola Penggunaan Anggaran';
    //data detail kegiatan
    $where = array(
      'kode' => $kode_kom
    );
    $data['detail_keg'] = $this->m_unit->edit_data($where, 'data_pengajuan')->row();
    $data['user'] = $this->m_unit->data_kegiatan($kode_kom)->result_array();
    $data['d_lpj'] = $this->m_unit->data_lpj_keg($kode_kom);
    $data['tb_rab'] = $this->m_unit->data_rab_keg($kode_kom);
    //penggabungan tb_rab dan penggunaan anggaran

    $data['tb_rab_penggunaan'] = $this->m_unit->data_rab_penggunaan_keg($kode_kom);
    $datarabpenggunaan = $this->m_unit->data_rab_penggunaan_keg($kode_kom);
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_penggunaan');
    $this->load->view('template/footer');
  }

  public function aksi_data_penggunaan()
  {

    $id                       = $this->session->userdata('id');
    $kode                     = $this->input->post('kode');
    $penggunaan_anggaran      = $this->input->post('penggunaan_anggaran');
    $biaya                     = $this->input->post('biaya');
    $status                   = 2;

    //dokumen
    // $file_name = str_replace('.','',$id);
    $config['upload_path']          = './upload/bukti/';
    $config['allowed_types']        = 'jpg|jpeg|png';
    // $config['file_name']            = $file_name;
    $config['overwrite']            = true;
    $config['encrypt_name']         = true;
    $config['max_size']             = 0; // 10MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());
      // $this->load->view('v_upload', $error);
      echo "gagal";
    } else {
      $upload_data = $this->upload->data();
      // $this->load->view('v_upload_sukses', $data)

      $data_dukung = array(
        'id_unit' => $id,
        'kode' => $kode,
        'penggunaan_anggaran' => $penggunaan_anggaran,
        'biaya' => $biaya,
        'status' => $status,
        'bukti' => $upload_data['file_name'],
      );
      $this->m_unit->insert_data('d_lpj', $data_dukung);
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
      Data Penggunaan Kegiatan Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
      $id_data = $this->uri->segment(3);
      redirect(base_url('unit/penggunaan_anggaran/' . $kode));
      // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
  }

  public function delete_data_penggunaan()
  {
    $id = $this->uri->segment(3);
    $where = array('id' => $id);
    $this->m_unit->hapus_data($where, 'd_lpj');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data Data Penggunaan Berhasil Dihapus
        </div>');
    redirect('unit/data_kegiatan');
  }

  public function aksi_terima_uang()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Pencairan';
    $id_data = $this->uri->segment(3);

    $where = array('kode' => $id_data);
    $data_update = array(
      'status' => 3,
    );

    //update status data_pengajuan
    $this->m_unit->update_data($where, $data_update, 'data_pengajuan');

    redirect('lpj/status_pencairan');
  }

  public function submit_penggunaan_anggaran()
  {

    $id           = $this->uri->segment(3);

    $update_status_lpj = array(
      'status_lpj' => 1,
    );
    $where = array(
      'kode' => $id
    );
    $this->m_unit->update_data($where, $update_status_lpj, 'data_pengajuan');

    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data RAB Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    echo $this->session->set_flashdata('message');
    redirect('unit/data_kegiatan');
  }

  //pengajuan modul nur
  public function riwayat_pengajuan_rencana_tahunan()
  {

    $id_data = $this->uri->segment(3);
    $data =  $this->session->userdata();
    $id_unit = $this->session->userdata('id');
    $data['title'] = 'Riwayat Pengajuan';
    $where = array(
      'id_unit' => $id_unit,
      'submit' => 1,
    );
    $data['data_pengajuan'] = $this->m_unit->edit_data($where, 'kegiatan')->result_array();



    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('riwayat_pengajuan_thn', $data);
    $this->load->view('template/footer');
  }

  public function submit_rab_datadukung()
  {

    $id = $this->uri->segment(3);
    $update_data = array(
      'submit' => 1,
    );
    $where = array(
      'kode_subkomponen' => $id
    );
    $this->m_unit->update_data($where, $update_data, 'kegiatan');

    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data RAB dan Data Dukung Berhasil Disubmit <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('unit/kelola_kegiatan/' . $id);
  }
  //submit keg baru
  public function submit_rab_datadukung_keg_baru()
  {

    $id = $this->uri->segment(3);
    $update_data = array(
      'submit' => 1,
    );
    $where = array(
      'kode_subkomponen' => $id
    );
    $this->m_unit->update_data($where, $update_data, 'kegiatan_baru');

    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data RAB dan Data Dukung Berhasil Disubmit <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('unit/kelola_kegiatan_baru/' . $id);
  }
  public function acuanrka()
  {
    $data =  $this->session->userdata();
    $data['title'] = 'Acuan RKA';
    $data['data_rka'] = $this->m_unit->data_uploadrka();
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('detail_uploadrka', $data);
    $this->load->view('template/footer');
  }
  public function tambah_komponen()
  {

    $id           = $this->session->userdata('id');
    $kode          = $this->input->post('kode');
    $komponen      = $this->input->post('komponen');
    $volume       = $this->input->post('volume');
    $hargasatuan1 = $this->input->post('hargasatuan');
    $jumlahbiaya   = $volume * $hargasatuan1;
    $sdcp         = $this->input->post('sd_cp');

    $data = array(
      'id_unit' => $id,
      'kode_kom' => $kode,
      'komponen' => $komponen,
      'volume' => $volume,
      'hargasatuan' => $hargasatuan1,
      'jumlahbiaya' => $jumlahbiaya,
      'sd_cp' => $sdcp,
    );
    $this->m_unit->insert_data('komponen', $data);
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Komponen Kegitan Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('unit/kelola_komponen');
  }
  public function aksi_tambah_kegiatan()
  {

    $id           = $this->session->userdata('id');
    $kode          = $this->input->post('kode');
    $kode_subkomponen      = $this->input->post('kode_subkomponen');
    $nama_kegiatan       = $this->input->post('nama_kegiatan');
    $volume       = $this->input->post('volume');
    $hargasatuan1 = $this->input->post('harga_satuan');
    $jumlahbiaya   = $volume * $hargasatuan1;
    $tgl         = date(' d m Y');

    $data = array(
      'id_unit' => $id,
      'kode' => $kode,
      'kode_subkomponen' => $kode_subkomponen,
      'nama_kegiatan' => $nama_kegiatan,
      'volume' => $volume,
      'harga_satuan' => $hargasatuan1,
      'jml_biaya' => $jumlahbiaya,
      'tgl' => $tgl,
      'status' => 2,
    );
    $this->m_unit->insert_data('kegiatan', $data);
    $kode_kom = $this->session->userdata('kode_kom');
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Kegiatan Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('unit/kelola_kegiatan/' . $kode_kom);
  }
  public function aksi_hapus_kegiatan()
  {
    $id = $this->uri->segment(3);
    $where = array(
      'kode_subkomponen' => $id
    );
    $this->m_unit->hapus_data($where, 'kegiatan');
    $kode_kom = $this->session->userdata('kode_kom');
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Kegiatan Berhasil Dihapus <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
    redirect('unit/kelola_kegiatan/' . $kode_kom);
  }
  public function aksi_hapus_kegiatan_baru()
  {
    $id = $this->uri->segment(3);
    $where = array(
      'kode_subkomponen' => $id
    );
    $this->m_unit->hapus_data($where, 'kegiatan_baru');
    $kode_kom = $this->session->userdata('kode_kom');
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    Data Kegiatan Berhasil Dihapus <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
    redirect('unit/kelola_kegiatan_baru/' . $kode_kom);
  }
  //aksi tambah kegiatan baru
  public function aksi_tambah_kegiatan_baru()
  {
    $kode_kom = $this->session->userdata('kode_kom');
    $id           = $this->session->userdata('id');
    $kode          = $this->input->post('kode');
    $kode_subkomponen      = $this->input->post('kode_subkomponen');
    $nama_kegiatan       = $this->input->post('nama_kegiatan');
    $jenis_kegiatan       = $this->input->post('jenis_kegiatan');
    $volume       = $this->input->post('volume');
    $hargasatuan1 = $this->input->post('harga_satuan');
    $jumlahbiaya   = $volume * $hargasatuan1;
    $tgl         = date(' d m Y');

    $data = array(
      'id_unit' => $id,
      'kode' => $kode,
      'kode_subkomponen' => $kode_subkomponen,
      'nama_kegiatan' => $nama_kegiatan,
      'volume' => $volume,
      'harga_satuan' => $hargasatuan1,
      'jml_biaya' => $jumlahbiaya,
      'tgl' => $tgl,
      'status' => 2,
      'jenis_kegiatan' => $jenis_kegiatan,
    );
    $this->m_unit->insert_data('kegiatan_baru', $data);
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Kegiatan Baru Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('unit/kelola_komponen_keg_baru/'.$kode_kom);
  }
  //tambah komponen keg baru
  public function tambah_komponen_keg_baru()
  {

    $id           = $this->session->userdata('id');
    $kode          = $this->input->post('kode');
    $komponen      = $this->input->post('komponen');
    $volume       = $this->input->post('volume');
    $hargasatuan1 = $this->input->post('hargasatuan');
    $jumlahbiaya   = $volume * $hargasatuan1;
    $sdcp         = $this->input->post('sd_cp');

    $data = array(
      'id_unit' => $id,
      'kode_kom' => $kode,
      'komponen' => $komponen,
      'volume' => $volume,
      'hargasatuan' => $hargasatuan1,
      'jumlahbiaya' => $jumlahbiaya,
      'sd_cp' => $sdcp,
    );
    $this->m_unit->insert_data('komponen_keg_baru', $data);
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data Komponen Kegiatan Baru Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('unit/kelola_komponen_keg_baru');
  }

  public function kegiatan_terlewat()
  {
    $data = $this->session->userdata();
    $data['title'] = 'Kegiatan Terlewat';
    $data['user'] = $this->m_unit->keg_terlewat()->result_array();


    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('keg_terlewat', $data);
    $this->load->view('template/footer');
  }

  public function aksi_proses_kegiatan_terlewat()
  {
    $data = $this->session->userdata();
    $id_data = $this->uri->segment(3);
    $where = array(
      'kode_subkomponen' => $id_data,
    );
    $update = array(
      'status' => 5,
      'peringatan_ppk' => 0,
      'peringatan_ppspm' => 0,
    );
    //update to db
    $this->m_unit->update_data($where, $update, 'kegiatan');
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Kegiatan Berhasil Diproses <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');

    redirect('unit/kegiatan_terlewat');
  }
  // keg baru
  public function kelola_komponen_keg_baru()
  {
    $data = $this->session->userdata();
    $data['kode_kom'] = $this->uri->segment(3);
    //kode otomatis

    $data['title'] = 'Kelola Kegiatan Baru';
    $id = $this->session->userdata('id');
    $data['user'] = $this->m_unit->data_komponen_keg_baru($id)->result_array();
    $data['kode_kom'] = $this->db->get('kode_komponen')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('data_komponen_keg_baru', $data);
    $this->load->view('template/footer');
  }

  public function ajukan_keg_baru()
  {
    $data = $this->session->userdata();
    $data['kode_kom'] = $this->uri->segment(3);
    $data['title'] = 'Ajukan Kegiatan Baru';
    $id = $this->session->userdata('id');
    $where = array(
      'status' => 1,
    );
    $data['user'] = $this->m_unit->edit_data($where, 'dateline')->result_array();
    $data['kode_kom'] = $this->db->get('kode_komponen')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('ajukan_keg_baru', $data);
    $this->load->view('template/footer');
  }

  public function unggah_ajukan_keg_baru()
  {
    $data = $this->session->userdata();
    $data['kode_kom'] = $this->uri->segment(3);
    $kode_ajuan = $this->uri->segment(3);
    //set userdata

    $this->session->set_userdata('kode_ajuan', $kode_ajuan);
    $data['title'] = 'Unggah Ajukan Kegiatan Baru';
    $id = $this->session->userdata('id');
    $where = array(
      'wadir1' => 1,

    );
    $data['akademik'] = $this->m_unit->edit_data($where, 'kegiatan_baru')->result_array();
    // non akademik
    $where1 = array(
      'wadir1' => 0,
      'wadir2' => 1,
      'direktur' => 1,
    );
    $data['non_akademik'] = $this->m_unit->edit_data($where1, 'kegiatan_baru')->result_array();

    //data ajuan
    $where = array(
      'id' => $id,
    );
    $data['user'] = $this->m_unit->edit_data($where, 'kegiatan_baru_ajuan')->result_array();

    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('unggah_ajukan_keg_baru', $data);
    $this->load->view('template/footer');
  }
  public function aksi_unggah_ajukan_keg_baru()
  {
    $data = $this->session->userdata();
    $id = $this->uri->segment(3);
    $kode_ajuan = $this->session->userdata('kode_ajuan');
    $where = array(
      'id' => $id,
    );

    $update = array(
      'status_pengajuan' => 1,
      'pengumpulan' => $kode_ajuan,
    );
    $this->m_unit->update_data($where, $update, 'kegiatan_baru');
    echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Data Kegiatan Berhasil Diajukan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
    redirect('unit/ajukan_keg_baru');
  }
  //////////////////////////penggunaan rab ///////////////////
  public function edit_data_penggunaan($id_rab)
  {
    $kode_kom = $this->uri->segment(3);
    $data = $this->session->userdata();
    $data['title'] = "Edit data penggunaan";
    $where = array(
      'id_rab' => $kode_kom
    );
    $data['tb_rab_penggunaan'] = $this->m_unit->edit_data($where, 'tb_rab')->row_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('edit_data_penggunaan');
    $this->load->view('template/footer');
  }
  public function tambah_data_penggunaan($id_rab)
  {
    $kode_kom = $this->uri->segment(3);
    $data = $this->session->userdata();
    $data['title'] = "Update data penggunaan";
    $where = array(
      'id_rab' => $kode_kom
    );
    $data['tb_rab_penggunaan'] = $this->m_unit->edit_data($where, 'tb_rab')->row_array();
    $this->load->view('template/header', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar_unit');
    $this->load->view('tambah_data_penggunaan');
    $this->load->view('template/footer');
  }
  public function aksi_tambah_data_penggunaan()
  {
    $data = $this->session->userdata();
    $id = $this->uri->segment(3);
    $total_biaya = $this->input->post('total_biaya');
    $biaya = $this->input->post('biaya');
    $bukti = $this->input->post('bukti');
    //sisa
    $sisa = $total_biaya - $biaya;

    $where = array(
      'id_rab' => $id,
    );
    //dokumen
    // $file_name = str_replace('.','',$id);
    $config['upload_path']          = './upload/bukti/';
    $config['allowed_types']        = 'jpg|jpeg|png';
    // $config['file_name']            = $file_name;
    $config['overwrite']            = true;
    $config['encrypt_name']         = true;
    $config['max_size']             = 0; // 10MB

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('berkas')) {
      $error = array('error' => $this->upload->display_errors());
      // $this->load->view('v_upload', $error);
      echo "gagal";
    } else {
      $upload_data = $this->upload->data();
      // $this->load->view('v_upload_sukses', $data)

      $data_update = array(
        'biaya' => $biaya,
        'bukti' => $upload_data['file_name'],
        'sisa' => $sisa,
      );
      $this->m_unit->update_data($where, $data_update, 'tb_rab');
      echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data Penggunaan Kegiatan Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
      $id_params = $this->session->userdata('id_params');
      redirect(base_url('unit/penggunaan_anggaran/' . $id_params));
      // Header('location: base_url()."pencairan/validasi_pin/".$id_data);  
    }
  }
}
