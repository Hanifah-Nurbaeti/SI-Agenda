<?php $this->load->view('karyawan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hasil Rapat
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
                                    <th>Tanggal</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Berakhir</th>
                                    <th>Pembahasan</th>
                                    <th>Unit</th>
                                    <th>Divisi</th>
                                    <th>Peserta Rapat</th>
                                    <th>Ruangan</th>
                                     <th>Status</th>
                                     <th>Dokumen</th>
                                     <th>Hasil Rapat</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($undangan as $row):?>
                                <tr class=" odd gradeX">
                                    <td><?php echo $i?>.</td>
                                    <td><?php echo $row->tanggal?></td> 
                                    <td><?php echo $row->jam_mulai?></td>
                                    <td><?php echo $row->jam_selesai?></td>
                                    <td><a href="<?php echo site_url()?>/karyawan/undangan/editbahasan/<?php echo $row->id_undangan?>"><?php echo $row->isi?></a></td>
                                    <td><?php echo $row->nama_unit?></td>
                                    <td><?php echo $row->nama_divisi?></td>
                                    <td><?php echo $row->peserta_rapat?></td>
                                    <td><?php echo $row->nama_ruangan?></td>
                                    <td><?php echo $row->status?></td>
                                
                                <td>
          <a href="<?php echo site_url()?>/karyawan/hasil/pdf/<?php echo $row->id_undangan?>"  class= "fa fa-download"></a> | <a href="<?php echo site_url()?>/karyawan/hasil/create/<?php echo $row->id_undangan?>"  class= "fa fa-upload"></a>
        </td>
        <td><img  class="img-responsive" <?php echo "<img src='".base_url("file/".$row->gambar)."'>";  ?>
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
 <?php $this->load->view('karyawan/footer.php')?>