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
    <?php echo validation_errors();?>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
          <div class="panel-body">
            
            <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/pimpinan/hasil/add">
                   <input type="hidden" name="id_hasil" value="<?php echo @$detail->id_hasil?>">
                                     
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Kode Notulen</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_notulen" value="<?php if (@$detail){ echo @$detail->kode_notulen;} else { echo set_value('kode_notulen');}?>">
                </div>
              </div>
              
               <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Pembahasan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bahas_hasil" value="<?php if (@$detail){ echo @$detail->bahas_hasil;} else { echo set_value('bahas_hasil');}?>">
                </div>
              </div>

<div class="form-group row">
      <label class="control-label col-sm-3" for="namo">Peserta Rapat:</label>
      <div class="col-sm-5">
      <input type="radio" name="peserta_rapat" value="Internal" > Internal </input>
        <input type="radio" name="peserta_rapat" value="Eksternal" > Eksternal </input>
        <input type="radio" name="peserta_rapat" value="Internal&Eksternal" > Internal&Eksternal </input>
      </div>
    </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Jumlah Peserta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jumlah_peserta" value="<?php if (@$detail){ echo @$detail->jumlah_peserta;} else { echo set_value('jumlah_peserta');}?>">
                </div>
              </div>
    
             <div class="form-group">
      <label for="field-1" class="col-sm-3 control-label">Kode Agenda</label>
      <div class="col-sm-5">
        <select class="form-control" name="id_agenda" required>
          <option value="">Pilih Agenda</option>
          <?php if (isset($agenda_rapat)) {
            foreach ($agenda_rapat as $row) { ?>
          <option value="<?php echo $row->id_agenda ?>"><?php echo $row->pembahasan ?></option>
          <?php }
          } ?>
        </select>
      </div>
    </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                  <?php echo form_submit('submit','Simpan','class="btn btn-blue btn-lg" id="submit"');?>  
                  <?php echo form_close();?>
                </div>
              </div>
            </form>   
          </div>  
        </div>
      </div>
    </div>
  </section>
</div>
 <?php $this->load->view('pimpinan/footer.php')?>