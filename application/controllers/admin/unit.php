<?php
class unit extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->model('Munit');
        
    }

    public function index()
    {
        $data['home'] = true;
        $data['hasil'] = $this->Adminm->get_all_unit();
        $this->load->view('admin/unit-view.php',$data);
    }
        public function add($id_unit=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_unit');
            $b = $this->input->post('nama_unit');
            $c = $this->input->post('id_divisi');
            $e = $this->input->post('id_unit');
            $this->form_validation->set_rules('kode_unit', 'Kode unit', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Munit->setData($a,$b,$c);
                if ($e){
                    //Simpan Edit Data
                    $this->Munit->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Munit->add();
                }
                redirect('admin/unit');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_unit){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Munit->detail($id_unit);

            }
            $data['judul']= "Tambah Data";
            $data['divisi']= $this->Adminm->getAllData('divisi');
            $this->load->view('admin/unit-add', $data);
        }
                public function edit($id_unit=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_unit');
            $b = $this->input->post('nama_unit');
            $c = $this->input->post('id_divisi');
            $e = $this->input->post('id_unit');
            $this->form_validation->set_rules('kode_unit', 'Kode unit', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Munit->setData($a,$b,$c);
                if ($e){
                    //Simpan Edit Data
                    $this->Munit->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Munit->add();
                }
                redirect('admin/unit');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_unit){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Munit->detail($id_unit);

            }
            $data['judul']= "Tambah Data";
            $data['divisi']= $this->Adminm->getAllData('divisi');
            $this->load->view('admin/unit-edit', $data);
        }  
       public function detail($id_unit=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('kode_unit');
            $b = $this->input->post('nama_unit');
            $c = $this->input->post('id_divisi');
            $e = $this->input->post('id_unit');
            $this->form_validation->set_rules('kode_unit', 'Kode unit', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Munit->setData($a,$b,$c);
                if ($e){
                    //Simpan Edit Data
                    $this->Munit->edit($e);
                } else {
                    //Simpan Data Baru
                    $this->Munit->add();
                }
                redirect('admin/unit');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_unit){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Munit->detail($id_unit);

            }
            $data['judul']= "Tambah Data";
            $this->load->view('admin/unit-detail', $data);
        }
        
}

?>