<?php 
include ('conn.php'); 
	$produk = mysqli_query($conn,"select * from tb_barang"); 
	while ($row = mysqli_fetch_array($produk) ) {
		$nama_produk[] = $row['barang']; 

		$query = mysqli_query($conn,"select sum(jumlah) as jumlah from tb_penjualan where id_barang='". $row['id_barang']."'"); 
		$row = $query->fetch_array(); 
		$jumlah_produk[] = $row['jumlah']; 
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
				labels: <?php echo json_encode($nama_produk); ?>, 
				datasets: [{
					label: 'Grafik Penjualan', 
					data: <?php echo json_encode($jumlah_produk);?>,

					backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
					borderWidth: 1 
				}]
			}, 
			options: { 
				scales: {
					YAxes: [{
						ticks : { 
							beginAtZero: true
						}
					}]
				}
			} 
		});
	</script>
</body> 
</html>