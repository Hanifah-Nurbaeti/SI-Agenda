<?php
class divisi extends CI_Controller {
     function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->model('Mdivisi');
        
    }

    public function index()
    {
        $data['home'] = true;
        $data['hasil'] = $this->Mdivisi->getList();
        $this->load->view('admin/divisi-view.php',$data);
    }
        public function add($id_divisi=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_divisi');
            $b = $this->input->post('nama_divisi');
            $e = $this->input->post('id_divisi');
            $this->form_validation->set_rules('kode_divisi', 'Nama Divisi', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mdivisi->setData($a,$b);
                if ($e){
                    //Simpan Edit Data
                    $this->Mdivisi->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Mdivisi->add();
                }
                redirect('admin/divisi');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_divisi){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mdivisi->detail($id_divisi);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/divisi-add', $data);
        }
        public function edit($id_divisi=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_divisi');
            $b = $this->input->post('nama_divisi');
            $e = $this->input->post('id_divisi');
            $this->form_validation->set_rules('kode_divisi', 'Nama Divisi', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mdivisi->setData($a,$b);
                if ($e){
                    //Simpan Edit Data
                    $this->Mdivisi->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Mdivisi->add();
                }
                redirect('admin/divisi');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_divisi){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mdivisi->detail($id_divisi);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/divisi-edit', $data);
        }  
     public function detail($id_divisi=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_divisi');
            $b = $this->input->post('nama_divisi');
            $e = $this->input->post('id_divisi');
            $this->form_validation->set_rules('kode_divisi', 'Nama Divisi', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mdivisi->setData($a,$b);
                if ($e){
                    //Simpan Edit Data
                    $this->Mdivisi->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Mdivisi->add();
                }
                redirect('admin/divisi');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_divisi){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mdivisi->detail($id_divisi);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/divisi-detail', $data);
        }
}
?>