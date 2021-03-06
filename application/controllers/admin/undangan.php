<?php
class undangan extends CI_Controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->model('Mundangan');
        
    }

    public function index()
    {
		$username = $this->session->userdata('username');
        $data['hasil'] = $this->Adminm->get_all_undangan();
        //$data['undangan'] = $this->Mundangan->tampil($username);
        $this->load->view('admin/undangan-view.php',$data);
    }  
    
    public function add($id_undangan=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nomor_undangan');
            $b = $this->input->post('tanggal');
            $c = $this->input->post('jam_mulai');
            $d = $this->input->post('jam_selesai');
            $e = $this->input->post('isi');
            $f = $this->input->post('peserta_rapat');
            $g = $this->input->post('username');
            $h = $this->input->post('id_ruangan'); 
            //$i = $this->input->post('id_unit');
            $j = $this->input->post('id_undangan');

            //$pesanError = ['required' => '<span style="color:red;">%s Data Sudah Ada </span>'];              
            $this->form_validation->set_rules('nomor_undangan', 'nomor undangan', 'required|is_unique[undangan.nomor_undangan]');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|date|is_unique[undangan.tanggal]');
            $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|time|is_unique[undangan.jam_mulai]');
            $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|time|is_unique[undangan.jam_selesai]');
            $this->form_validation->set_rules('id_ruangan', 'Nama ruangan', 'required|is_unique[ruangan.nama_ruangan]');

            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mundangan->setData($a,$b,$c,$d,$e,$f,$g,$h);
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
            $data['user']= $this->Adminm->getAllData('user');
            $data['unit']= $this->Adminm->getAllData('unit');
            $data['ruangan']= $this->Adminm->getAllData('ruangan');
            $this->load->view('admin/undangan-add', $data);
            $this->session->set_flashdata('msg', 'Ruangan Sudah Tidak Bisa Dipakai');
        }
            public function edit($id_undangan=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            $a = $this->input->post('nomor_undangan');
            $b = $this->input->post('tanggal');
            $c = $this->input->post('jam_mulai');
            $d = $this->input->post('jam_selesai');
            $e = $this->input->post('isi');
            $f = $this->input->post('peserta_rapat');
            $g = $this->input->post('id_user');
            $h = $this->input->post('id_ruangan'); 
            //$i = $this->input->post('id_unit');
            $j = $this->input->post('id_undangan');               
           $this->form_validation->set_rules('nomor_undangan', 'nomor undangan', 'required|is_unique[undangan.nomor_undangan]');
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|date|is_unique[undangan.tanggal]');
            $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|time|is_unique[undangan.jam_mulai]');
            $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|time|is_unique[undangan.jam_selesai]');
            $this->form_validation->set_rules('id_ruangan', 'Nama ruangan', 'required|is_unique[ruangan.nama_ruangan]');
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mundangan->setData($a,$b,$c,$d,$e,$f,$g,$h);
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
            $data['user']= $this->Adminm->getAllData('user');
            $data['unit']= $this->Adminm->getAllData('unit');
            $data['ruangan']= $this->Adminm->getAllData('ruangan');
            $this->load->view('admin/undangan-edit', $data);
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
            if ($id_undangan){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mundangan->detail($id_undangan);
            }
            $this->load->model('Mundangan');
            $detail = $this->Mundangan->detail_data($id_undangan);
            $data['data'] = $this->Mundangan->getkehadiran($id_undangan);
            $this->load->view('admin/v_editbahasan',$data);
        }
        public function insert()
        {   
            $i = $this->input;
            $data = array ('pembahasan' => $i->post('pembahasan'), 'id_undangan' => $i ->post('id_undangan'),
                );
            $this->Mundangan->update($data);
            $this->session->set_flashdata('updt','Konfigurasi Telah Diupdate');
            redirect('admin/hasil');
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

    }
?>