<?php 

class Mlaporan extends CI_model
{ 


   public function all_undangan($where)
  {
  	$this->db->select('*');
  	$this->db->from('undangan');
  	$this->db->where($where);
  	return $this->db->get()->result();
  }

  public function ambil_diantara_tanggal($data) {
	        $condition = "tanggal  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
	        $this->db->select('*');
	        $this->db->from('undangan');	    
	        $this->db->where($condition);       
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            return $query->result();
	        } else {
	            return false;
	        }
	    }

	public function lihat_semua_tanggal() {
	        $this->db->select('undangan.*, user.*, pegawai.*, unit.*, divisi.*');
	        $this->db->join('user', 'undangan.username = user.username');
	        $this->db->join('pegawai', 'user.id_pegawai = pegawai.id_pegawai');
			$this->db->join('unit', 'pegawai.id_unit = unit.id_unit');
	        $this->db->join('divisi', 'unit.id_divisi = divisi.id_divisi');
	        $this->db->from('undangan');
	       //$this->db->where('id_undangan',$id_undangan);
	 		$query = $this->db->get();
  	 		return $query->result();
    	}

    public function ambil_diantara_tanggal1($data) {
	        $condition = "tanggal  BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
	        $this->db->select('*');
	        $this->db->from('undangan');	
	        $this->db->where($condition);       
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            return $query->result();
	        } else {
	            return false;
	        }
	    }

	public function lihat_semua_tanggal1() {
	        $this->db->select('*');
	        $this->db->from('undangan');
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            return $query->result();
	        } else {
	            return false;
	        }
    	}
  
}