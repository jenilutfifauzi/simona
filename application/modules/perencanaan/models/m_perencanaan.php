<?php 
 
class M_perencanaan extends CI_Model{

	public function rekap()
	{
		return $this->db->where('status_pengajuan', 1)->get('kegiatan_baru');
	}

	public function lihat_data(){
		return $this->db->query("select * from data_pengajuan");
	}
	function tampil_data(){
		return $this->db->get('komponen');
	}
	function data_kegiatan(){
		return $this->db->get('kegiatan');
	}
	public function data_rka()
    {
    	$hasil= $this->db->get('data_rka');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return [];
    	}
    }
	
	public function ambil_id_user($id)
    {
    	$hasil= $this->db->where('id',$id)->get('data_pengajuan');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result();
    	}else{
    		return [];
    	}
    }
	public function disposisi()
    {
    	$hasil= $this->db->where('status',0)->get('disposisi');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return [];
    	}
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