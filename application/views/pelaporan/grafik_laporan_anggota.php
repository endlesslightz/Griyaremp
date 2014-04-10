<?php $this->load->view('backend/tema/header');?>
				
</head>
<body>
<div id="container">
    <h1>
        Grafik Laporan Anggota
<!--        <span style="float:right">GMD</span>-->
    </h1>

    <div id="body">
        <div id="chart"></div>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<script type="text/javascript" src="<?php echo base_url('/assets/jquery-1.9.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/exporting.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('/assets/highcharts/dark-green.js'); ?>"></script>
<script type="text/javascript">
jQuery(function(){
    new Highcharts.Chart({
        chart: {
            renderTo: 'chart',
            type: 'column',
        },
        title: {
            text: 'Grafik',
            x: -20
        },
        subtitle: {
            text: 'Grafik Laporan Anggota',
            x: -20
        },
        xAxis: {
            categories: ['Standar']
        },
        yAxis: {
            title: {
                text: 'media'
            }
        },
        series: [{
            name: 'grafik',
            data: <?php echo json_encode($data); ?>
        }]
    });
});
</script>
</body>
</html>