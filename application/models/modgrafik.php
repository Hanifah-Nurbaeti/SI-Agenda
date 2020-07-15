<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modgrafik extends CI_Model{

    function grafik(){
       $this->db->select('undangan.*,count(status) as total');
       $this->db->from('undangan');
       $this->db->group_by('status');
       //$this->db->where('status','Diterima');
       $query = $this->db->get();
       return $query->result();
    }



}