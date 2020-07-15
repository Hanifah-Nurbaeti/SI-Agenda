<?php 
class Mhasil extends CI_Model{
	public $table = "undangan";
	function __construct(){
		parent::__construct();
	}
	
	public function setData($kode_notulen,$bahas_hasil,$peserta_rapat,$jumlah_peserta,$id_agenda){
		$this->b = $kode_notulen;
		$this->e = $bahas_hasil;
		$this->f = $peserta_rapat;
		$this->g = $jumlah_peserta;
		$this->id_agenda = $id_agenda;
	}
	
	/*public function add(){
		$arrayData = array(
			'kode_notulen'  => $this->b,
			'bahas_hasil'=>$this->e,
			'peserta_rapat'=>$this->f,
			'jumlah_peserta'=>$this->g,
			'id_agenda'=>$this->id_agenda,
		);
		return $this->db->insert($this->table, $arrayData); 
	}*/
	
	public function edit($id_hasil){
		$arrayData = array(
			'kode_notulen'  => $this->b,
			'bahas_hasil'=>$this->e,
			'peserta_rapat'=>$this->f,
			'jumlah_peserta'=>$this->g,
			'id_agenda'=>$this->id_agenda,
			);
		$this->db->where('id_hasil', $id_hasil);
		return $this->db->update($this->table, $arrayData); 
	}	
	
	public function getList(){
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function delete($id_hasil){
		return $this->db->delete($this->table, array('id_hasil'=>$id_hasil));
	}
	
	function detail($id_hasil){
		$condition = array("id_hasil"=>$id_hasil);
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
			$this->db->select('undangan.*,ruangan.*, user.*, pegawai.*, unit.*, divisi.*');
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
	public function tampil_data()
	{
		return $this->db->get('hasil');
	}
	public function insert($data)
	{
		//$this->db->where('id_undangan',$data['id_undangan']);
        $this->db->insert('undangan',$data);
	}
public function listing() {
            $this->db->select('*');
            $this->db->from('undangan');  
            $query = $this->db->get();
            return $query->row_array();
        }

        public function update($data)
	{
		$this->db->where('id_undangan',$data['id_undangan']);
        $this->db->update('undangan',$data);
	}
	
}
?>