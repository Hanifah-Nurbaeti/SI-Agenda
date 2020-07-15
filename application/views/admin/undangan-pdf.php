<!DOCTYPE HTML>
<html><head>
    <title><strong><center>Undangan Rapat</center></strong></title>
</head><body>
  <div class="page">
    <div class="page-content">
      <div class='wrapper'>
        <p><h3><center>Undangan Rapat</center></h3></p>

        <p align="right">Bandung, <?=date("d M Y");?></p>

        <p>Hal : Undangan Rapat</p>

        <p>Kepada Yth Bapak/ibu

        <p>Dengan hormat,</p>

        <p>Sehubungan akan diadakan rapat <?=$undangan->isi;?>   kami mengharapkan bapak/ibu dapat menghadiri rapat pada:</p>

        <p>
         &nbsp;  &nbsp; Tanggal &nbsp;  &nbsp;  &nbsp; : <?=$undangan->tanggal;?><br>
         &nbsp;  &nbsp; Pukul  &nbsp; &nbsp;  &nbsp; : <?=$undangan->jam_mulai;?> - <?=$undangan->jam_selesai;?><br>
         &nbsp;  &nbsp; Tempat  &nbsp; &nbsp;  &nbsp; : <?=$undangan->nama_ruangan;?>
        </p>

        <p>Demikian undangan ini saya sampaikan, atas perhatian dan kebijaksanaannya saya ucapkan banyak terima kasih.</p>

        <p align="right">Hormat Saya,</p>

        <p  align="right" class="signature"><?= "Pimpinan Rapat"?></p>
        
        
      </div>
    </div>
  </div>
</body></html>
