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
    <title>Profil</title>
    <link href="styleProfile.css" rel="stylesheet" type="text/css" />
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
                <a class="nav-link active" href="logout.php" onClick="return confirm('Apakah Anda Ingin Keluar?')" >Keluar</a>
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
      <span class="p-profil"><p style="font-weight: bold">Profil</p></span></a>
      <a href="tugas.php"><img class="icon2" src="icon/Group66.png" alt="">
      <span class="p-tugas"><p>Tugas</p></span></a>
      <a href="riwayat.php"><img class="icon3" src="icon/Group65.png" alt="">
      <span class="p-riwayat"><p>Riwayat</p></span></a>
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

  <span class="judul-konten"><p>Profil</p></span>

  <div class="konten">
    <img src="icon/Group27.png" class="konten-profile" alt="">
    <div class="container">
      <form action="" method="POST"> 
          <div class="mb-3">
            <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" aria-describedby="Nama"
            value="<?php echo $_SESSION['nama'] ?>">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="Email"
            value="<?php echo $_SESSION['email'] ?>" >
          </div>
          <div class="mb-3">
            <label for="kata-sandi" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-3">
            <label for="ulangi-kata-sandi" class="form-label">Ulangi Kata Sandi</label>
            <input type="password" class="form-control" id="password2" name="password2">
          </div>
          <button type="submit" class="button" id="update" name="update">Simpan</button>
      </form>

      <?php 
      require 'koneksi.php';
      //cek apakah tombol simpan sudah ditekan atau belum
      if(isset($_POST["update"])) {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

        if(empty($nama) OR empty($email)) {
          echo "<script>
                    alert('masukan data!');
                  </script>";
        } else {
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<script>
                    alert('masukan email yang valid!');
                  </script>";
          } else {
            if(empty($password) AND empty($password2)) {

              // cek email sudah ada atau belum
              // $result= mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

              // if(mysqli_fetch_assoc($result)) {
              //     echo "<script>
              //             alert('email sudah terdaftar!');
              //           </script>";
              //     return false;
              // }

              $id = $_SESSION['id'];
              $sql = "UPDATE user SET nama='$nama', email='$email' WHERE id='$id' ";
              if(mysqli_query($conn, $sql)){
                $_SESSION['nama'] = $nama;
                $_SESSION['email'] = $email;
    
                echo "<script>
                        alert('data berhasil disimpan!');
                        document.location.href = 'profile.php';
                      </script>";
                //header("Location: profile.php");
              } else {
                echo "Error";
              }
            } else {
              // enkripsi password
              $password = password_hash($password, PASSWORD_DEFAULT);
              $id = $_SESSION['id'];
              $sql2 = "UPDATE user SET nama='$nama', email='$email', password='$password' 
              WHERE id='$id' ";
              if(mysqli_query($conn, $sql2)){
                session_unset();
                session_destroy();
                echo "<script>
                        alert('password berhasil diubah, silakan login kembali');     
                        document.location.href = 'login.php'; 
                      </script>";
              } else {
                echo "Error";
              }
            }
          }
        }
      }      
      ?>
      </div>

  </div>

    

</body>
</html>