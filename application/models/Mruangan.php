<?php 
class Mruangan extends CI_Model{
    public $table = "ruangan";
    function __construct(){
        parent::__construct();
    }
    
    public function setData($kode_ruangan,$nama_ruangan){
        $this->kode = $kode_ruangan;
        $this->nama = $nama_ruangan;
    }

    public function add(){
        $arrayData = array(
            'kode_ruangan'=>$this->kode,
            'nama_ruangan'=>$this->nama,
        );
        return $this->db->insert($this->table, $arrayData); 
    }
    
    public function edit($id_ruangan){
        $arrayData = array(
            'kode_ruangan'=>$this->kode,
            'nama_ruangan'=>$this->nama,
        );
        $this->db->where('id_ruangan', $id_ruangan);
        return $this->db->update($this->table, $arrayData); 
    }   
    
    public function getList(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function detail($id_ruangan){
        $condition = array("id_ruangan"=>$id_ruangan);
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