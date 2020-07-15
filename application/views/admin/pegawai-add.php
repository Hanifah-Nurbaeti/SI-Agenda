<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pegawai
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
            
            <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/admin/pegawai/add">
                   <input type="hidden" name="id_pegawai" value="<?php echo @$detail->id_pegawai?>">
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">NIPP</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nipp" value="<?php if (@$detail){ echo @$detail->nipp;} else { echo set_value('nipp');}?>">
                </div>
              </div>
              
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nama Pegawai</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_pegawai" value="<?php if (@$detail){ echo @$detail->nama_pegawai;} else { echo set_value('nama_pegawai');}?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alamat_email" value="<?php if (@$detail){ echo @$detail->alamat_email;} else { echo set_value('alamat_email');}?>">
                </div>
              </div>
              <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nomor Telepon</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nomor_telepon" value="<?php if (@$detail){ echo @$detail->nomor_telepon;} else { echo set_value('nomor_telepon');}?>">
                </div>
              </div>

              <div class="form-group">
      <label class="control-label col-sm-3" for="thn">Unit:</label>
      <div class="col-sm-5">
        <select class="form-control" name="id_unit" required>
          <option value="">Pilih Unit</option>
          <?php if (isset($unit)) {
            foreach ($unit as $row) { ?>
          <option value="<?php echo $row->id_unit ?>"><?php echo $row->nama_unit ?></option>
          <?php }
          } ?>
        </select>
      </div>
    </div>
             <div class="form-group row">
      <label class="control-label col-sm-3" for="namo">Jabatan:</label>
      <div class="col-sm-5">
      <input type="radio" name="jabatan" value="Pimpinan" > Pimpinan </input>
        <input type="radio" name="jabatan" value="Karyawan" > Karyawan </input>
        
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