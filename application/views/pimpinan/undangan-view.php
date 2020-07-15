<?php $this->load->view('pimpinan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Undangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
   <?php if ($undangan):?>
    <div class="box">
  <table class="table table-bordered datatable" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Undangan</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Pembahasan</th>
                                    <th>Ruangan</th>
                                    
                                    <th>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($undangan as $row):?>
                                <tr class=" odd gradeX">
                                    <td><?php echo $i?>.</td>
                                    <td><?php echo $row->nomor_undangan?></td>
                                    <td><?php echo $row->tanggal?></td> 
                                    <td><?php echo $row->jam_mulai?></td>
                                    <td><?php echo $row->isi?></td>
                                    <td><?php echo $row->nama_ruangan?></td> 
                                      
                                    <td>
          
          
          <a href="<?php echo site_url()?>/pimpinan/undangan/pdf/<?php echo $row->id_undangan?>"  class= "fa fa-file-pdf-o"></a>
        </td>
        </td>
                                </tr>
                                <?php $i++?>
                                <?php endforeach?>              
                            </tbody>
                        </table>
                            <?php else: ?>
                                Tidak ada data
                            <?php endif?>
  </section>
  </div>
</div>
 <?php $this->load->view('pimpinan/footer.php')?>