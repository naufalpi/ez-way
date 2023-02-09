<?php 
session_start();
require 'koneksi.php';

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}
$id = $_SESSION['id'];
$kategori = mysqli_query($conn, "SELECT * FROM tugas WHERE id_tutor='$id'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Statistik</title>
    <script type="text/javascript" src="js/chart.js"></script>
    <link href="styleStatistik.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">   
</head>
<body>
   <nav class="navbar fixed-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">        
          </div>
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')">Keluar</a>
              </li>              
            </ul>
        </div>
      </nav>

  <div class="kotak-kuning">

    <div>
      <img src="icon/Group27.png" class="side-user" alt="">
      <span class="side-name"><p><?php echo $_SESSION["nama"]; ?></p></span>
    </div>

    <div>
      <a href="profile.php"><img class="icon1" src="icon/Group67.png" alt="">
      <span class="p-profil"><p>Profil</p></span></a>
      <a href="tugas.php"><img class="icon2" src="icon/Group66.png" alt="">
      <span class="p-tugas"><p>Tugas</p></span></a>
      <a href="riwayat.php"><img class="icon3" src="icon/Group65.png" alt="">
      <span class="p-riwayat"><p>Riwayat</p></span></a>
      <a href="statistik.php"><img class="icon4" src="icon/Group64.png" alt="">
      <span class="p-statistik"><p style="font-weight: bold">Statistik</p></span></a>
      <!-- <a href="review.php"><img class="icon5" src="icon/Group63.png" alt="">
      <span class="p-review"><p>Review</p></span></a> -->
    </div>
    
    <a href="buatTugas.php">
      <div class="kotak-buat-tugas">
        <span class="p-buat-tugas"><p>Buat Tugas</p></span>
      </div>
    </a>    
  </div>

  <span class="judul-konten"><p>Statistik</p></span>

  <div style="position:absolute; top:250px; left:550px; width:600px; height:600px;">
    <canvas id="linechart" ></canvas>
  </div>

  <div style="position:absolute; top:250px; left:1200px; width:600px; height:600px;">
    <canvas id="barchart" ></canvas>
  </div>
  
  <div style="position:absolute; top:600px; left:980px; width:400px; height:400px;">
    <canvas id="doughnutchart" ></canvas>
  </div>
</body>
</html>

<script type="text/javascript">
//doughnut chart
  var ctx = document.getElementById("doughnutchart").getContext("2d");
  var data = {
    labels: ["SD", "SMP", "SMA", "S1"],
    datasets: [
      {
        label: "Kategori",
        data: [
          <?php 
					$jumlah_sd = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND kategori='SD'");
					echo mysqli_num_rows($jumlah_sd);
					?>, 
					<?php 
					$jumlah_smp = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND kategori='SMP'");
					echo mysqli_num_rows($jumlah_smp);
					?>, 
					<?php 
					$jumlah_sma = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND kategori='SMA'");
					echo mysqli_num_rows($jumlah_sma);
					?>, 
					<?php 
					$jumlah_s1 = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND kategori='S1'");
					echo mysqli_num_rows($jumlah_s1);
					?>
        ],
        backgroundColor: [
			'rgba(255, 99, 132, 0.5)',
			'rgba(54, 162, 235, 0.5)',
			'rgba(255, 206, 86, 0.5)',
			'rgba(75, 192, 192, 0.5)'
        ]
      }
    ]
  };

  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: {
      responsive: true
    }
  });

