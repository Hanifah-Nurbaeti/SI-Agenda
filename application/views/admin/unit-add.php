<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Unit
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
            
            <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/admin/unit/add">
                   <input type="hidden" name="id_unit" value="<?php echo @$detail->id_unit?>">
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Kode Unit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_unit" value="<?php if (@$detail){ echo @$detail->kode_unit;} else { echo set_value('kode_unit');}?>">
                </div>
              </div>
              
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nama Unit</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_unit" value="<?php if (@$detail){ echo @$detail->nama_unit;} else { echo set_value('nama_unit');}?>">
                </div>
              </div>

              <div class="form-group">
      <label class="control-label col-sm-3" for="thn">Divisi:</label>
      <div class="col-sm-5">
        <select class="form-control" name="id_divisi" required>
          <option value="">Pilih Divisi</option>
          <?php if (isset($divisi)) {
            foreach ($divisi as $row) { ?>
          <option value="<?php echo $row->id_divisi ?>"><?php echo $row->nama_divisi ?></option>
          <?php }
          } ?>
        </select>
      </div>
    </div>
              
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                
                  <?php echo form_submit('submit','Simpan','class="btn btn-primary " id="submit"');?> 
                   
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