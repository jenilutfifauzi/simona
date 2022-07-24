<?php 
 
class M_monitoring extends CI_Model{
	function tampil_data(){
		return $this->db->query("select * from data_pengajuan where status='no'");
	}
	public function data_anggaran_terserap()
	{
		return $this->db->query("select * from anggaran where id=1");
	}
	public function data_anggaran_total()
	{
		return $this->db->query("select * from anggaran where id=2");
	}
	
	public function lihat_data(){
		return $this->db->query("select * from data_pengajuan");
	}
	public function lihat_data_pengajuan(){
		$this->db->select('*');
		$this->db->from('data_pengajuan');
		$this->db->join('user','user.id = data_pengajuan.id_unit');
		$query = $this->db->get();
		return $query;

	}

	public function ambil_id_user($id)
    {
    	$hasil= $this->db->where('id',$id)->get('data_pengajuan');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result();
    	}else{
    		return false;
    	}
    }

	public function data_anggaran_terserap_tot()
    {
    	$hasil= $this->db->where('id',2)->get('anggaran');
    	if ($hasil->num_rows() > 0){
    		return $hasil->row();
    	}else{
    		return [];
    	}
    }

	public function data_anggaran_terserap_terbaru()
    {
    	$hasil= $this->db->where('id',1)->get('anggaran');
    	if ($hasil->num_rows() > 0){
    		return $hasil->row();
    	}else{
    		return [];
    	}
    }
	public function data_anggaran_terserap_terbaru1()
    {
    	$hasil= $this->db->where('id',1)->get('anggaran');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return [];
    	}
    }

	public function getData($table)
	{
		return $this->db->get($table);
	}

	public function rekap()
	{
		return $this->db->query("select * from kegiatan order by status ASC, tgl ASC");
	}

	public function insert_data($table,$data)
	{
		$this->db->insert($table, $data);
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
	public function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}