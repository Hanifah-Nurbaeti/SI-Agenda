<?php

Class GrafikController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('modgrafik');
    }
  public function index ()
    {
      $data['data'] = $this->modgrafik->grafik();
      $this->load->view('pimpinan/grafik',$data);
    }

}
?>