<?php 
session_start();
require 'koneksi.php';

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Review</title>
    <link href="styleReview.css" rel="stylesheet" type="text/css" />
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
      <span class="p-statistik"><p>Statistik</p></span></a>
      <a href="review.php"><img class="icon5" src="icon/Group63.png" alt="">
      <span class="p-review"><p style="font-weight: bold">Review</p></span></a>
    </div>
    
    <a href="buatTugas.php">
      <div class="kotak-buat-tugas">
        <span class="p-buat-tugas"><p>Buat Tugas</p></span>
      </div>
    </a>    
  </div>

  <span class="judul-konten"><p>Review</p></span>

  <div class="konten">

  </div>

    

</body>
</html>