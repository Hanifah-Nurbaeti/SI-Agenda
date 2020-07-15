<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img alt="Foto" class="img-circle" <?php echo "<img src='".base_url("Asset_user/images/".$user->gambar)."'>";  ?>
        
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <br>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="">
          <a href="<?php echo site_url(); ?>/karyawan/sekul">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
          
        <li class="">
          <a href="<?php echo site_url(); ?>/karyawan/pegawai">
            <i class="fa fa-newspaper-o"></i>
            <span>Lihat Data</span>
          </a>
          
        </li>
          
       <li> <a href="<?php echo site_url();?>/user/kelolalamaran"><i class="fa fa-upload"></i> <span>Status Lamaran</span></a> </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Data Personal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url(); ?>/user/keloladatapribadi"><i class="fa fa-circle-o"></i> Data Pribadi</a></li>
            <li><a href="<?php echo site_url(); ?>/user/kelolakeluarga"><i class="fa fa-circle-o"></i> Data Keluarga</a></li>

          
               <li class="treeview">
                <a href="#">
                  <i class="fa fa-circle-o"></i>
                  <span>Data Pendidikan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo site_url(); ?>/user/pendidikanformal"><i class="fa fa-circle-o"></i>Pendidikan Formal</a></li>                
                  <li><a href="<?php echo site_url(); ?>/user/pendidikantambahan"><i class="fa fa-circle-o"></i>Pendidikan Tambahan</a></li>
                </ul>
               </li>

            
            
           
      
      <li class="treeview">
                <a href="#">
                  <i class="fa fa-circle-o"></i>
                  <span>Data Keterampilan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo site_url(); ?>/user/penguasaanbahasa"><i class="fa fa-circle-o"></i> Bahasa</a></li>                
                  <li><a href="<?php echo site_url(); ?>/user/penguasaankomputer"><i class="fa fa-circle-o"></i> Komputer</a></li>
                  <li><a href="<?php echo site_url(); ?>/user/hobby"><i class="fa fa-circle-o"></i> Hobby & Lainnya</a></li>
                </ul>
               </li>
      <li><a href="<?php echo site_url(); ?>/user/kelolapengalaman"><i class="fa fa-circle-o"></i> Pengalaman Kerja</a></li>
      <li><a href="<?php echo site_url(); ?>/user/kelolapernyataan"><i class="fa fa-circle-o"></i> Pernyataan</a></li>
      
      
      </ul>
        </li>
        
        <li><a href="<?php echo site_url(); ?>/ogin/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
    <!-- /.sidebar -->
  </aside>