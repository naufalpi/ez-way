<?php 

session_start();

if(isset($_SESSION["login"])){
    header("Location: profile.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Ez Way</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-light" style="background: #FFE268;">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">        
          </div>
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="registrasi.php">Daftar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="login.php">Login</a>
              </li>              
            </ul>
        </div>
      </nav>
    <style>
       body img{
        position: absolute;
        width: 458px;
        height: 117px;
        left: 720px;
        top: 870px;
      }

      .kenapa{
        position: absolute;
        width: 242px;
        height: 38px;
        left: 830px;
        top: 775px;
      
        font-family: Lato;
        font-style: normal;
        font-weight: bold;
        font-size: 32px;
        line-height: 38px;
      }
    </style>
  </head>
  <body>
  <div class="kotak-kuning">
        <img src="img/Group58.png" alt="...">
        <p class="ezway">EZ WAY</p>
        <p class="deskripsi">Memiliki tutor yang siap membantu sehingga membuat tugas menjadi mudah</p>
        <a href="login.php" style="color: inherit;">
          <div class="buat">
            <span class="isi">
            <p>Buat Tugas</p>
            </span>
          </div>
        </a>
      </div>  
    
    <span class="kenapa">      
      <p><br>   Kenapa Ez Way ?</p>
    </span>
    
    <img src="img/Group9.png" alt="">
        

    <script src="script.js"></script>
  </body>
</html>