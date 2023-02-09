<?php 
session_start();
require 'koneksi.php';

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}
$id = $_SESSION['id'];
$sql = mysqli_query($conn, "SELECT * FROM tugas INNER JOIN user ON tugas.id_user = user.id WHERE tugas.status='DONE' AND tugas.id_tutor='$id' ORDER BY tanggal DESC ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Riwayat</title>
    <link href="styleRiwayat.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <style>
      h1{
    font-family: sans-serif;
    }
    
    table {
      font-family: Arial, Helvetica, sans-serif;
      color: #000000;
      background: #eaebec;
      border: #000000 1px solid;
    }
    
    table th {
      padding: 10px 80px;
      border-left:1px solid #000000;
      border-bottom: 1px solid #000000;
      background: #FFE268;
    }
    
    table th:first-child{  
      border-left:none;  
    }
    
    table tr {
      text-align: center;
      padding-left: 20px;
    }
    
    table td:first-child {
      text-align: center;
      padding-left: 20px;
      border-left: 0;
    }
    
    table td {
      padding: 15px 35px;
      border-top: 1px solid #000000;
      border-bottom: 1px solid #000000;
      border-left: 1px solid #000000;
      background: #fafafa;
      background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
      background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
    }
    
    table tr:last-child td {
      border-bottom: 0;
    }
    
    table tr:last-child td:first-child {
      -moz-border-radius-bottomleft: 3px;
      -webkit-border-bottom-left-radius: 3px;
      border-bottom-left-radius: 3px;
    }
    
    table tr:last-child td:last-child {
      -moz-border-radius-bottomright: 3px;
      -webkit-border-bottom-right-radius: 3px;
      border-bottom-right-radius: 3px;
    }
    
    table tr:hover td {
      background: #f2f2f2;
      background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
      background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
    }
    </style>
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
      <span class="p-riwayat"><p style="font-weight: bold">Riwayat</p></span></a>
      <a href="statistik.php"><img class="icon4" src="icon/Group64.png" alt="">
      <span class="p-statistik"><p>Statistik</p></span></a>
      <!-- <a href="review.php"><img class="icon5" src="icon/Group63.png" alt="">
      <span class="p-review"><p>Review</p></span></a> -->
    </div>
    
    <a href="buatTugas.php">
      <div class="kotak-buat-tugas">
        <span class="p-buat-tugas"><p>Buat Tugas</p></span>
      </div>
    </a>    
  </div>

  <span class="judul-konten"><p>Riwayat</p></span>

  <div class="konten">
    <table cellspacing='0'>
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Judul Tugas</th>
          <th>Kategori</th>
          <th>Pembuat Tugas</th>
          <th>Harga</th>
        </tr>
      </thead>
      <?php 
      while($data = mysqli_fetch_array($sql)) {
      ?>
      <tbody>
        <tr>
          <td><?php echo $data['tanggal'] ?></td>
          <td><?php echo $data['judul_tugas'] ?></td>
          <td><?php echo $data['kategori'] ?></td>
          <td><?php echo $data['nama'] ?></td>
          <td><?php echo $data['harga'] ?></td>
        </tr>
        <?php 
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>