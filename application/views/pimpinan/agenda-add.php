<?php $this->load->view('pimpinan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Agenda Rapat
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
            
            <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/pimpinan/agenda_rapat/add">
                   <input type="hidden" name="id_agenda" value="<?php echo @$detail->id_agenda?>">
                                     <div class="form-group">
      <label for="field-1" class="col-sm-3 control-label">Undangan</label>
      <div class="col-sm-5">
        <select class="form-control" name="id_undangan" required>
          <option value="">Pilih Undangan</option>
          <?php if (isset($undangan)) {
            foreach ($undangan as $row) { ?>
          <option value="<?php echo $row->id_undangan ?>"><?php echo $row->nomor_undangan ?></option>
          <?php }
          } ?>
        </select>
      </div>
    </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tanggal" value="<?php if (@$detail){ echo @$detail->tanggal;} else { echo set_value('tanggal');}?>">
                </div>
              </div>
              
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Jam Mulai</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="jam_mulai" value="<?php if (@$detail){ echo @$detail->jam_mulai;} else { echo set_value('jam_mulai');}?>">
                </div>
              </div>

              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Jam Selesai</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="jam_selesai" value="<?php if (@$detail){ echo @$detail->jam_selesai;} else { echo set_value('jam_selesai');}?>">
                </div>
              </div>
                            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Pembahasan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pembahasan" value="<?php if (@$detail){ echo @$detail->pembahasan;} else { echo set_value('pembahasan');}?>">
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
      <label for="field-1" class="col-sm-3 control-label">Ruangan</label>
      <div class="col-sm-5">
        <select class="form-control" name="id_ruangan" required>
          <option value="">Pilih Ruangan</option>
          <?php if (isset($ruangan)) {
            foreach ($ruangan as $row) { ?>
          <option value="<?php echo $row->id_ruangan ?>"><?php echo $row->nama_ruangan ?></option>
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