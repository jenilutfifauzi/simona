<?php 
 
class M_wadir1 extends CI_Model{
	public function tampil_data(){
		return $this->db->get('user');
	}
	public function usulan_thn(){
		$submit = 1;
		$this->db->select('*');
		$this->db->from('kegiatan a');
		$this->db->join('komponen b','b.kode_kom = a.kode','left');
		$this->db->where('a.submit',$submit);
		return $this->db->get();
	}
	//keg baru
	public function usulan_thn_keg_baru(){
		$submit = 1;
		$this->db->select('*');
		$this->db->from('kegiatan_baru a');
		$this->db->join('komponen_keg_baru b','b.kode_kom = a.kode','left');
		$this->db->where('a.submit',$submit);
		$this->db->where('a.jenis_kegiatan','akademik');
		return $this->db->get();
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