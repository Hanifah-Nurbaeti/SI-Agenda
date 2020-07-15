<?php
class user extends CI_Controller {
        function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->model('Muser');
        
    }
    public function index()
    {

        $username = $this->session->userdata('username');
        $data['hasil'] = $this->Adminm->get_all_user();
        $this->load->view('admin/user-view.php',$data);
    }  
    public function add($id_user=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nama_user');
            $b = $this->input->post('username');
            $c = $this->input->post('password');
            $d = $this->input->post('level');
            $e = $this->input->post('id_user');
            $f = $this->input->post('id_pegawai');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Muser->setData($a,$b,$c,$d,$f);
                if ($e){
                    //Simpan Edit Data
                    $this->Muser->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Muser->add();
                }
                redirect('admin/user');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_user){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Muser->detail($id_user);

            }
            $data['judul']= "Tambah Data";
            $data['pegawai']= $this->Adminm->getAllData('pegawai');
            $this->load->view('admin/user-add', $data);
        }
        public function delete($id_user){
            $this->Muser->delete($id_user);
            redirect('admin/user');
        } 
    }
?>