<?php 
include ('conn.php'); 
	$produk = mysqli_query($conn,"select * from covid"); 
	while ($row = mysqli_fetch_array($produk) ) {
		$negara[] = $row['country']; 

		$query = mysqli_query($conn,"select total from covid where country='". $row['country']."' order by total"); 
		$row = $query->fetch_array(); 
		$jumlahkasus[] = $row['total']; 
	}

	$produk = mysqli_query($conn,"select * from covid"); 
	while ($row = mysqli_fetch_array($produk) ) {
		$query = mysqli_query($conn,"select total from covid where country='". $row['country']."' order by total"); 
		$row = $query->fetch_array(); 
		$jumlahkasus[] = $row['total']; 
	}
?> 

<!DOCTYPE html> 
<html> 
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head> 
<body>
	<div style="width: 800px; height: 800px">
		<canvas id="myChart"></canvas>
	</div> 

	<script> 
		var ctx = document.getElementById("myChart").getContext('2d'); 
		var myChart = new Chart (ctx, { 
			type: 'bar', 
			data: { 
				labels: <?php echo json_encode($negara); ?>, 
				datasets1: [{
					label: 'Kasus Covid', 
					data: <?php echo json_encode($jumlahkasus);?>,

					backgroundcolor: 'rgba(255, 99, 132, 0.2)', 
					bordercolor: 'rgba(255, 99, 132, 1)', 
					borderWidth: 1 
				}]
			}, 
			options: { 
				scales: {
					YAxes: [{
						ticks : { 
							beginAtZero:true 
						}
					}]
				}
			} 
		});
	</script>
</body> 
</html>