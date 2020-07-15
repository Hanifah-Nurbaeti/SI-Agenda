<?php
class undangan extends CI_Controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->model('Mundangan');
        $this->load->model('Adminm');

        
    }

    public function index()
    {
		$username = $this->session->userdata('username');
        $data['hasil'] = $this->Adminm->get_all_undangan();
        //$data['undangan'] = $this->Mundangan->tampil($username);
        $this->load->view('admin/undangan-view.php',$data);
    }  
    public function add($id_undangan=NULL){
        //$this->load->model('Mundangan');
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nomor_undangan');
            $b = $this->input->post('tanggal');
            $c = $this->input->post('jam_mulai');
            $d = $this->input->post('jam_selesai');
            $e = $this->input->post('isi');
            $f = $this->input->post('peserta_rapat');
            //$g = $this->input->post('status');
            $h = $this->input->post('id_ruangan'); 
            $i = $this->input->post('id_unit');
            $j = $this->input->post('id_undangan');               
            $this->form_validation->set_rules('nomor_undangan', 'nomor undangan', 'required');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mundangan->setData($a,$b,$c,$d,$e,$f,$h,$i);
                if ($j){
                    //Simpan Edit Data
                    $this->Mundangan->edit($j);
                } else {
                    //Simpan Data Baru
                    $this->Mundangan->add();
                }
                redirect('admin/undangan');
            }
        } 
        //jika membawa ID, artinya Edit 
            if($id_undangan){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mundangan->detail($id_undangan);

            }
            $data['judul']= "Tambah Data";
            $data['unit']= $this->Adminm->getAllData('unit');
            $data['ruangan']= $this->Adminm->getAllData('ruangan');
            $this->load->view('admin/undangan-add', $data);
        }
        public function detail($id_undangan)
        {
            $this->load->model('Mundangan');
            $detail = $this->Mundangan->detail_data($id_undangan);
            $data['detail'] = $detail;
            $this->load->view('admin/undangan-detail', $data);
        }
        public function pdf($id_undangan){
            $this->load->library('dompdf_gen');
            $data['undangan'] = $this->Mundangan->detail_data($id_undangan);
            $this->load->view('admin/undangan-pdf',$data);

            $paper_size = 'A4';
            $orientation = 'portrait';
            $html = $this->output->get_output();
            $this->dompdf->set_paper($paper_size,$orientation);
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("undangan_rapat.pdf", array('Attachment' => 0));
        }
        public function tampil($id_undangan)
    {
        $this->load->model('Mundangan');
        $detail = $this->Mundangan->detail_data($id_undangan);
        $data['detail'] = $this->Mundangan->detail($id_undangan);
        $this->load->view('admin/nomor_undangan.php',$data);
    }
    public function konfirmasi()
    {
        $this->load->model('Mundangan');
        $detail = $this->Mundangan->detail_data($id_undangan);
        $data['detail'] = $this->Mundangan->detail($id_undangan);
        $this->load->view('admin/konfirmasi',$data);
    }
        public function editkehadiran($id_undangan)
        {
            if ($submit){
            //$this->output->enable_profiler(TRUE);
            $b = $this->input->post('nomor_undangan');
            $c = $this->input->post('tanggal');
            $d = $this->input->post('jam_mulai');
            $g = $this->input->post('jam_selesai');
            $e = $this->input->post('isi');
            $h = $this->input->post('peserta_rapat');
            $f = $this->input->post('id_undangan');
            $id_ruangan = $this->input->post('id_ruangan');
            $unit= $this->input->post('id_unit');
            //$id_user = $post['id_user'];
            $this->form_validation->set_rules('nomor_undangan', 'Nomor Undangan', 'required');
            $this->form_validation->set_rules('tanggal', 'Tanggal');
            //$this->form_validation->set_rules('waktu', 'Waktu');
            $this->form_validation->set_rules('isi', 'Isi');
            $this->form_validation->set_rules('jam_mulai', 'Jam Mulai','required');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mundangan->setData($b,$c,$d,$g,$e,$h,$id_ruangan,$id_user,$unit);
                if ($f){
                    //Simpan Edit Data
                    $this->Mundangan->edit($f);
                } else {
                    //Simpan Data Baru
                    $this->Mundangan->add();
                }

                redirect('admin/undangan');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_undangan){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mundangan->detail($id_undangan);
            }
            $this->load->model('Mundangan');
            $detail = $this->Mundangan->detail_data($id_undangan);
            $data['data'] = $this->Mundangan->getkehadiran($id_undangan);
            $this->load->view('admin/v_editkehadiran',$data);
        }
         public function editbahasan($id_undangan)
        {
            $this->load->model('Mundangan');
            $detail = $this->Mundangan->detail_data($id_undangan);
            $data['data'] = $this->Mundangan->getkehadiran($id_undangan);
            $this->load->view('admin/v_hasilpembahasan',$data);
        }
        public function update()
        {
            $i = $this->input;
            $data = array ('status' => $i->post('status'), 'id_undangan' => $i ->post('id_undangan'),
                );
            $this->Mundangan->update($data);
            $this->session->set_flashdata('updt','Konfigurasi Telah Diupdate');
            redirect('admin/undangan');
        }
        public function update_data()
        {
            $i = $this->input;
            $data = array ('pembahasan' => $i->post('status'), 'id_undangan' => $i ->post('id_undangan'),
                );
            $this->Mundangan->update($data);
            $this->session->set_flashdata('updt','Konfigurasi Telah Diupdate');
            redirect('admin/hasil');
        }

    }
?>