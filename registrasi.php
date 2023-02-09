<?php
require 'koneksi.php';

if( isset($_POST["register"]) ) {

    if( registrasi($_POST) > 0) {
        echo "<script>     
            alert('user baru berhasil ditambahkan!');
          </script>";
    } else {
        echo mysqli_error($conn);
    }
}

function registrasi($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek email sudah ada atau belum
    $result= mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('email sudah terdaftar!');
              </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$email', '$password')");

    return mysqli_affected_rows($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Registrasi EzWay</title>
    <link href="styleRegistrasi.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="kiri">
        <div class="container">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label judul">Registrasi</label>
                    <label class="form-label deskripsi">Daftarkan akun untuk mendapatkan pengalaman mengerjakan tugas
                        dengan mudah dan mendapatkan tambahan uang saku</label>
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="nama" aria-describedby="Nama">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Ulangi Kata Sandi</label>
                    <input type="password" name="password2" class="form-control" id="password2">
                </div>
                <button type="submit" name="register" class="button">Buat Akun</button>
                <br>
                <br>
                <label class="punya-akun">Sudah punya akun?</label>
                <label class="sudah-login"><a href = "login.php">Login disini.</a></label>
            </form>
        </div>

    </div>
    <div class="kanan">
      <div class="judul">
            <p>EZ<br>WAY</p>
        </div>

        <img src= "img/Group58.png" alt="...">

        <div class="deskripsi">
            <p>Memiliki tutor yang siap membantu<br><br>
            Sehingga membuat tugas menjadi mudah</p>
        </div>        
    </div>
    

</body>
</html>
