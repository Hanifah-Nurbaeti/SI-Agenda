<?php
class sekul extends CI_Controller {

    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="karyawan") {
            redirect('login', 'refresh');
        }
        $this->load->model('Mpegawai');
    }

    public function index()
    {
        
        $username = $this->session->userdata('username');
        
        $data['user'] = $this->Mpegawai->tampil_data($username);
        
        $this->load->view('karyawan/dashboard',$data);
    }
}