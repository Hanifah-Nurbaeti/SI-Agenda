<?php $this->load->view('pimpinan/header.php');
$this->load->model('Adminm');
?>
<div class="content-wrapper">
  <div align="center">
    <h3> Tabel Data Laporan </h3>
  </div>
  <?php $pesan=$this->session->flashdata('pesan'); ?>
        <?php if(@$pesan): ?>
          <div>
             <div class="alert alert-primary">
                    SMS Telah dikirim!
                 </div>
          </div>
        <?php endif; ?>
   <section class="content container-fluid">
    <table class="table table-bordered">
    <?php if ($laporan):?>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nomor Undangan</th>
          <th>Tanggal</th>
          <th>Nama Divisi </th>
          <th>Keterangan</th>
        </tr>
      </thead>
<?php $i=1;
 foreach($laporan->result() as $key) {?>
      <tbody id="tbody">
        <td><?php echo $i++?></td>
        <td><?php echo $key->nomor_undangan?></td>
        <td><?php echo $key->tanggal?></td>
        <td><?php echo $this->Mdivisi->getNameDivisi($key->id_divisi)?></td>
        <td><?php echo $key->status?></td>
      </tbody>
<?php } ?>
    </table>
    <?php else: ?>
    Tidak ada data
    <?php endif?>
   </section>
   
 </div>
<?php $this->load->view('pimpinan/footer.php')?>
