<?php 
class Mundangan extends CI_Model{
	public $table = "undangan";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($nomor_undangan,$tanggal,$jam_mulai,$jam_selesai,$isi,$peserta_rapat,$username,$id_ruangan){
		$this->a = $nomor_undangan;
		$this->b = $tanggal;
		$this->c = $jam_mulai;
		$this->d = $jam_selesai;
		$this->e = $isi;
		$this->f = $peserta_rapat;
		$this->g = $username;
		$this->h = $id_ruangan;
		//$this->i = $id_unit;
		
	}
	
	public function add(){
		$arrayData = array(
			'nomor_undangan'  => $this->a,
			'tanggal'=>$this->b,
			'jam_mulai'=>$this->c,
			'jam_selesai'=>$this->d,
			'isi'=>$this->e,
			'peserta_rapat' =>$this->f,
			'username'=>$this->g,
			'id_ruangan'=> $this->h,
			//'id_unit' => $this->i,
			
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_undangan){
		$arrayData = array(
			'nomor_undangan'  => $this->a,
			'tanggal'=>$this->b,
			'jam_mulai'=>$this->c,
			'jam_selesai'=>$this->d,
			'isi'=>$this->e,
			'peserta_rapat' =>$this->f,
			'username'=>$this->g,
			'id_ruangan'=> $this->h,
			//'id_unit' => $this->i,
			);
		$this->db->where('id_undangan', $id_undangan);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
			public function get($where) 
        {   
            $this->db->select('undangan.*, user.*, pegawai.*, unit.*, divisi.*');
	        $this->db->join('user', 'undangan.username = user.username');
	        $this->db->join('pegawai', 'user.id_pegawai = pegawai.id_pegawai');
			$this->db->join('unit', 'pegawai.id_unit = unit.id_unit');
	        $this->db->join('divisi', 'unit.id_divisi = divisi.id_divisi');
	        $this->db->from('undangan'); 
            $this->db->where($where);
            return $this->db->get()->result();
        }
	
	public function delete($id_undangan){
		return $this->db->delete($this->table, array('id_undangan'=>$id_undangan));
	}
	
	function detail($id_undangan){
		$condition = array("id_undangan"=>$id_undangan);
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

	public function detail_data($id_undangan){
			$this->db->select('undangan.*,ruangan.*,unit.*,  divisi.*,user.*, pegawai.*');
			$this->db->join('ruangan', 'undangan.id_ruangan = ruangan.id_ruangan');
	        $this->db->join('user', 'undangan.username = user.username');
	        $this->db->join('pegawai', 'user.id_pegawai = pegawai.id_pegawai');
	        $this->db->join('unit', 'pegawai.id_unit = unit.id_unit');
			$this->db->join('divisi', 'unit.id_divisi = divisi.id_divisi');
		$this->db->from('undangan');
		$this->db->where('id_undangan',$id_undangan);
	 $query = $this->db->get();
  	 return $query->row();
	}
		public function get_by_id($id_undangan)
	{
		$data = $this->db->where(['id_undangan'=>$id_undangan])
             ->get("undangan");
    	if ($data->num_rows() > 0) {
      	return $data->row();//ambil data berdasarkan id dengan angkanya
    }

	}
	public function tampil_data($id_undangan){
	 $this->db->select('*');
	 $this->db->from('undangan');
	 $query = $this->db->get();
  	 return $query->row();
  		
	}
	public function tampil($username)
	{
		//$id_user = $this->session->userdata('id_user');
		$this->db->select('undangan.*,ruangan.*,unit.*,  divisi.*,user.*, pegawai.*');
			$this->db->join('ruangan', 'undangan.id_ruangan = ruangan.id_ruangan');
	        $this->db->join('user', 'undangan.username = user.username');
	        $this->db->join('pegawai', 'user.id_pegawai = pegawai.id_pegawai');
	        $this->db->join('unit', 'pegawai.id_unit = unit.id_unit');
			$this->db->join('divisi', 'unit.id_divisi = divisi.id_divisi');
		$this->db->from('undangan');
		$this->db->where('undangan.username',$username);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all()
	{
	$this->db->select('undangan.*, ruangan.*,  pegawai.*
      ');
	//$this->db->join('divisi', 'divisi.id_divisi = pegawai.id_divisi');
	//$this->db->join('unit', 'unit.id_unit = undangan.id_unit');
	$this->db->join('ruangan', 'ruangan.id_ruangan = undangan.id_ruangan');
	//$this->db->join('user', 'user.id_user = undangan.id_user');
	 $this->db->join('pegawai', 'undangan.username = pegawai.username');
	 $this->db->from('undangan');
	 $query = $this->db->get();
  	 return $query->result();
	}

	public function getkehadiran($id_undangan)
	{
		$this->db->select('*');
		$this->db->from('undangan');
		$this->db->where('id_undangan',$id_undangan);
		$query = $this->db->get();
  	 	return $query->row();
	}

	public function update($data)
	{
		$this->db->where('id_undangan',$data['id_undangan']);
        $this->db->update('undangan',$data);
	}
	
	//public function tampil_data($id_undangan)
	//{
		//return $this->db->get('undangan');
	//}
	
}
?>