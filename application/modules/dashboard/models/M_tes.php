<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tes extends CI_Model {

    public function getdata(){
       return $this->db->get('dynamic_form');
    }
}