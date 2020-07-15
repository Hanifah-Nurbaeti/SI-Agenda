<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Ruangan
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
            
            <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/admin/ruangan/add">
                   <input type="hidden" name="id_ruangan" value="<?php echo @$detail->id_ruangan?>">
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Kode Ruangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_ruangan" value="<?php if (@$detail){ echo @$detail->kode_ruangan;} else { echo set_value('kode_ruangan');}?>">
                </div>
              </div>
              
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nama Ruangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_ruangan" value="<?php if (@$detail){ echo @$detail->nama_ruangan;} else { echo set_value('nama_ruangan');}?>">
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