<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $judul?></title>
</head>
<body>
<?php
foreach ($data_kota as $key => $value){
	$nama_kegiatan[] = $value['nama_kegiatan'];
	$jumlah_anggaran[] = $value['jumlah_anggaran'];
}

echo json_encode( $nama_kegiatan);
?>


<div id="container"></div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	// Build the chart
	Highcharts.chart('container', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: 'Perbandingan Penduduk Antar Kota'
	    },
	    tooltip: {
	        // pointFormat: '{series.name}: <b>{point.y}</b>'
	        pointFormat: '<b>{point.name}</b>: {point.percentage:.1f} %'
	    },
	    accessibility: {
	        point: {
	            valueSuffix: '%'
	        }
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: false
	            },
	            showInLegend: true
	        }
	    },
	    series: [{
	        name: 'Penduduk',
	        colorByPoint: true,

	        //format data penduduk kota
	        data: [
	        		<?php foreach($data_kota as $kota):?>
	        		{
	        			name: '<?php echo $kota['nama_kegiatan']?>',
	        			y: <?php echo $kota['jumlah_anggaran'];?>},
			        <?php endforeach?>
			   	]

	        //format data original
	        /*
	        data: [
	        		{
			            name: 'Chrome',
			            y: 61.41
			        }, 
			        {
			            name: 'Internet Explorer',
			            y: 11.84
			        }, 
			        {
			            name: 'Firefox',
			            y: 10.85
			        },
			   	]
			*/
	    }]
	});
</script>

</body>
</html>