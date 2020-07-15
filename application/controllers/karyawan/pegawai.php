<?php
class pegawai extends CI_Controller {

    function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="karyawan") {
            redirect('login', 'referesh');
        }
        $this->load->model('Mpegawai');
        
    }
    public function index()
    {

        $username = $this->session->userdata('username');
        $data['user'] = $this->Mpegawai->tampil_data($username);
        $this->load->view('karyawan/v_datapegawai',$data);
    }


    public function edit($username)
    {
        $username = $this->session->userdata('username');
        $data['user'] = $this->Mpegawai->tampil_data($username);
        $username = $this->session->userdata('username');
        $data['data']= $this->Mpegawai->get_by_id($username);
        $this->load->view('karyawan/v_editdatapegawai',$data);
    }

    
        public function update()
    {
        
        $site = $this->Mpegawai->listing();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('alamat_email', 'Alamat Email', 'required');
        $this->form_validation->set_rules('nomor_telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('nama_unit', 'Nama Unit', 'required');
        //$this->form_validation->set_rules('gambar', 'gambar', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'title' => 'Update Data',
                        'site'  => $site,
                        //'error' => $this->upload->display_errors(),
                        'isi'   => 'karyawan/pegawai/update');
            $this->load->view('karyawan/v_editdatapegawai',$data);
         } else {
             $i = $this->input;
                $data = array(  'id_pegawai'=> $i->post('id_pegawai'),
                                'id_user'=> $i->post('id_user'),
                                'username'=> $i->post('username'),
                                'nama_pegawai'=> $i->post('nama_pegawai'),
                                'jabatan'=>$i->post('jabatan'),
                                'alamat_email'=>$i->post('alamat_email'),
                                'nomor_telepon'=>$i->post('nomor_telepon'),
                                'nama_unit'=>$i->post('nama_unit'),
                                
                            );
                $this->Mpegawai->update($data);
                $this->session->set_flashdata('update','Konfigurasi Telah Diupdate');
                redirect(site_url('karyawan/pegawai'));
         
         
    }
}
}
