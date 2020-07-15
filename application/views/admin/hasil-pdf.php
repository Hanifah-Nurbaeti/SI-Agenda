<!DOCTYPE HTML>
<html><head>
	<title><strong><center>Hasil Rapat</center></strong></title>
</head><body>
  <div class="page">
    <div class="page-content">
      <div class='wrapper'>
        <p><h3><center>Hasil Rapat</center></h3></p>

        <p>
         &nbsp;  &nbsp; Tanggal &nbsp;  &nbsp;  &nbsp; : <?=$undangan->tanggal;?><br>
         &nbsp;  &nbsp; &nbsp; Pukul  &nbsp; &nbsp;  &nbsp; : <?=$undangan->jam_mulai;?> - <?=$undangan->jam_selesai;?><br>
         &nbsp;  &nbsp; Tempat  &nbsp; &nbsp;  &nbsp; : <?=$undangan->nama_ruangan;?><br>
         &nbsp;  &nbsp; Peserta  &nbsp; &nbsp;  &nbsp; : <?=$undangan->peserta_rapat;?> <br>
         &nbsp;  &nbsp; &nbsp; &nbsp; Unit  &nbsp; &nbsp;  &nbsp; : <?=$undangan->nama_unit;?> <br>
        </p>
        <p> Dengan materi pembahasan <?=$undangan->isi;?>
        <p>Menyimpulkan bahwa : <br>  <?=$undangan->pembahasan;?> </p>
        <p>Demikian hasil rapat ini saya sampaikan, atas perhatian saya ucapkan banyak terima kasih.</p>

        <p align="right">Hormat Saya,</p>

        <p align="right" class="signature"><?= "Notulen"?></p>
        
        
      </div>
    </div>
  </div>
</body></html>