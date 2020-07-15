<?php
class user extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') != true){
            redirect('login');
        } 
        $this->load->model('Muser');
    }

    public function index()
    {
        $data['home'] = true;
        $data['hasil'] = $this->Muser->getList();
        $this->load->view('pimpinan/user-view.php',$data);
    }  
    public function add($id=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nama_user');
            $b = $this->input->post('username');
            $c = $this->input->post('password');
            $d = $this->input->post('level');
            $e = $this->input->post('id_user');
            $this->form_validation->set_rules('username', 'Username', 'required| is_unique[user.username]');
            $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Muser->setData($a,$b,$c,$d);
                if ($e){
                    //Simpan Edit Data
                    $this->Muser->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Muser->add();
                }
                redirect('pimpinan/user');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Muser->detail($id);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('pimpinan/user-add', $data);
        }
        public function delete($id_user){
            $this->Muser->delete($id_user);
            redirect('pimpinan/user');
        } 
    }
?>