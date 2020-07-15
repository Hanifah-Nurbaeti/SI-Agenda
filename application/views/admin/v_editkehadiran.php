<?php $this->load->view('admin/header.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfirmasi Kehadiran
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content container-fluid">
        <div class="widget-content nopadding">
          <form role="form" class="form-horizontal form-groups-bordered" method="post" action="<?php echo site_url()?>/admin/undangan/update">
             <input type="hidden" name="id_undangan" value="<?php echo @$detail->id_undangan?>">
 <div class="control-group">
                <label for="field-1" class=" control-label">Nomor Undangan</label>
                <div class="controls">
                  <input type="text" class="form-control" name="nomor_undangan" value="<?php if (@$detail){ echo @$detail->nomor_undangan;} else { echo set_value('nomor_undangan');}?>" readonly>
                </div>
              </div>
            <div class="control-group">
              <label class="control-label">Status </label>
              <div class="controls">
                <select name="status" class="form-control">
                  <option>Pilih Status</option>
                    <option value="Hadir Seluruhnya">Hadir Seluruhnya</option>
                    <option value="Hadir Sebagian">Hadir Sebagian</option>
                    <option value="Dibatalkan">Dibatalkan</option>
                </select>
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

<?php $this->load->view('admin/footer.php'); ?>