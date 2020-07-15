<!-- load library jquery dan highcharts -->
<?php $this->load->view('pimpinan/header.php')?>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<!-- end load library -->
 
<?php
foreach ($data as $data) {
    $status[] = $data->status;
    $undangan[] = $data->total;
}
?>
<div class="chart-container" style="position: relative; height:20vh; width:60vw">
    <canvas id="myChart"></canvas>
</div>
<script src="<?php echo base_url() ?>assets/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        data: {
            labels:<?php echo json_encode($status) ?>,
            datasets: [{
                    label: "Grafik Timeline",
                    backgroundColor: 'rgb(0, 177, 228)',
                    borderColor: 'rgb(0, 177, 228   )',
                    data:<?php echo json_encode($undangan) ?>,
                }]

        },
        options: {
            layout: {
                padding: {
                    left: 150,
                    right: 150,
                    top: 0,
                    bottom: 0
                }
            }


        }

        // Configuration options go here
    });

</script>
    </section>

    
  </div>

  <!-- /.content-wrapper -->

 <?php $this->load->view('pimpinan/footer.php')?>