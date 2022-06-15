<?php 
include ('conn2.php'); //file koneksi database dengan php
    //query pengambilan data dari tabel covid
	$covid = mysqli_query($conn,"select * from covid"); 
	while ($row = mysqli_fetch_array($covid) ) {
		$nama_negara[] = $row['country']; 

        //qeury pengambilan data
		$query = mysqli_query($conn,"select new_cases, total_deaths, new_deaths, total_recovered, new_recovered from covid where country='". $row['country']."'"); 
		$row = $query->fetch_array(); 
        //mendefinisikan variable
		$kasusbaru[] = $row['new_cases']; 
		$totalkematian[] = $row['total_deaths'];  
		$kematianbaru[] = $row['new_deaths']; 
		$totalsembuh[] = $row['total_recovered']; 
		$sembuhbaru[] = $row['new_recovered']; 
	}
?>

<!DOCTYPE html> 
<html> 
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
</head> 
<body>
	<div style="center; width: 1000px; height: 800px">
		<canvas id="myChart"></canvas>
	</div>  

	<script> 
		var ctx1 = document.getElementById("myChart").getContext('2d'); 
		//membuat grafik
        var myChart = new Chart (ctx1, { 
            //tipe grafik
			type: 'line', 
            //data-data yang dicantumkan
			data: { 
                //data kasus baru
				labels: <?php echo json_encode($nama_negara); ?>, 
				datasets: [
				{
					label: 'New Cases', 
					data: <?php echo json_encode($kasusbaru);?>,
                    //warna garfik
					backgroundColor: 'RGB(224, 187, 228)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				},
				{
                    //data total kematian
					label: 'Total Deaths',
                    //mengambil data dengan memanggil variabel 
					data: <?php echo json_encode($totalkematian);?>,
                    //warna grafik
					backgroundColor: 'RGB(149, 125, 173)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				},
				{	
					//data kematian baru
                    label: 'New Deaths', 
                    //mengambil data dengan memanggil variabel
					data: <?php echo json_encode($kematianbaru);?>,
                    //warna grafik
					backgroundColor: 'RGB(210, 145, 188)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				},
				{
					//data total sembuh
                    label: 'Total Recovered', 
                    //mengambil data dengan memanggil variabel
					data: <?php echo json_encode($totalsembuh);?>,
                    //warna grafik
					backgroundColor: 'RGB(254, 200, 216)',
					borderColor: 'rgba(255,99,132,1)',
					borderWidth: 1
				},
				{
					//data sembuh terbaru
                    label: 'New Recovered', 
                    //mengambil data dengan memanggil variabel
					data: <?php echo json_encode($sembuhbaru);?>,
                    //warna grafik
					backgroundColor: 'RGB(255, 223, 211)',
					borderColor: 'rgba(255,99,132,1)',
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