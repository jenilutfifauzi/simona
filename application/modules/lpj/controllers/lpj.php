<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lpj extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load session library
        $this->load->library('session');
        $this->load->helper('url');
        //mencegah peretas
        if (empty($this->session->userdata('role'))) {
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
        $data['data_pengajuan'] = $this->m_lpj->edit_data($where, 'data_pengajuan')->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar_unit');
        $this->load->view('data_lpj', $data);
        $this->load->view('template/footer');
    }

    public function status_pencairan()
    {
        $data = $this->session->userdata();
        $id_unit = $this->session->userdata('id');
        $data['title'] = 'Status Pencairan';
        $data['user'] = $this->m_lpj->status_pencairan()->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar_unit');
        $this->load->view('Vstatuspengajuan', $data);
        $this->load->view('template/footer');
    }
    public function data_kegiatan()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->m_lpj->lihat_data()->result_array();


        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar_unit');
        $this->load->view('Vpengajuan', $data);
        $this->load->view('template/footer');
    }

    public function validasi_lpj()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Validasi LPJ';
        $status = 3;
        $data['data_lpj'] = $this->m_lpj->data_lpj($status);


        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('data_validasi_lpj');
        $this->load->view('template/footer');
    }
    public function rincian_lpj()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Pencairan';
        $kode = $this->uri->segment(3);
        $where = array(
            'kode' => $kode
        );
        $data['detail_keg'] = $this->m_lpj->edit_data($where, 'data_pengajuan')->row();
        $data['tb_rab_penggunaan'] = $this->m_lpj->data_rab_penggunaan_keg($kode);
        $data['data_rincian_lpj'] = $this->m_lpj->data_rincian_lpj($kode);
        $data['data_lpj_id'] = $this->m_lpj->data_lpj_id($kode);

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('data_rincian_lpj');
        $this->load->view('template/footer');
    }
    public function lihat_data_rab_penggunaan($id_rab)
    {
        $kode_kom = $this->uri->segment(3);
        $data = $this->session->userdata();
        $data['title'] = "Lihat data penggunaan";
        $where = array(
            'id_rab' => $kode_kom
        );
        $data['tb_rab_penggunaan'] = $this->m_lpj->edit_data($where, 'tb_rab')->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar_unit');
        $this->load->view('lihat_data_penggunaan');
        $this->load->view('template/footer');
    }
    public function aksi_tambah_data_penggunaan()
    {
        $data = $this->session->userdata();
        $id = $this->uri->segment(3);
        $id_params = $this->uri->segment(4);
        $komentar = $this->input->post('komentar');
        $where = array(
            'id_rab' => $id,
        );

        $data_update = array(
            'komentar' => $komentar,
        );
        $this->m_lpj->update_data($where, $data_update, 'tb_rab');
        echo $this->session->set_flashdata('message', '<div        class="alert alert-success" role="alert">
      Data Penggunaan Kegiatan Berhasil Ditambahkan <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
          </div>');
        
        redirect(base_url('lpj/rincian_lpj/' . $id_params));
    }
    public function lihat()
    {
        $data = $this->session->userdata();
        $data['title'] = 'Pencairan';
        $data['gambar'] = $this->uri->segment(3);
        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar_bagiankeuangan');
        $this->load->view('lihat_bukti');
        $this->load->view('template/footer');
    }

    public function aksi_validasi_lpj()
    {
        $kode            = $this->uri->segment(3);
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
        $this->m_lpj->update_data($where, $update_status, 'data_pengajuan');
        $this->m_lpj->update_data($where, $update_lpj, 'data_pengajuan');
        
        //update data anggaran   
        $tahun = date('Y');
        $data_jumlah_anggaran_sebelum_diupdate = $this->db->query("SELECT * FROM anggaran Where tahun = ".$tahun)->row();

        $jumlah_terserap_sebelum = (int)$data_jumlah_anggaran_sebelum_diupdate->terserap;

        $jumlah_sisa_sebelum = (int)$data_jumlah_anggaran_sebelum_diupdate->sisa;

        $jumlah_anggaran_sebelum = (int)$data_jumlah_anggaran_sebelum_diupdate->anggaran;

        //jumlah total anggaran yg divalidasi pada tb_rab 
        $jumlah_terserap = $this->m_lpj->jumlah_anggaran($kode)->row();
        $jumlah_terserap_baru = (int) $jumlah_terserap->biaya;
        $jumtot = $jumlah_terserap_sebelum + $jumlah_terserap_baru;

        $update_anggaran = array(
            'terserap' => $jumlah_terserap_sebelum + $jumtot,
        );

        $update_belum_terserap = array(
            'belum_terserap' => $jumlah_anggaran_sebelum - ($jumlah_terserap_sebelum + $jumtot),
        );
        //update data anggaran terserap
        $this->m_lpj->update_data(array('tahun' => $tahun), $update_anggaran, 'anggaran');
        //update data anggaran belum terserap
        $this->m_lpj->update_data(array('tahun' => $tahun), $update_belum_terserap, 'anggaran');

        
        //////////sisa//////////
        $data_sisa = $this->m_lpj->jumlah_sisa($kode)->row();
        $data_sisa_keg_baru = (int)$data_sisa->sisa;
        //update sisa
        $update_sisa = array(
            'sisa' => $jumlah_sisa_sebelum + $data_sisa_keg_baru,
        );
        //update sisa
        $this->m_lpj->update_data(array('tahun' => $tahun), $update_sisa, 'anggaran');
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data KegiLatan Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('lpj/validasi_lpj');
    }
    public function test()
    {
        $kode = 'U001';
        $tahun = date('Y');
        $data_jumlah_anggaran_sebelum_diupdate = $this->db->query("SELECT * FROM anggaran Where tahun = ".$tahun)->row();

        $jumlah_terserap_sebelum = (int)$data_jumlah_anggaran_sebelum_diupdate->terserap;

        $jumlah_sisa_sebelum = (int)$data_jumlah_anggaran_sebelum_diupdate->sisa;

        $jumlah_anggaran_sebelum = (int)$data_jumlah_anggaran_sebelum_diupdate->anggaran;
        
        var_dump($jumlah_anggaran_sebelum);
    }
    public function aksi_tolak_validasi_lpj()
    {
        $kode            = $this->uri->segment(3);
        $update_status   = array(
            'status' => 3,
        );
        $update_lpj = array(
            'status_lpj' => 10,
        );
        $where = array(
            'kode' => $kode
        );
        //update data_pengajuan
        $this->m_lpj->update_data($where, $update_status, 'data_pengajuan');
        //
        $this->m_lpj->update_data($where, $update_lpj, 'data_pengajuan');
        //update data
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data KegiLatan Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('lpj/validasi_lpj');
    }
    public function aksi_revisi_datadukung()
    {
        $kode            = $this->uri->segment(3);
        $komentar = $this->input->post('komentar');

        $update = array(
            'komentar' => $komentar,
        );

        $where = array(
            'bukti' => $kode
        );
        //update d_lpj
        $this->m_lpj->update_data($where, $update, 'd_lpj');
        //update data_
        echo $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data KegiLatan Berhasil Divalidasi <button type= "button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>');
        echo $this->session->set_flashdata('message');
        redirect('lpj/validasi_lpj');
    }
}
