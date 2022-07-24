<?php 
 
class M_ppk extends CI_Model{

	function data_no_hp($id_unit){
		
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('user','user.id = kegiatan.id_unit','inner');
	    $this->db->where('kegiatan.id_unit',$id_unit);
		return $this->db->get();
		 
	}

	function tampil_data($table){
		return $this->db->get($table);
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