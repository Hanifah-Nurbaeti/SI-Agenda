<?php $this->load->view('admin/header.php')?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

  <section class="content container-fluid">
    <div class="box">
    <?php echo validation_errors (); ?>
  <form class="form-horizontal" role="form" method="post" action="<?php echo site_url()?>/admin/user/add">
    <input type="show" name="id_user" value="<?php echo @$detail->id_user?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="noken">Nama User:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_user" value="<?php if (@$detail){ echo @$detail->nama_user;} else { echo set_value('nama_user');} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nomes">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" value="<?php if (@$detail){ echo @$detail->username;} else { echo set_value('username');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="namo">Password:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="password" value="<?php if (@$detail){ echo @$detail->password;} else { echo set_value('password');}?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="thn">Pegawai:</label>
      <div class="col-sm-10">
        <select class="form-control" name="id_pegawai" required>
          <option value="">Pilih Pegawai</option>
          <?php if (isset($pegawai)) {
            foreach ($pegawai as $row) { ?>
          <option value="<?php echo $row->id_pegawai ?>"><?php echo $row->nama_pegawai ?></option>
          <?php }
          } ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-sm-2" for="namo">Level:</label>
      <div class="col-sm-10">
      
        <input type="radio" name="level" value="Karyawan" > Karyawan </input>
        <input type="radio" name="level" value="Pimpinan" > Pimpinan </input>
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
  </section>
</div>
 <?php $this->load->view('admin/footer.php')?>