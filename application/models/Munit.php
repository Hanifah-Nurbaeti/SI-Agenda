<?php 
class Munit extends CI_Model{
    public $table = "unit";
    function __construct(){
        parent::__construct();
    }
    
    public function setData($kode_unit,$nama_unit,$id_divisi){
        $this->a = $kode_unit;
        $this->b = $nama_unit;
        $this->c = $id_divisi;
    }

    public function add(){
        $arrayData = array(
            'kode_unit'=>$this->a,
            'nama_unit'=>$this->b,
            'id_divisi'=>$this->c,
        );
        return $this->db->insert($this->table, $arrayData); 
    }
    
    public function edit($id_unit){
        $arrayData = array(
            'kode_unit'=>$this->a,
            'nama_unit'=>$this->b,
            'id_divisi'=>$this->c,
        );
        $this->db->where('id_unit', $id_unit);
        return $this->db->update($this->table, $arrayData); 
    }   
    
    public function getList(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function detail($id_unit){
        $condition = array("id_unit"=>$id_unit);
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