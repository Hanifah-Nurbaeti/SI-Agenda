<?php $this->load->view('karyawan/header.php'); ?>

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
<section class="content">
      <div class="row">

     <div class="box box-info">
            
            <form class="form-horizontal" action="<?php echo site_url('karyawan/hasil/upload') ;?>" method="post" enctype="multipart/form-data">
              

              <input type="hidden" name="id_undangan" value="<?= $undangan->id_undangan ?>">

              

                
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Hasil Rapat</label>

                  <div class="col-sm-10">
                    <?php echo form_input(['name'=>'gambar',
                                          'class'=>'form-control',
                                            'placeholder'=>'',
                                           'class'=>'form-control',
                                           'type'=>'file']);?>
                  </div>
                </div>

                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url(); ?>/karyawan/hasil/" class="btn btn-danger" value="batal">Batal</a>
                <input type="submit" class="btn btn-info pull-right" value="simpan">
              </div>
              <!-- /.box-footer -->
              <?php echo form_close() ;?>
            </form>
          </div>
      </div>
  </section>
      </div>
    </div>

<?php $this->load->view('karyawan/footer.php'); ?>