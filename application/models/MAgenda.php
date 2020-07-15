<?php 
class MAgenda extends CI_Model{
	public $table = "undangan";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($tanggal,$jam_mulai,$jam_selesai,$pembahasan,$peserta_rapat,$jumlah_peserta,$id_undangan,$id_ruangan){
		$this->b = $tanggal;
		$this->c = $jam_mulai;
		$this->d = $jam_selesai;
		$this->e = $pembahasan;
		$this->f = $peserta_rapat;
		$this->g = $jumlah_peserta;
		$this->id_undangan = $id_undangan;
		$this->id_ruangan = $id_ruangan;
	}
	
	public function add(){
		$arrayData = array(
			'tanggal'  => $this->b,
			'jam_mulai'=>$this->c,
			'jam_selesai'=>$this->d,
			'pembahasan'=>$this->e,
			'peserta_rapat'=>$this->f,
			'jumlah_peserta'=>$this->g,
			'id_undangan'=>$this->id_undangan,
			'id_ruangan'=> $this->id_ruangan,
			
		);
		return $this->db->insert($this->table, $arrayData); 
	}
	
	public function edit($id_agenda){
		$arrayData = array(
			'tanggal'  => $this->b,
			'jam_mulai'=>$this->c,
			'jam_selesai'=>$this->d,
			'pembahasan'=>$this->e,
			'peserta_rapat'=>$this->f,
			'jumlah_peserta'=>$this->g,
			'id_undangan'=>$this->id_undangan,
			'id_ruangan'=> $this->id_ruangan,
			);
		$this->db->where('id_agenda', $id_agenda);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_agenda){
		return $this->db->delete($this->table, array('id_agenda'=>$id_agenda));
	}
	
	function detail($id_agenda){
		$condition = array("id_agenda"=>$id_agenda);
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
	
}
?>