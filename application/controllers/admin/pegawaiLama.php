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
            //$this->output->enable_profiler(TRUE);
            $b = $this->input->post('nipp');
            $c = $this->input->post('nama_pegawai');
            $d = $this->input->post('jabatan');
            $e = $this->input->post('alamat_email');
            $f = $this->input->post('nomor_telepon');
            $g = $this->input->post('id_pegawai');
            $id_user =$this->input->post('id_user');
            $id_unit = $this->input->post('id_unit');

            $this->form_validation->set_rules('nipp', 'NIPP', 'required| is_unique ');
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mpegawai->setData($b,$c,$d,$e,$f,$id_user, $id_unit);
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
            if ($id_pegawai){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mpegawai->detail($id_pegawai);
            }
            $data['judul']= "Tambah Data";
            $data['user']= $this->Adminm->getAllData('user');
            $data['unit']= $this->Adminm->getAllData('unit');
            $this->load->view('admin/pegawai-add', $data);
        }
        
    }
?>