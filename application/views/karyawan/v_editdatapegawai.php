<?php $this->load->view('karyawan/header.php');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Pribadi
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Pribadi</a></li>
        <li class="active">Edit Data Pribadi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Pribadi</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(isset($error)) {
            echo '<div class="alert alert-danger">';
            echo $error;
            echo '</div>';
             }
           ?>
            <form class="form-horizontal" action="<?php echo site_url('karyawan/pegawai/update') ;?>" method="post" enctype="multipart/form-data">
              

              <?php if (!empty($data)): ?>
              <?php echo form_input(['name'=>'id_pegawai',
                                    'class'=>'form-control',
                                     'type'=>'hidden',
                                    'value'=>set_value('id_pegawai', $data->id_pegawai)]); ?>
                                    <?php else: ?>

              <?php echo form_input(['name'=>'id_pegawai',
                                     'class'=>'form-control',
                                     'type'=>'hidden',
                                     'value'=>set_value('id_pegawai')]); ?>
                                     <?php endif ?>


              <?php if (!empty($data)): ?>
              <?php echo form_input(['name'=>'username',
                                    'class'=>'form-control',
                                     'type'=>'hidden',
                                    'value'=>set_value('username', $data->username)]); ?>
                                    <?php else: ?>

              <?php echo form_input(['name'=>'username',
                                     'class'=>'form-control',
                                     'type'=>'hidden',
                                     'value'=>set_value('username')]); ?>
                                     <?php endif ?>


              <?php if (!empty($data)): ?>
              <?php echo form_input(['name'=>'id_user',
                                    'class'=>'form-control',
                                     'type'=>'hidden',
                                    'value'=>set_value('id_user', $data->id_user)]); ?>
                                    <?php else: ?>

              <?php echo form_input(['name'=>'id_user',
                                     'class'=>'form-control',
                                     'type'=>'hidden',
                                     'value'=>set_value('id_user')]); ?>
                                     <?php endif ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Nama Pegawai</label>

                  <div class="col-sm-10">
                    <?php if (!empty($data)): ?>
                    <?php echo form_input(['name'=>'nama_pegawai',
                                          'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Nama Lengkap',
                                          'value'=>set_value('nama', $data->nama_pegawai)]); ?>
                                          <?php else: ?>

                    <?php echo form_input(['name'=>'nama_pegawai',
                                           'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Nama Pegawai',
                                           'value'=>set_value('nama_pegawai')]); ?>
                                           <?php endif ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Alamat Email</label>

                  <div class="col-sm-10">
                    <?php if (!empty($data)): ?>
                    <?php echo form_input(['name'=>'nama_pegawai',
                                          'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Alamat Email',
                                          'value'=>set_value('alamat_email', $data->alamat_email)]); ?>
                                          <?php else: ?>

                    <?php echo form_input(['name'=>'alamat_email',
                                           'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Alamat Email',
                                           'value'=>set_value('alamat_email')]); ?>
                                           <?php endif ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Telepon</label>

                  <div class="col-sm-10">
                    <?php if (!empty($data)): ?>
                    <?php echo form_input(['name'=>'nama_pegawai',
                                          'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Nomor Telepon',
                                          'value'=>set_value('nomor_telepon', $data->nomor_telepon)]); ?>
                                          <?php else: ?>

                    <?php echo form_input(['name'=>'nomor_telepon',
                                           'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Nomor Telepon',
                                           'value'=>set_value('nomor_telepon')]); ?>
                                           <?php endif ?>
                  </div>
                </div>
                <div class="form-group">
                  
                      <label  class="col-sm-2 control-label">Jabatan</label>

                        <div class="col-sm-10">
                          
                          <label class="">
                            <input type="radio"  name="jabatan" value="Pimpinan" checked>
                            Pimpinan
                          </label>
                          <br>
                           <label class="">
                            <input type="radio" name="jabatan" value="Karyawan" checked>
                            Karyawan
                          </label>
                       </div> 
                    
                </div>
              </div>
                
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url(); ?>/karyawan/pegawai" class="btn btn-danger" value="batal">Batal</a>
                <input type="submit" class="btn btn-info pull-right" value="Simpan">
              </div>
              <!-- /.box-footer -->
              <?php echo form_close() ;?>
            </form>
          </div>
      </div>
  </section>
</div>

<?php $this->load->view('karyawan/footer.php');?>