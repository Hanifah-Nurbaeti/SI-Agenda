<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Mpegawai extends CI_Model{
	public $table = "pegawai";
	
	public function tampil_data($username){
	 $this->db->select('*');
	 $this->db->from('pegawai');
	 $this->db->where('username',$username);
	 $query = $this->db->get();
  	 return $query->row();
  		
	}
	public function detail_data($username){
		$this->db->select('pegawai.*, user.*
      ');
		//$this->db->join('ruangan', 'undangan.id_ruangan = ruangan.id_ruangan');
		$this->db->join('user', 'user.id_user = pegawai.id_user');
		//$this->db->join('user', 'undangan.id_user = user.id_user');
		$this->db->from('pegawai');
		$this->db->where('pegawai.username',$username);
	 $query = $this->db->get();
  	 return $query->row();
	}
	
	public function setData($nipp,$nama_pegawai,$alamat_email,$nomor_telepon, $jabatan,$id_unit){
		$this->a = $nipp;
		$this->b = $nama_pegawai;
		$this->c = $alamat_email;
		$this->d = $nomor_telepon;
		$this->e = $jabatan;
		$this->f = $id_unit;
	}
	
	public function add(){
		$arrayData = array(
			'nipp'  => $this->a,
			'nama_pegawai'=>$this->b,
			'alamat_email'=>$this->c,
			'nomor_telepon'=>$this->d,
			'jabatan'=>$this->e,
			//'id_user' => $this->id_user,
			'id_unit'=>$this->f,
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_pegawai){
		$arrayData = array(
			'nipp'  => $this->a,
			'nama_pegawai'=>$this->b,
			'alamat_email'=>$this->c,
			'nomor_telepon'=>$this->d,
			'jabatan'=>$this->e,
			//'id_user' => $this->id_user,
			'id_unit'=>$this->f,
			);
		$this->db->where('id_pegawai', $id_pegawai);
		return $this->db->update($this->table, $arrayData); 
	}
	
	
	public function getList(){
		$id_user = $this->session->userdata('id_user');
		 $this->db->select('*');
		 $this->db->from('pegawai');
		 $this->db->join('unit','pegawai.id_unit = unit.id_unit');
		 $this->db->join('divisi','unit.id_divisi = unit.id_divisi');
		 $this->db->join('user','pegawai.id_user = user.id_user');
		 $this->db->where('user.id_user', $id_user);
		 $query = $this->db->get();
		 return $query->result();
	}
	
	public function delete($id_pegawai){
		return $this->db->delete($this->table, array('id_pegawai'=>$id_pegawai));
	}
	
	    public function detail($id_pegawai){
        $condition = array("id_pegawai"=>$id_pegawai);
        $query = $this->db->get_where($this->table,$condition); 
        if($query->num_rows() > 0){
            return $query->row();
        } else {
            return false;
        }
    }	
	
	public function getTotal(){
		return $this->db->count_all_results($this->tnews);
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

        public function multi_tabel($user,$pegawai,$unit) 
        {
        	$this->db->insert('user',$user);
        	$id_user = $this->db->insert_id();

        	$pegawai['pegawai'] = $id_user;
        	$this->db->insert('user',$user);
        	$unit['unit'] = $id_user;
        	$this->db->insert('user',$user);
        	return $insert_id = $this->db->insert_id(); 

        }
 public function daftar($data)
 {
 	$user = array (
		 				   'username'=>$this->input->post('username'),
		 				   'password'=>$this->input->post('password'),
		 				   'level'=>$this->input->post('level'));
 	$this->db->insert('user',$user);

 	$id_user = $this->db->insert_id();

	$pegawai = array ('id_user'=>$id_user,
		 				   'username'=>$this->input->post('username'),
		 				   //'nipp'=>$this->input->post('nipp'),
		 				   'nama_pegawai'=>$this->input->post('nama_pegawai')
		 	);
 	return $this->db->insert('pegawai',$pegawai);	

 }
	
}