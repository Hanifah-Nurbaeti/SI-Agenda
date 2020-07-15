<?php
class Muser extends CI_Model {
    public $table = "user";
    public function __construct()
    {
        parent::__construct();
         $this->load->database();
    }

    function auth_user($username,$password)
    {
        $query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
    /*public function tampil_data($username){

     $this->db->select('*');
     $this->db->from('user');
     $this->db->where('username',$username);
     $query = $this->db->get();
     return $query->row();
        
    }*/
    /*public function get ($id = null) 
    {
        $this->db->from('user');
        if ($id != null){
            $this->db->where('id_user', $id)
        }
        $query = $this->db->get();
        return $query;

    }*/
    
        public function setData($nama_user,$username,$password,$level,$id_pegawai){
        $this->a = $nama_user;
        $this->b = $username;
        $this->c = $password;
        $this->d = $level;
        $this->f = $id_pegawai;
    }
    
    public function add(){
        $arrayData = array(
            'nama_user'=>$this->a,
            'username'  => $this->b,
            'password'=>$this->c,
            'level'=>$this->d,
            'id_pegawai'=>$this->f,

        );
        return $this->db->insert($this->table, $arrayData); 
    }
    
    public function edit($id_user){
        $arrayData = array(
            'nama_user'=>$this->a,
            'username'  => $this->b,
            'password'=>$this->c,
            'level'=>$this->d,
            'id_pegawai'=>$this->f,
            );
        $this->db->where('id_user', $id_user);
        return $this->db->update($this->table, $arrayData); 
    }   
    
    public function getList(){
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function delete($id_user){
        return $this->db->delete($this->table, array('id_user'=>$id_user));
    }
    
    function detail($id_user){
        $condition = array("id_user"=>$id_user);
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