<?php $this->load->view('pimpinan/header.php');?>


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
            
            <form class="form-horizontal" action="<?php echo site_url('pimpinan/pegawai/update') ;?>" method="post">
              

              <?php if (!empty($data)): ?>
              <?php echo form_input(['name'=>'id_pribadi',
                                    'class'=>'form-control',
                                     'type'=>'hidden',
                                    'value'=>set_value('id_pribadi', $data->id_pribadi)]); ?>
                                    <?php else: ?>

              <?php echo form_input(['name'=>'id_pribadi',
                                     'class'=>'form-control',
                                     'type'=>'hidden',
                                     'value'=>set_value('id_pribadi')]); ?>
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
                  <label for="inputPassword3" class="col-sm-2 control-label">Nama Pegawai</label>

                   <div class="col-sm-10">
                    <?php if (!empty($data)): ?>
                    <?php echo form_input(['name'=>'nama_pegawai',
                                          'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Nama Panggilan',
                                          'value'=>set_value('nama_pegawai', $data->nama_pegawai)]); ?>
                                          <?php else: ?>

                    <?php echo form_input(['name'=>'nama_pegawai',
                                           'class'=>'form-control',
                                           'type'=>'text',
                                           'placeholder'=>'Nama Panggilan',
                                           'value'=>set_value('nama_pegawai')]); ?>
                                           <?php endif ?>
                  </div>
                </div>
                

               

                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url(); ?>/pimpinan/sekul" class="btn btn-danger" value="batal">Batal</a>
                <input type="submit" class="btn btn-info pull-right" value="Simpan">
              </div>
              <!-- /.box-footer -->
              <?php echo form_close() ;?>
            </form>
          </div>
      </div>
  </section>
</div>

<?php $this->load->view('pimpinan/footer.php');?>