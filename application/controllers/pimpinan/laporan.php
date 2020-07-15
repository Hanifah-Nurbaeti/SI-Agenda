<?php


class laporan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Mundangan');
        $this->load->model('Mlaporan');
        //$this->load->library('Pdf');
		
	}

	   public function index ()
    {

    //$data['unit'] = $this->MUnit->getList();
    $this->load->library('form_validation');
    $this->load->model('Mundangan');
    if($this->input->post('submit',TRUE == 'Submit'))
    {
      $this->form_validation->set_rules('tanggal','Tahun','required');
      //$this->form_validation->set_rules('unit','unit','required');
      if ($this->form_validation->run() == TRUE)
      {
        $thn = $this->input->post('tanggal',TRUE);
        //$unt = $this->input->post('unit',TRUE);
      }

    } else {
      $thn = date('Y');
      //$unt = $this->input->post('unit',FALSE);
    }

    $tahun = $this->input->post('tanggal');
    $status = $this->input->post('status');
    //$unt = $this->input->post('unit');
    //kondisi/kriteria laporan anu dek ditampilkeun
    $where = ['undangan.tanggal' => $tahun, 'undangan.status' => $status];
    $data['tanggal'] = $thn;
    //$data['pilih'] = $unt;



    $data['data'] = $this->Mundangan->get($where);
        $this->load->view('pimpinan/vlaporan',$data);
    }

	public function lihat_tanggal(){
       $result = $this->Mlaporan->lihat_semua_tanggal();
        if ($result != false) {
            return $result;
        } else {
            return 'Database is empty !';
        } 
    }

    public function laporan() {
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $data = array(
            'date1' => $date1,
            'date2' => $date2
        );
        if ($date1 == "" || $date2 == "") {
            $data['date_range_error_message'] = "Both date fields are required";
        } else {
            $result = $this->Mlaporan->ambil_diantara_tanggal($data);
            if ($result != false) {
                $data['result_display'] = $result;
            } else {
                $data['result_display'] = "No record found !";
            }
        }
        $data['show_table'] = $this->lihat_tanggal();
        $data['title'] = 'Laporan pertanggal';
        $data['isi']  = '';

        $this->load->view('pimpinan/vlaporan', $data);
    }


    /*public function PDF_BATCH() {
            
            
            $pdf = new pdf();
            
            $orientation = "C";
            $format = "A4";
            $keepmargins = false;
            $tocpage = false;
            
            $pdf->AddPage($orientation, $format, $keepmargins, $tocpage);
            
            $family = "courier";
            $style = "";
            $size = "12";
            
            $pdf->SetFont($family, $style, $size);

            //$pdf->image('libraries/logokmi.png',40,778,70);


            $html = 
            '
            <table>
            <tr>
            <td><img width="100" height="56" src="http://localhost/kmiweighing/assets/img/logokmi.png"></td>
            <td><br><h4 align="center">LAPORAN PENEMPATAN<br></h4></td>
            <td></td>
            </tr>
            <br />
            <table border="1">
                <tr bgcolor="green" style="color: white;" align="center">
                            <th width="10%">NO</th>
                            <th>Nama Lengkap</th>
                            <th>Instansi</th>
                            <th width="25%">Jurusan</th>
                            <th>Status</th>
                            <th>ID Divisi</th>
                </tr>';
            
            $i = 1;
            
            $result = $this->session->userdata('result');
            foreach ($result as $value)     :           
            
            $html .= '
                <tr>
                    <td align="center">'.$i.'</td>
                    <td align="center">'.$value->nama_lengkap.'</td>
                    <td align="center">'.$value->instansi.'</td>
                    <td align="center">'.$value->jurusan.'</td>
                    <td align="center">'.$value->status.'</td>
                    <td align="center">'.$value->id_divisi.'</td>
                </tr>';
            $i++;
            endforeach;
                
            $html .= '</table>';
                        
            $ln = true;
            $fill = false;
            $reseth = false;
            $cell = false;
            $align = "";
            
            $pdf->writeHTML($html, $ln, $fill, $reseth, $cell, $align);
            
            $pdf->Output();
            
            $dest = "F";
            
            $pdf->Output($name, $dest);
    }

    public function EXCEL_BATCH(){
        $this->load->view('excel_batch');
    }*/
}