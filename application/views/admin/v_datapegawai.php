<?php $this->load->view('admin/header.php');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Data Pegawai 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pribadi</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pribadi</h3>
            </div>
            
            <div class="box-body no-padding">
              <?php $update = $this->session->flashdata('update');?>
                          <?php if (@$update):?>
                          <div class="alert alert-success">
                            <center><strong>Berhasil </strong>Data telah disimpan!</center>
                          </div>
                          <?php endif?>
              <table class="table">
                <tr>
                  
                  <td>NIPP </td>
                  <td>:</td>
                  <td> <?= $user->nipp; ?>
                    
                  </td>
                </tr>

                <tr>
                  <td>Nama Pegawai </td>
                  <td>:</td>
                  <td> <?= $user->nama_pegawai;?> </td>
                </tr>

                <!--<tr>
                  <td>Jabatan </td>
                  <td>:</td>
                  <td> <?= $user->level;?> </td>
                </tr-->
                <tr>
                  <td>Alamat Email </td>
                  <td>:</td>
                  <td> <?= $user->alamat_email;?> </td>
                </tr>
                <tr>
                  <td>Telepon </td>
                  <td>:</td>
                  <td> <?= $user->nomor_telepon;?> </td>
                </tr>
                <tr>
                  <td>Username </td>
                  <td>:</td>
                  <td> <?= $user->username;?> </td>
                </tr>
                
                <tr>
                  <td>Unit </td>
                  <td>:</td>
                  <td> <?= $user->nama_unit;?> </td>
                </tr>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         <div class="col-md-3">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            
            <div class="box-body no-padding">
              <div class="box-body box-profile">

                 
               <a href="<?php echo site_url("admin/pegawai/edit/{$user->username}") ?>" class="btn btn-success btn-block"><b>Edit Data Pribadi</b></a>
             

              
            </div>

            </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <?php $this->load->view('admin/footer.php');?>