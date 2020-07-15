<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Ruangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
   <?php if ($hasil):?>
    <div class="box">
  <table class="table table-bordered datatable" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Ruangan</th>
                                    <th>Nama Ruangan</th>
                                    <th>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($hasil as $row):?>
                                <tr class=" odd gradeX">
                                    <td><?php echo $i?>.</td>
                                    <td><?php echo $row->kode_ruangan?></td>
                                    <td><?php echo $row->nama_ruangan?></td>   
                                    <td>
          <a  href="<?php echo site_url()?>/admin/ruangan/edit/<?php echo $row->id_ruangan?>" class= "fa fa-edit"> </a> |
          <a  href="<?php echo site_url()?>/admin/ruangan/detail/<?php echo $row->id_ruangan?>" class= "fa fa-info"> </a>
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
 <?php $this->load->view('admin/footer.php')?>