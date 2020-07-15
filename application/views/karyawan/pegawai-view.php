<?php $this->load->view('karyawan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pegawai
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
                                    <th>NIPP</th>
                                    <th>Username</th>
                                    <th>Nama Pegawai</th>
                                    <th>Divisi</th>
                                    <th>Unit</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Aksi</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;?>
                                <?php foreach ($hasil as $row):?>
                                <tr class=" odd gradeX">
                                    <td><?php echo $i?>.</td>
                                    <td><?php echo $row->nipp?></td>
                                    <td><?php echo $row->username?></td>
                                    <td><?php echo $row->nama_pegawai?></td> 
                                    
                                    
                                    <td><?php echo $row->nama_divisi?></td>
                                    <td><?php echo $row->nama_unit?></td>
                                    <td><?php echo $row->alamat_email?></td>
                                    <td><?php echo $row->nomor_telepon?></td>   
                                    <td>
          <a href="<?php echo site_url()?>/karyawan/pegawai/add/<?php echo $row->id_pegawai?>"> Ubah</a> |
          <a href="<?php echo site_url()?>/karyawan/pegawai/delete/<?php echo $row->id_pegawai?>"> Hapus</a>
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