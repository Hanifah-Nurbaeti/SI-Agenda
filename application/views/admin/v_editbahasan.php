<?php $this->load->view('admin/header.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hasil Rapat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content container-fluid">
        <div class="widget-content nopadding">
          <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/admin/undangan/insert">
             <input type="hidden" name="id_undangan" value="<?php echo @$detail->id_undangan?>">
 <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nomor Undangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nomor_undangan" value="<?php if (@$detail){ echo @$detail->nomor_undangan;} else { echo set_value('nomor_undangan');}?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tanggal" value="<?php if (@$detail){ echo @$detail->tanggal;} else { echo set_value('tanggal');}?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Jam Mulai</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="jam_mulai" value="<?php if (@$detail){ echo @$detail->jam_mulai;} else { echo set_value('jam_mulai');}?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Jam Selesai</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="jam_selesai" value="<?php if (@$detail){ echo @$detail->jam_selesai;} else { echo set_value('jam_selesai');}?>" readonly>
                </div>
              </div>
      <!--<div class="form-group">
      <label for="field-1" class="col-sm-3 control-label">Ruangan</label>
      <div class="col-sm-5">
        <select class="form-control" name="id_ruangan" disabled selected>
          <option value="">Pilih Ruangan</option>
          <?php if (isset($ruangan)) {
            foreach ($ruangan as $row) { ?>
          <option value="<?php echo $row->id_ruangan ?>"><?php echo $row->nama_ruangan ?></option>
          <?php }
          } ?>
        </select>
      </div>
    </div>-->
    <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Pembahasan</label>
                <div class="col-sm-5" >
                  <textarea type="text" class="form-control" name="pembahasan"  value="<?php if (@$detail){ echo @$detail->pembahasan;} else { echo set_value('pembahasan');}?>" > </textarea>
                </div>
              </div>

           
            
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <input type="submit" class="btn btn-success" value="Simpan">
              </div>
              
            </div>
          </form>
          <br>
        </div>
      </section>
      </div>
    </div>

<?php $this->load->view('admin/footer.php'); ?>