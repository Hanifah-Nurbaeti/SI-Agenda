<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Divisi
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
            
            <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/admin/divisi/add">
                   <input type="hidden" name="id_divisi" value="<?php echo @$detail->id_divisi?>">
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Kode Divisi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_divisi" value="<?php if (@$detail){ echo @$detail->kode_divisi;} else { echo set_value('kode_divisi');}?>">
                </div>
              </div>
              
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nama Divisi</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_divisi" value="<?php if (@$detail){ echo @$detail->nama_divisi;} else { echo set_value('nama_divisi');}?>">
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