// barchart
  Chart.defaults.font.size = 15;
  var ctxx = document.getElementById("barchart").getContext("2d");
  var myChart = new Chart(ctxx, {
			type: 'bar',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Jumlah tugas yang dikerjakan',
					data: [
					<?php 
					$tugas_perjanuari = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-01-%' ");
					echo mysqli_num_rows($tugas_perjanuari);
					?>, 
					<?php 
					$tugas_perfebruari = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-02-%' ");
					echo mysqli_num_rows($tugas_perfebruari);
					?>, 
					<?php 
					$tugas_permaret = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-03-%' ");
					echo mysqli_num_rows($tugas_permaret);
					?>, 
					<?php 
					$tugas_perapril = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-04-%' ");
					echo mysqli_num_rows($tugas_perapril);
					?>,
         		 	<?php 
					$tugas_permei = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-05-%' ");
					echo mysqli_num_rows($tugas_permei);
					?>,
          			<?php 
					$tugas_perjuni = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-06-%' ");
					echo mysqli_num_rows($tugas_perjuni);
					?>,
          			<?php 
					$tugas_perjuli = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-07-%' ");
					echo mysqli_num_rows($tugas_perjuli);
					?>,
          			<?php 
					$tugas_peragustus = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-08-%' ");
					echo mysqli_num_rows($tugas_peragustus);
					?>,
					<?php 
					$tugas_perseptember = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-09-%' ");
					echo mysqli_num_rows($tugas_perseptember);
					?>,
					<?php 
					$tugas_peroktober = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-10-%' ");
					echo mysqli_num_rows($tugas_peroktober);
					?>,
					<?php 
					$tugas_pernovember = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-11-%' ");
					echo mysqli_num_rows($tugas_pernovember);
					?>,
					<?php 
					$tugas_perdesember = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-12-%' ");
					echo mysqli_num_rows($tugas_perdesember);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

</script>

<script type="text/javascript">
//line chart
var ctxxx = document.getElementById("linechart").getContext("2d");
var myChart = new Chart(ctxxx, {
			type: 'line',
			data: {
				labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
				datasets: [{
					label: 'Pendapatan',
					data: [
					<?php
					$a = 0;
					$sql = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-01-%' ");
					
					while($data = mysqli_fetch_array($sql))
					{
					$a++;
					$total[$a] = $data['harga'];
					}
					echo array_sum($total);
					?>, 
					<?php 
					$b = 0;
					$pndptn_02 = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-02-%' ");
					
					while($dt = mysqli_fetch_array($pndptn_02))
					{
					$b++;
					$ttl[$b] = $dt['harga'];
					}
					echo array_sum($ttl);
					?>, 
					<?php 
					$c = 0;
					$pndptn_03 = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-03-%' ");
					
					while($dta = mysqli_fetch_array($pndptn_03))
					{
					$c++;
					$totl[$c] = $dta['harga'];
					}
					echo array_sum($totl);
					?>, 
					<?php 
					$d = 0;
					$pndptn_04 = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-04-%' ");
					
					while($dat = mysqli_fetch_array($pndptn_04))
					{
					$d++;
					$ttal[$d] = $dat['harga'];
					}
					echo array_sum($ttal);
					?>,
          			<?php 
					$f = 0;
					$pndptn_05 = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-05-%' ");
					
					while($dtt = mysqli_fetch_array($pndptn_05))
					{
					$f++;
					$ttll[$f] = $dtt['harga'];
					}
					echo array_sum($ttll);
					?>,
         			<?php 
					$g = 0;
					$pndptn_06 = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-06-%' ");
					
					while($dataa = mysqli_fetch_array($pndptn_06))
					{
					$g++;
					$totall[$g] = $dataa['harga'];
					}
					echo array_sum($totall);
					?>,
          			<?php 
					$h = 0;
					$pndptn_07 = mysqli_query($conn,"SELECT * FROM tugas WHERE id_tutor='$id' AND tanggal LIKE '%-07-%' ");
					
					while($dataaa = mysqli_fetch_array($pndptn_07))
					{
					$h++;
					$totalll[$h] = $dataaa['harga'];
					}
					echo array_sum($totalll);
					
					?>,
					null,
					null,
					null,
					null,
					null
					],
					fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
				}]
			},
			options: {
				data: data,
			}
		});
</script>