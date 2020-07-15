<?php
class ruangan extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->model('Mruangan');
        
    }

public function index()
    {
        $data['home'] = true;
        $data['hasil'] = $this->Mruangan->getList();
        $this->load->view('admin/ruangan-view.php',$data);
    }
        public function add($id_ruangan=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_ruangan');
            $b = $this->input->post('nama_ruangan');
            $e = $this->input->post('id_ruangan');
            $this->form_validation->set_rules('kode_ruangan', 'Nama Ruangan', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mruangan->setData($a,$b);
                if ($e){
                    //Simpan Edit Data
                    $this->Mruangan->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Mruangan->add();
                }
                redirect('admin/ruangan');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_ruangan){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mruangan->detail($id_ruangan);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/ruangan-add', $data);
        }
    public function edit($id_ruangan=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_ruangan');
            $b = $this->input->post('nama_ruangan');
            $e = $this->input->post('id_ruangan');
            $this->form_validation->set_rules('kode_ruangan', 'Nama Ruangan', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mruangan->setData($a,$b);
                if ($e){
                    //Simpan Edit Data
                    $this->Mruangan->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Mruangan->add();
                }
                redirect('admin/ruangan');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_ruangan){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mruangan->detail($id_ruangan);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/ruangan-edit', $data);
        }
        public function detail($id_ruangan=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_ruangan');
            $b = $this->input->post('nama_ruangan');
            $e = $this->input->post('id_ruangan');
            $this->form_validation->set_rules('kode_ruangan', 'Nama Ruangan', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mruangan->setData($a,$b);
                if ($e){
                    //Simpan Edit Data
                    $this->Mruangan->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Mruangan->add();
                }
                redirect('admin/ruangan');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_ruangan){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mruangan->detail($id_ruangan);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/ruangan-detail', $data);
        }
        
}

?>