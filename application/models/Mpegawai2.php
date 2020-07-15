<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpegawai2 extends CI_Model{

  public function tampil_data($username){
   $this->db->select('*');
   $this->db->from('pegawai');
   $this->db->where('username',$username);
   $query = $this->db->get();
     return $query->row();
      
  }

  public function get_by_id($username)
  {
    $data = $this->db->where(['username'=>$username])
             ->get("pegawai");
      if ($data->num_rows() > 0) {
        return $data->row();//ambil data berdasarkan id dengan angkanya
    }

  }


  public function listing() {
            $this->db->select('*');
            $this->db->from('pegawai');  
            $query = $this->db->get();
            return $query->row_array();
        }


      public function update($data) {
            $this->db->where('username',$data['username']);
            $this->db->update('pegawai',$data);
        }  


}