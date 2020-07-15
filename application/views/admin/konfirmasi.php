<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfirmasi Undangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
               <?php $updt = $this->session->flashdata('updt');?>
                        <?php if (@$updt):?>
                        <div class="alert alert-info alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                            <h4 class="alert-heading">Berhasil!</h4>
                            Data Berhasil Di update! </div>
                        <?php endif?>
   <?php if ($detail):?>
    <div class="box">
  <table class="table table-bordered datatable" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Undangan</th>
                                    <th>Unit</th>
                                    <th>Kehadiran</th>      
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($detail as $row):?>
                                <tr class=" odd gradeX">
                                    <td><?php echo $i?>.</td>
                                    <td><?php echo $row->nomor_undangan?></td>
                                    <td><?php echo $row->nama_unit?></td>
                                       
                                    <td>
                    <center><bold><?= $row->status ?></bold><br><a  href="<?php echo site_url("admin/undangan/editkehadiran/{$row->id_undangan}") ?>">Ubah</a></center></td>
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