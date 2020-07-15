<?php
class hasil extends CI_Controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="pimpinan") {
            redirect('login', 'referesh');
        }
        $this->load->helper(array('form', 'url','download'));
        $this->load->model('Mhasil');
        $this->load->model('Mundangan');
        $this->load->model('Mpegawai');
        
    }
        public function index()
    {
        $username = $this->session->userdata('username');
        $data['undangan'] = $this->Mundangan->tampil($username);
        $data['user'] = $this->Mpegawai->tampil_data($username);
        $this->load->view('pimpinan/hasil-view',$data);
    }
    public function bahasan()
    {
        $username = $this->session->userdata('username');
       $data['undangan'] = $this->Mundangan->tampil($username);
        $data['user'] = $this->Mpegawai->tampil_data($username);
        $this->load->view('pimpinan/v_kelolahasil',$data);
    }  
    public function detail($id_hasil)
        {
            $this->load->model('Mhasil');
            $detail = $this->Mhasil->detail_data($id_hasil);
            $data['detail'] = $detail;
            $this->load->view('pimpinan/hasil-detail', $data);
        }
        public function pdf($id_undangan){
            $this->load->library('dompdf_gen');
            $data['undangan'] = $this->Mhasil->detail_data($id_undangan);
            $this->load->view('pimpinan/laporan-pdf',$data);

            $paper_size = 'A4';
            $orientation = 'portrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size,$orientation);
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("laporan_rapat.pdf", array('Attachment' => 0));
        }
         public function create($id_undangan)
   {

        $data['undangan'] = $this->Mundangan->get_by_id($id_undangan);
       $this->load->view('pimpinan/upload_form',$data);
   }
    public function upload()
    {
        //$this->output->enable_profiler(TRUE);
       $config = array(
        'upload_path'=>'./file',
        'allowed_types' => 'jpg|jpeg|png',
        );
       $this->load->library('form_validation');
       $this->load->library('upload',$config);
       if(!$this->upload->do_upload('gambar')){
         //$this->load->view('admin/upload_form');
        redirect(site_url('pimpinan/hasil/create'));
       } else {
        $file = $this->upload->data();
            $data = array(
                    'id_undangan' => $this->input->post('id_undangan'),
                    'gambar' => $file['file_name']
            );


            $this->Mhasil->update($data);
        }
            redirect(site_url('pimpinan/hasil'));
        }
        
    }
?>