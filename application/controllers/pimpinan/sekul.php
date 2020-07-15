<?php
class sekul extends CI_Controller {

    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="pimpinan") {
            redirect('login', 'referesh');
        }

    }

    public function index()
    {
        
        $username = $this->session->userdata('username');
        //$nama_user = $this->session->userdata('nama_user');
        
        //$data['user'] = $this->Mpegawai2->tampil_data($username);
        
        $this->load->view('pimpinan/dashboard');
    }
}