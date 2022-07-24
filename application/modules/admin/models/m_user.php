<?php 
 
class M_user extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
	}
	public function ambil_id_user($id)
    {
    	$hasil= $this->db->where('id',$id)->get('user');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result();
    	}else{
    		return false;
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