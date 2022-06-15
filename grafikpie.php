<?php
include('conn2.php'); //file untuk koneksi database dengan php

//query mengambil data dari tabel covid
$produk = mysqli_query($conn,"select * from covid"); 
while($row = mysqli_fetch_array($produk)){
    //mendeklarasikan variabel untuk fungsi
	$negara[] = $row['country'];
	//query mengambil daya new_cases dari tabel covid
	$query = mysqli_query($conn,"select new_cases FROM covid WHERE country='".$row['country']."'");
	$row = $query->fetch_array();
    //mendeklarasikan variabel untuk fungsi
	$kasus_baru[] = $row['new_cases'];
}

$produk = mysqli_query($conn,"select * from covid");
while($row = mysqli_fetch_array($produk)){
    //query mengambil data total_death dari tabel covid
    $query = mysqli_query($conn,"select total_deaths FROM covid WHERE country='".$row['country']."'");
    $row = $query->fetch_array();
    //mendeklarasikan variabel untuk function
    $jumlah_kematian[] = $row['total_deaths'];
}

$produk = mysqli_query($conn,"select * from covid");
while($row = mysqli_fetch_array($produk)){
    //query mengambil data total_death dari tabel covid
    $query = mysqli_query($conn,"select new_deaths FROM covid WHERE country='".$row['country']."'");
    $row = $query->fetch_array();
    //mendeklarasikan variabel untuk function
    $kematian_baru[] = $row['new_deaths'];
}

$produk = mysqli_query($conn,"select * from covid");
while($row = mysqli_fetch_array($produk)){
    //query mengambil data total_death dari tabel covid
    $query = mysqli_query($conn,"select total_recovered FROM covid WHERE country='".$row['country']."'");
    $row = $query->fetch_array();
    //mendeklarasikan variabel untuk function
    $jumlah_sembuh[] = $row['total_recovered'];
}

$produk = mysqli_query($conn,"select * from covid");
while($row = mysqli_fetch_array($produk)){
    //query mengambil data total_death dari tabel covid
    $query = mysqli_query($conn,"select new_recovered FROM covid WHERE country='".$row['country']."'");
    $row = $query->fetch_array();
    //mendeklarasikan variabel untuk function
    $kesembuhan_baru[] = $row['new_recovered'];
}

?>
<!DOCTYPE HTML>
<html>

<head>
	<title> Pie Chart Kasus Covid </title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<h1> New Cases </h1>
		<canvas id="chart-area1"></canvas>
		<h1> Total Deaths </h1>
		<canvas id="chart-area2"></canvas>
		<h1> New Deaths </h1>
		<canvas id="chart-area3"></canvas>
		<h1> Total Recovered </h1>
		<canvas id="chart-area4"></canvas>
		<h1> New Recovered </h1>
		<canvas id="chart-area5"></canvas>
	</div>
	<script>

        //konfigurasi untuk chart kasus baru
		var config1 = {
            //membuat chart dengan tipe pie
			type: 'pie',
            //mengidentifikasi data
			data: {
				datasets: [{
                    //data kasus baru
					data:<?php echo json_encode($kasus_baru); ?>,
                    //memberikan warna grafik
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
                    //memberikan label atau judul 
					label: 'Kasus Baru COVID'
				}],
				labels: <?php echo json_encode($negara); ?>},
			options: {
				responsive: true
			}
		};

        //konfigurasi untuk chart jumlah kematian
		var config2 = {
            //membuat chart dengan tipe pie
			type: 'pie',
            //mengidentifikasi data
			data: {
				datasets: [{
                    //data jumlah kematian
					data:<?php echo json_encode($jumlah_kematian); ?>,
                    //memberikan warna grafik
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
                    //memberikan label atau judul 
					label: 'Jumlah Kematian COVID'
				}],
				labels: <?php echo json_encode($negara); ?>},
			options: {
				responsive: true
			}
		};

        //konfigurasi untuk chart kematian baru
		var config3 = {
            //membuat chart dengan tipe pie
			type: 'pie',
            //mengidentifikasi data
			data: {
				datasets: [{
                    //data kematian baru
					data:<?php echo json_encode($kematian_baru); ?>,
                    //memberikan warna grafik
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
                    //memberikan label atau judul 
					label: 'Kematian Baru COVID'
				}],
				labels: <?php echo json_encode($negara); ?>},
			options: {
				responsive: true
			}
		};

        //konfigurasi untuk chart jumlah kesembuhan
		var config4 = {
            //membuat chart dengan tipe pie
			type: 'pie',
            //mengidentifikasi data
			data: {
				datasets: [{
                    //data jumlah kesembuhan
					data:<?php echo json_encode($jumlah_sembuh); ?>,
                    //memberikan warna grafik
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
                    //memberikan label atau judul 
					label: 'Jumlah pasien sembuh'
				}],
				labels: <?php echo json_encode($negara); ?>},
			options: {
				responsive: true
			}
		};

        //konfigurasi untuk chart kesembuhan terbaru
		var config5 = {
            //membuat chart dengan tipe pie
			type: 'pie',
            //mengidentifikasi data
			data: {
				datasets: [{
                    //data kesembuhan terbaru
					data:<?php echo json_encode($kesembuhan_baru); ?>,
                    //memberikan warna grafik
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(0, 255, 254, 0.2)',
					'rgba(115, 255, 216, 0.2)',
					'rgba(210, 105, 30, 0.2)',
					'rgba(128, 0, 128, 0.2)',
					'rgba(0, 0, 205, 0.2)',
					'rgba(40, 178, 170, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(0, 255, 254, 1)',
					'rgba(115, 255, 216, 1)',
					'rgba(210, 105, 30, 1)',
					'rgba(128, 0, 128, 1)',
					'rgba(0, 0, 205, 1)',
					'rgba(40, 178, 170, 1)'
					],
                    //memberikan label atau judul 
					label: 'Jumlah pasies sembuh terbaru'
				}],
				labels: <?php echo json_encode($negara); ?>},
			options: {
				responsive: true
			}
		};
		
        //fungsi memuat halaman
		window.onload = function() {
            //memanggil variabel-variabel fungsi yang akan dijalankan
			var ctx1 = document.getElementById('chart-area1').getContext('2d');
			var ctx2 = document.getElementById('chart-area2').getContext('2d');
			var ctx3 = document.getElementById('chart-area3').getContext('2d');
			var ctx4 = document.getElementById('chart-area4').getContext('2d');
			var ctx5 = document.getElementById('chart-area5').getContext('2d');
			window.myPie1 = new Chart(ctx1, config1);
			window.myPie2 = new Chart(ctx2, config2);
			window.myPie3 = new Chart(ctx3, config3);
			window.myPie4= new Chart(ctx4, config4);
			window.myPie5 = new Chart(ctx5, config5);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie1.update();
			window.myPie2.update();
			window.myPie3.update();
			window.myPie4.update();
			window.myPie5.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie1.update();
			window.myPie2.update();
			window.myPie3.update();
			window.myPie4.update();
			window.myPie5.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie1.update();
			window.myPie2.update();
			window.myPie3.update();
			window.myPie4.update();
			window.myPie5.update();

		});
	</script>
</body>
</html>