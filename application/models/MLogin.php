<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MLogin extends CI_Model{


  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function CheckUser($username, $password)
	{
		$this->db->select('username,password,level,nama_user');
		$this->db->from('user');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		} else {
			return false;
		}


	}

 /*public function daftar($data)
 {
 	 $this->db->insert('user',$data);

 	$id_user = $this->db->insert_id();

	$data_pribadi = array ('id_user'=>$id_user,
		 				   'username'=>$this->input->post('username'),
		 				   'nama'=>$this->input->post('nama')
		 	);
 	 $this->db->insert('data_pribadi',$data_pribadi);
 	
 	$data_keluarga = array('id_user'=>$id_user,
 							'username'=>$this->input->post('username'));
 	return $this->db->insert('data_keluarga',$data_keluarga);

 }*/

  public function tampil_data($username){


	 $this->db->select('*');
	 $this->db->from('user');
	 $this->db->where('username',$username);
	 $this->db->where('nama_user',$nama_user);
	 $query = $this->db->get();
  	 return $query->row();
  		
	}

	

}