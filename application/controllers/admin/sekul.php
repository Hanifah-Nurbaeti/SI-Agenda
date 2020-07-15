<?php
class sekul extends CI_Controller {

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
        $data['user'] = $this->Mpegawai->tampil_data($username);
        
        $this->load->view('admin/dashboard',$data);
    }
}