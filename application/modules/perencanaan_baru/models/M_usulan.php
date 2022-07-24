<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_usulan extends CI_Model {

  public function getUsulan(){
    return $this->db->get('tb_usulan')->result_array();
  }
}
