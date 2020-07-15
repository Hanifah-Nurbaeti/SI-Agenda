<!DOCTYPE HTML>
<html><head>
    <title><strong><center>Hasil Rapat</center></strong></title>
</head><body>
    <h2><center>
        Undangan Rapat
    </h2></center>
            <table >

                                <tr>
                                    <th>Nomor Undangan</th><td>:</td>
                                    <td>  <?php echo $undangan->nomor_undangan?></td>
                                    
                                </tr> 
                                <tr><th> Perihal</th><td>:</td><td>  Undangan Rapat</td></tr>
                                <tr>
                                    <th> Kepada</th><td>:</td>
                                    <td>  <?php echo $undangan->nama_pegawai?></td>
                                </tr>
                                
                                <tr>
                                    <th>Tanggal</th><td>:</td>
                                    <td>  <?php echo $undangan->tanggal?></td>
                                    
                                </tr>
                                
                                <tr>
                                    <th>Waktu </th><td>:</td>
                                    <td>  <?php echo $undangan->jam_mulai?> - <?php echo $undangan->jam_selesai?></td>
                                    
                                </tr>
                                <tr>
                                    <th>Pembahasan</th><td>:</td>
                                    <td>  <?php echo $undangan->pembahasan?></td>
                                    
                                </tr>
                                <tr>
                                    <th>Ruangan</th><td>:</td>
                                    <td>  <?php echo $undangan->nama_ruangan?></td>
                                    
                                </tr>
                                                    

                        </table>
</body></html>