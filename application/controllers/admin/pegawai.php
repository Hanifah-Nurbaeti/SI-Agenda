<?php
class pegawai extends CI_Controller {
    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->model('Mpegawai');
        
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['hasil'] = $this->Adminm->get_all_pegawai();
        $this->load->view('admin/pegawai-view.php',$data);
    }  
    public function add($id_pegawai=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nipp');
            $b = $this->input->post('nama_pegawai');
            $c = $this->input->post('alamat_email');
            $d = $this->input->post('nomor_telepon');
            $e = $this->input->post('jabatan');
            $f = $this->input->post('id_unit');
            $g =  $this->input->post('id_pegawai');
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mpegawai->setData($a,$b,$c,$d,$e,$f);
                if ($g){
                    //Simpan Edit Data
                    $this->Mpegawai->edit($g);
                } else {
                    //Simpan Data Baru
                    $this->Mpegawai->add();
                }
                redirect('admin/pegawai');
            }
        }
        //jika membawa ID, artinya Edit 
            if($id_pegawai){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mpegawai->detail($id_pegawai);

            }
            $data['judul']= "Tambah Data";
            $data['unit']= $this->Adminm->getAllData('unit');
            $this->load->view('admin/pegawai-add', $data);
        }
        
    }
?>