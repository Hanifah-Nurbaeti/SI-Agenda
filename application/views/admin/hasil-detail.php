<?php $this->load->view('admin/header.php')?>
<div class = "content-wrapper">
	<section class="content">
		<h4><strong> Detail Hasil Rapat </strong></h4>
		<table class="table">
			<tr>
				<th> Kode Notulen</th>
				<td> <?php echo $detail->kode_notulen?></td>
			</tr>
			<tr>
				<th> Pembahasan</th>
				<td> <?php echo $detail->bahas_hasil?></td>
			</tr>

			<tr>
				<th> Jumlah Peserta</th>
				<td> <?php echo $detail->jumlah_peserta?></td>
			</tr>
		</table>
		<a href="<?php echo site_url()?>/admin/hasil/index/<?php echo $detail->id_hasil?>" class= "btn btn-success">Kembali</a>
		<a href="<?php echo site_url()?>/admin/hasil/pdf" class= "btn btn-warning">Eksport Pdf</a>
	
	</section>
</div>
<?php $this->load->view('admin/footer.php')?>
