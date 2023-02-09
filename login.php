<?php 
session_start();

if(isset($_SESSION["login"])){
    header("Location: profile.php");
    exit;
}

require 'koneksi.php';

if(isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    //$get_data = mysqli_fetch_assoc($result);

    //cek email
    if(mysqli_num_rows($result) == 1 ) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"]) ) {

            //set session
            $_SESSION["login"] = true;
            $_SESSION["nama"] = $row["nama"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["id"] = $row["id"];
            $_SESSION["id_tugas"] = $row["id_tugas"];
            
            header("Location: profile.php");
            exit;
        } else{
            echo "<script>     
                    alert('Password salah!');
                    document.location.href = 'login.php';
                 </script>";
        }
    }

    $error = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Registrasi EzWay</title>
    <link href="styleLogin.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="kiri">
        <div class="container">
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label judul">Login</label>
                    <br>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="Email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <button type="submit" name="login" class="button">Masuk</button>
                <br>
                <br>
                <label class="punya-akun"><a href = "registrasi.php">Belum punya akun?</a></label>
                <label class="sudah-login"><a href = "registrasi.php">Daftar disini.</a></label>
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