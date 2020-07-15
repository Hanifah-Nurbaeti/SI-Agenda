<?php $this->load->view('karyawan/header.php')?>
<div class = "content-wrapper">
	<section class="content">
		<h4><strong> Detail Undangan Rapat </strong></h4>
		<table class="table">
			<tr>
				<th> Nomor Undangan</th>
				<td>  : <?php echo $detail->nomor_undangan?></td>
			</tr>
			<tr>
				<th> Tanggal</th>
				<td> : <?php echo $detail->tanggal?></td>
			</tr>

			<tr>
				<th> Waktu</th>
				<td> : <?php echo $detail->waktu?></td>
			</tr>
			<tr>
				<th> Ruangan </th>
				<td> : <?php echo $detail->nama_ruangan ?></td>
			</tr>
			<tr>
				<th> Pembahasan </th>
				<td> : <?php echo $detail->isi ?></td>
			</tr>
		</table>
		<a href="<?php echo site_url()?>/karyawan/undangan/index/<?php echo $detail->id_undangan?>" class= "btn btn-success">Kembali</a>
		<a href="<?php echo site_url()?>/karyawan/undangan/pdf/<?php echo $detail->id_undangan?>" class= "btn btn-warning">Eksport Pdf</a>
	
	</section>
</div>
<?php $this->load->view('karyawan/footer.php')?>
