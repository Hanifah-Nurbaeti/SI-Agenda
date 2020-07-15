
<script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/highcharts.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<?php $this->load->view('pimpinan/header.php') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
                <div id="show_form">
<div class="col-md-12 grid-margin stretch-card">
	 <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12"> 
              <div class="card">
                <div class="card-body">

                  <h1 class="">Grafik Data Kehadiran</h1><br>
                  <h3 class=""><span class="mdi mdi-chart-bar">Grafik</span></h3><br>

					<?php
					foreach ($data as $data) {
					    $status[] = $data->status;
					    $undangan[] = $data->total;
					}
					?>

                  <div class="chart-container" style="">
					    <canvas id="myChart"></canvas>
					</div>

					<script>
					    var ctx = document.getElementById('myChart').getContext('2d');
					    var chart = new Chart(ctx, {
					        // The type of chart we want to create
					        type: 'bar',
					        data: {
					            labels:<?php echo json_encode($status) ?>,
					            datasets: [{
					                    label: "Grafik Data Lamaran",
					                    backgroundColor: 'rgb(0, 177, 228)',
					                    borderColor: 'rgb(0, 177, 228	)',
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

              </div>
          </div>
      </div>
      </div>
      </section>

<?php $this->load->view('pimpinan/footer.php') ?>
