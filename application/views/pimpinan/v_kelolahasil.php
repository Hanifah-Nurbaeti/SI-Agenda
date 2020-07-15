<?php $this->load->view('pimpinan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Hasil Undangan
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
                                    <th>Pembahasan</th>
                                    <th>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($undangan as $row):?>
                                <tr class=" odd gradeX">
                                    <td><?php echo $i?>.</td>
                                    <td><?php echo $row->nomor_undangan?></td>
                                    <td><?php echo $row->pembahasan?></td>  
                                    <td>
          <a onclick="javascript: return confirm ('anda yakin mau mengubah data?')" href="<?php echo site_url()?>/pimpinan/undangan/add/<?php echo $row->id_undangan?>" class= "fa fa-edit"></a> |
          
          <a href="<?php echo site_url()?>/karyawan/undangan/pdf/<?php echo $row->id_undangan?>"  class= "fa fa-file-pdf-o"></a>
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