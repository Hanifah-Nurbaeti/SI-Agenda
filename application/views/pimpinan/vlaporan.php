<?php $this->load->view('pimpinan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
                <div id="show_form">
            <form action="<?php echo site_url('pimpinan/laporan/laporan');?>" method="post">

                    <h3 align="center"><b>LAPORAN AGENDA</b></h3>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
           <div class="col-md-3">
            <label>Dari Tanggal</label>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>            
              <input type="date" name="date_from" class="form-control">
            </div>
          </div>
           <div class="col-md-3">
            <label>Sampai Tanggal</label>
            <div class="form-group input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>            
              <input type="date" name="date_to" class="form-control">
            </div>
          </div>   
          <div class="col-md-12">
          <p align="right"><button class="btn btn-primary">Lihat</button></p>    
          </div>
          </form>  
                <div class="message">
                    <?php
                    if (isset($result_display)) {
            $_SESSION['result'] = $result_display;
                    ?>
<br>

            <br><br>

                       <?php if ($result_display == 'No record found !') {
                            echo $result_display;
                        } else {
                            echo "<table class='table table-striped table-bordered table-hover'>";
                            echo '<tr align="center">
                                <th>NO</th>
                                <th>Nomor Undangan</th>
                                <th>Tanggal</th>
                                
                                <th>Status</th>
                                
                              <tr/>';
                            $i=1; foreach ($result_display as $value) {
                                echo '<tr align="center">' . 
                                   '<td>' . $i . '</td>' .
                                   '<td>'.$value->nomor_undangan.'</td>'.
                                   '<td>'.$value->tanggal.'</td>'.
                                   //'<td>' . $value->nama_unit . '</td>' .
                                   '<td>' . $value->status . '</td>' .
                                   '<tr/>';
                            $i++; }
                            echo '</table>';
                        }
                    }
                    ?>

                </div>
            </div>

    </section>

    
  </div>

  <!-- /.content-wrapper -->

 <?php $this->load->view('pimpinan/footer.php')?>