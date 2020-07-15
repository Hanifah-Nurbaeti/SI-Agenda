<?php $this->load->view('pimpinan/header.php'); ?>

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
    <section class="content container-fluid">
        <div class="widget-content nopadding">
          <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/pimpinan/undangan/insert">
             <input type="hidden" name="id_undangan" value="<?php echo @$detail->id_undangan?>">
 <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nomor Undangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nomor_undangan" value="<?php if (@$detail){ echo @$detail->nomor_undangan;} else { echo set_value('nomor_undangan');}?>" readonly>
                </div>
              </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Pembahasan</label>
                <div class="col-sm-5" >
                  <textarea type="text" class="form-control" name="pembahasan"  value="<?php if (@$detail){ echo @$detail->pembahasan;} else { echo set_value('pembahasan');}?>" > </textarea>
                </div>
              </div>
            
            <div class="control-group">
              <label class="control-label"></label>
              <div class="controls">
                <input type="submit" class="btn btn-success" value="Simpan">
              </div>
              
            </div>
          </form>
          <br>
        </div>
      </section>
      </div>
    </div>

<?php $this->load->view('pimpinan/footer.php'); ?>