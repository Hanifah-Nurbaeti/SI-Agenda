<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Undangan
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
            
            <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/admin/undangan/konfirmasi">
                   <input type="hidden" name="id_undangan" value="<?php echo @$detail->id_undangan?>">
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nomor Undangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nomor_undangan" value="<?php if (@$detail){ echo @$detail->nomor_undangan;} else { echo set_value('nomor_undangan');}?>" readonly>
                </div>
              </div>
              

    <div class="form-group">
      <label for="field-1" class="col-sm-3 control-label">Username</label>
      <div class="col-sm-5">
        <select class="form-control" name="id_user" required>
          <option value="">Pilih Pegawai</option>
          <?php if (isset($user)) {
            foreach ($user as $row) { ?>
          <option value="<?php echo $row->id_user ?>"><?php echo $row->username ?></option>
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

 <?php $this->load->view('admin/footer.php')?>