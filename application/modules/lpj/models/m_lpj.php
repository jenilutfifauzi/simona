<?php 
 
class M_lpj extends CI_Model{


	public function data_rab_penggunaan_keg($kode)
    {
		$this->db->select('*');
		$this->db->from('d_lpj');
		$this->db->join('tb_rab','tb_rab.kode = d_lpj.kode');
	    $this->db->where('d_lpj.kode',$kode);
		$hasil = $this->db->get();
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
			$this->db->select('*');
			$this->db->from('tb_rab');
			$this->db->where('kode',$kode);
			$hasil = $this->db->get();
    		return $hasil->result_array();
    	}
    }


	function tampil_data(){
		return $this->db->query("select * from data_pengajuan where status='no'");
	}
	// public function lihat_data(){
	// 	$id_unit = $this->session->userdata('id');
	// 	return $this->db->get_where('data_pengajuan', array('id_unit'=>$id_unit,'status'=>'1' ));
	// }
	public function jumlah_anggaran($kode)
	{
		$this->db->select_sum('biaya');
		$this->db->where('kode',$kode);
		return $this->db->get('tb_rab');
	}
	public function jumlah_sisa($kode)
	{
		$this->db->select_sum('sisa');
		$this->db->where('kode',$kode);
		return $this->db->get('tb_rab');
	}
	public function lihat_data(){
		$id_unit = $this->session->userdata('id');
		$where = "id_unit = $id_unit AND status=1 OR status = 2"; 
		$this->db->where($where);
		return $this->db->get('data_pengajuan');

	}

	public function status_pencairan(){
		$id_unit = $this->session->userdata('id');
		return $this->db->get_where('data_pengajuan', array('id_unit'=>$id_unit));
	}

	public function ambil_id_user($id_unit)
    {
    	$hasil= $this->db->where('id_unit',$id_unit)->get('data_pengajuan');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result();
    	}else{
    		return false;
    	}
    }

	public function data_lpj($status)
    {
    	$this->db->where('status',$status);
    	$this->db->where('status_lpj',1);
    	$hasil= $this->db->get('data_pengajuan');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return [];
    	}
    }

	public function data_lpj_id($kode)
    {
    	$hasil= $this->db->where('kode',$kode)->get('data_pengajuan');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return [];
    	}
    }

	public function data_rincian_lpj($kode)
    {
    	$hasil= $this->db->where('kode',$kode)->get('d_lpj');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return false;
    	}
    }

	public function insert_data($table,$data)
	{
		$this->db->insert($table, $data);
	}
	public function get_data($table)
	{
		$this->db->insert($table);
	}

	public function edit_data($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function update_data1($where1,$data,$table)
	{
		$this->db->where($where1);
		$this->db->update($table,$data);
	}
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}