<?php
class agenda_rapat extends CI_Controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="pimpinan") {
            redirect('login', 'referesh');
        }
        $this->load->model('MAgenda');
        
    }
    public function index()
    {
        $username = $this->session->userdata('username');
        $data['hasil'] = $this->Adminm->get_all_undangan();
        $this->load->view('pimpinan/agenda-view.php',$data);
    }  
    public function add($id_agenda=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            //$this->output->enable_profiler(TRUE);
            $b = $this->input->post('tanggal');
            $c = $this->input->post('jam_mulai');
            $d = $this->input->post('jam_selesai');
            $e = $this->input->post('pembahasan');
            $f = $this->input->post('peserta_rapat');
            $g = $this->input->post('jumlah_peserta');
            $h = $this->input->post('id_agenda');
            $id_undangan = $this->input->post('id_undangan');
            $id_ruangan = $this->input->post('id_ruangan');
            $this->form_validation->set_rules('tanggal', 'Tanggal','required');
            $this->form_validation->set_rules('jam_mulai', 'Jam Mulai');
            $this->form_validation->set_rules('jam_selesai', 'Jam Selesai');
            $this->form_validation->set_rules('pembahasan', 'Pembahasan','required');
            $this->form_validation->set_rules('peserta_rapat', 'Peserta Rapat');
            $this->form_validation->set_rules('jumlah_peserta', 'Jumlah Peserta');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->MAgenda->setData($b,$c,$d,$e,$f,$g, $id_undangan, $id_ruangan);
                if ($h){
                    //Simpan Edit Data
                    $this->MAgenda->edit($h);
                } else {
                    //Simpan Data Baru
                    $this->MAgenda->add();
                }
                redirect('pimpinan/agenda_rapat');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_agenda){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->MAgenda->detail($id_agenda);
            }
            $data['judul']= "Tambah Data";
            $data['undangan']= $this->Adminm->getAllData('undangan');
            $data['ruangan']= $this->Adminm->getAllData('ruangan');
            
            $this->load->view('pimpinan/agenda-add', $data);
        }
        
    }
?>