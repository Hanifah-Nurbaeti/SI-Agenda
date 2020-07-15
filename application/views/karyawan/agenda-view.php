<?php $this->load->view('karyawan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agenda Rapat
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
                                    <th>Tanggal</th>
                                    <th>Jam Mulai</th>
                                    <th>Jam Berakhir</th>
                                    <th>Pembahasan</th>
                                    <th>Unit</th>
                                    <th>Divisi</th>
                                    <th>Peserta Rapat</th>
                                    <th>Ruangan</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($hasil as $row):?>
                                <tr class=" odd gradeX">
                                    <td><?php echo $i?>.</td>
                                    <td><?php echo $row->tanggal?></td> 
                                    <td><?php echo $row->jam_mulai?></td>
                                    <td><?php echo $row->jam_selesai?></td>
                                    <td><?php echo $row->isi?></td>
                                    <td><?php echo $row->nama_unit?></td>
                                    <td><?php echo $row->nama_divisi?></td>
                                    <td><?php echo $row->peserta_rapat?></td>
                                    <td><?php echo $row->nama_ruangan?></td>
                                    
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