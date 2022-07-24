<?php 
 
class M_unit extends CI_Model{

	public function get_nama_kom($kode_komponen)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('kode_komponen', $kode_komponen);
        $query = $this->db->get('kode_komponen')->row();


        //looping data
        
            $output = "<option value='$query->kegiatan'>".$query->kegiatan."<option>";
            // $output = "<input type='text' class='form-control' id='nama_kom' name='komponen' value='.$query->kegiatan.'>";
      
        //return data kabupaten
        return $output;
    }

	public function lihat_data(){
		$id_unit = $this->session->userdata('id');
		$where = "id_unit = $id_unit AND status=1 OR status = 2"; 
		$this->db->where($where);
		return $this->db->get('data_pengajuan');

	}

	public function keg_terlewat(){
		$id_unit = $this->session->userdata('id');
		$where = "id_unit = $id_unit AND peringatan_ppk=1 OR peringatan_ppspm = 1"; 
		$this->db->where($where);
		return $this->db->get('kegiatan');
	}
	public function data_keg_lpj(){
		$id_unit = $this->session->userdata('id');
		$where = "id_unit = $id_unit AND status=3"; 
		$this->db->where($where);
		return $this->db->get('data_pengajuan');

	}
	public function data_peringatan_keg(){
		$id_unit = $this->session->userdata('id');
		$where = "id_unit = $id_unit AND status=1"; 
		$this->db->where($where);
		return $this->db->get('kegiatan');

	}
	public function CreateCode(){
		$this->db->select('kode');
		$this->db->order_by('kode','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('kegiatan');
			if($query->num_rows() <> 0){      
				 $data = $query->row();
				 $kode = intval($data->kode) + 1; 
			}
			else{      
				 $kode = 1;  
			}
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
		$kodetampil = "KG".$batas;
		return $kodetampil;  
	}

	function tampil_data(){
		return $this->db->get('komponen');
	}
	function data_komponen($id){
		return $this->db->where('id_unit',$id)->get('komponen');
	}

	//keg baru
	function data_komponen_keg_baru($id){
		return $this->db->where('id_unit',$id)->get('komponen_keg_baru');
	}

	function data_kegiatan($kode_kom){
		return $this->db->where('kode',$kode_kom)->get('kegiatan');
	}
	function data_kegiatan_keg_baru($kode_kom){
		return $this->db->where('kode',$kode_kom)->get('kegiatan_baru');
	}
	function data_kegiatan_baru($kode_kom){
		return $this->db->where('kode',$kode_kom)->get('kegiatan_baru');
	}
	function data_kegiatan_komentar($kode_kom){
		
		$this->db->select('*');
		$this->db->from('kegiatan');
		$this->db->join('revisi','kegiatan.kode = revisi.kode','inner');
	    $this->db->where('kegiatan.kode',$kode_kom);
		return $this->db->get();
		 
	}
	function status_pengajuan_rev(){
		
		return $this->db->get('revisi');
		 
	}
	function data_kegiatan_timeline($kode){
		return $this->db->where('kode',$kode)->get('kegiatan');
	}
	public function data_uploadrka()
    {
    	return $this->db->where('status',1)->get('data_rka')->row();
    	
    }
	public function data_uploadrka_2()
    {
    	$hasil= $this->db->where('status',1)->get('data_rka');
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
	public function revisi_komentar($kode)
    {
    	$hasil= $this->db->where('kode',$kode)->get('revisi');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result();
    	}else{
    		return [];
    	}
    }
	public function data_lpj_keg($kode)
    {
    	$hasil= $this->db->where('kode',$kode)->get('d_lpj');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return [];
    	}
    }
	public function data_rab_keg($kode)
    {
    	$hasil= $this->db->where('kode',$kode)->get('tb_rab');
    	if ($hasil->num_rows() > 0){
    		return $hasil->result_array();
    	}else{
    		return [];
    	}
    }

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

	public function data_gambar($id)
    {
    	$hasil= $this->db->where('id',$id)->get('data_dukung');
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
	public function getData($table)
	{
		$this->db->get($table);
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