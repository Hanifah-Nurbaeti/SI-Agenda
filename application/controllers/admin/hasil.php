<?php
class hasil extends CI_Controller {
	function __construct(){
        parent::__construct();

        if ($this->session->userdata('level')!="admin") {
            redirect('login', 'referesh');
        }
        $this->load->helper(array('form', 'url','download'));
        $this->load->model('Mhasil');
        $this->load->model('Mundangan');
        
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $data['hasil'] = $this->Adminm->get_all_undangan();
        //$data['user'] = $this->Mpegawai->tampil_data($username);
        $this->load->view('admin/hasil-view',$data);
    }
    public function bahasan()
    {
        $username = $this->session->userdata('username');
        $data['hasil'] = $this->Adminm->get_all_undangan();
        //$data['user'] = $this->Mpegawai->tampil_data($username);
        $this->load->view('admin/v_kelolahasil',$data);
    } 


        public function detail($id_hasil)
        {
            $this->load->model('Mhasil');
            $detail = $this->Mhasil->detail_data($id_hasil);
            $data['detail'] = $detail;
            $this->load->view('admin/hasil-detail', $data);
        }
        public function pdf($id_undangan){
            $this->load->library('dompdf_gen');
            $data['undangan'] = $this->Mhasil->detail_data($id_undangan);
            $this->load->view('admin/hasil-pdf',$data);

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
       $this->load->view('admin/upload_form',$data);
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
        redirect(site_url('admin/hasil/create'));
       } else {
        $file = $this->upload->data();
            $data = array(
                    'id_undangan' => $this->input->post('id_undangan'),
                    'gambar' => $file['file_name']
            );


            $this->Mhasil->update($data);
        }
            redirect(site_url('admin/hasil'));
        } 
           
    /*    function content()
    {
    $file_path ='./file/'; 
        $files = scandir($file_path);        
        $files_array = array();       
    foreach($files as $key=>$file_name) 
    { 
    $file_name = trim($file_name);
        if($file_name != '.' || $file_name != '..')
        {
    if((is_file($file_path.$file_name))) 
        { array_push($files_array,$file_name);
            }
        }
    } 
        $data['files'] = $files_array; 
    $this->load->view('view_files', $data); //tampilan untuk mendownload file
    }
    function download() 
        {    
            $this->load->library('zip'); //untuk mengkonversi kedalam zip
        $file_path = './file/';
            $zip_file_name ='Download';
        $selected_files = $_POST['files'];
        foreach($selected_files as $key=>$file)
    {
        $this->zip->read_file($file_path.$file);
    }
    $this->zip->download($zip_file_name); 
    }*/
    /*public function add($id_hasil=NULL){
        $this->load->library('form_validation');
        $submit = $this->input->post('submit');
        if ($submit){
            //$this->output->enable_profiler(TRUE);
            $b = $this->input->post('kode_notulen');
            $e = $this->input->post('bahas_hasil');
            $f = $this->input->post('peserta_rapat');
            $g = $this->input->post('jumlah_peserta');
            $h = $this->input->post('id_hasil');
            $id_agenda = $this->input->post('id_agenda');
            $this->form_validation->set_rules('kode_notulen', 'Kode Notulen','required | is_unique');
            $this->form_validation->set_rules('bahas_hasil', 'Pembahasan');
            $this->form_validation->set_rules('peserta_rapat', 'Peserta Rapat');
            $this->form_validation->set_rules('jumlah_peserta', 'Jumlah Peserta');
            
            if ($this->form_validation->run()==FALSE){
                $data['errors'] = TRUE;
            } else {
                $this->Mhasil->setData($b,$e,$f,$g,$id_agenda);
                if ($h){
                    //Simpan Edit Data
                    $this->Mhasil->edit($h);
                } else {
                    //Simpan Data Baru
                    $this->Mhasil->add();
                }
                redirect('admin/hasil');
            }
        }
        //jika membawa ID, artinya Edit 
            if ($id_hasil){
                //ambil data berdasarkan ID yang dikirim
                $data['detail'] = $this->Mhasil->detail($id_hasil);
            }
            $data['judul']= "Tambah Data";
            $data['agenda_rapat']= $this->Adminm->getAllData('agenda_rapat');
            
            $this->load->view('admin/hasil-add', $data);
        }*/
        
    }

?>