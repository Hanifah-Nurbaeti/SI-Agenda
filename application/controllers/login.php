<?php
class login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('MLogin');
        $this->load->library('form_validation');
    }

    function index(){
        $data['home'] = true;
        $this->load->view('login',$data);
    }

    function auth(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek_admin=$this->MLogin->CheckUser($username,$password);
        

        if($cek_admin){ //jika login sebagai dosen
                foreach ($cek_admin as $row);
                //$data=$cek_admin->row_array();
                //$this->session->set_userdata('logged',TRUE);
                $this->session->set_userdata('username', $row->username); 
                $this->session->set_userdata('nama_user', $row->nama_user); 
                $this->session->set_userdata('level', $row->level);
                 if($this->session->userdata('level')=="admin"){ //Akses admin
                    //$this->session->set_userdata('username', $row->username);
                
                //$this->session->set_userdata('level', $row->level);

                    redirect('admin/sekul','refresh');

                 }else if($this->session->userdata('level')=="pimpinan"){ //akses pimpinan
                    //$this->session->set_userdata('level','pimpinan');
                                //$this->session->set_userdata('ses_id',$data['id_user']);
                    //$this->session->set_userdata('ses_nama',$data['nama_user']);
                    redirect('pimpinan/sekul','refresh');
                 }else{ //akses karyawan
                    $this->session->set_userdata('level','karyawan');
                                //$this->session->set_userdata('ses_id',$data['id_user']);
                    //$this->session->set_userdata('ses_nama',$data['nama_user']);
                    redirect('karyawan/sekul','refresh');
                 }
            }else {
                $this->session->set_flashdata('pesan', 'Username atau Password Anda salah');
                redirect('login');
            }
        }

    

     function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
