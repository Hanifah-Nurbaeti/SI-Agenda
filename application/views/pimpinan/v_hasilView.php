<?php $this->load->view('pimpinan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Hasil Rapat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
   <?php if ($hasil):?>
    <div class="box">
        <?php $pesan = $this->session->flashdata('pesan');?>
      <?php if (@$pesan):?>
      <div class="alert alert-primary">
        <strong>SMS Telah Dikirim</strong> 
      </div>
      <?php endif?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nomor Undangan </th>
        <th>Tanggal</th>
        <th>Divisi </th>
        <th>Keterangan </th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1;?>
    <?php foreach ($laporan as $row):?>
      <tr>
        <td><?php echo $i?>.</td>
        <td><?php echo $row->nomor_undangan?></td>
        <td><?php echo $row->tanggal?></td>
        <td><?php echo $row->nama_divisi?></td>
        <td><?php echo $row->status?></td>
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