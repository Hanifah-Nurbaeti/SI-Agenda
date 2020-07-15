<?php 
class Mdivisi extends CI_Model{
    public $table = "divisi";
    function __construct(){
        parent::__construct();
    }
    
    public function setData($kode_divisi,$nama_divisi){
        $this->a = $kode_divisi;
        $this->b = $nama_divisi;
    }

    public function add(){
        $arrayData = array(
            'kode_divisi'=>$this->a,
            'nama_divisi'=>$this->b,
        );
        return $this->db->insert($this->table, $arrayData); 
    }
    
    public function edit($id_divisi){
        $arrayData = array(
            'kode_divisi'=>$this->a,
            'nama_divisi'=>$this->b,
        );
        $this->db->where('id_divisi', $id_divisi);
        return $this->db->update($this->table, $arrayData); 
    }   
    public function getNameDivisi($id_divisi) {
        $cari = $this->db->query("SELECT nama_divisi FROM divisi WHERE id_divisi = '$id_divisi'")->result();
        return $cari[0]->nama_divisi;
    }
    public function getList(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    public function detail($id_divisi){
        $condition = array("id_divisi"=>$id_divisi);
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
    public function delete($id_divisi){
        return $this->db->delete($this->table, array('id_divisi'=>$id_divisi));
    }
    
}
?>