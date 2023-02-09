<?php
session_start();
require 'koneksi.php';



$id_tugas= $_GET['id_tugas'];

if(simpan($id_tugas)>0){
    echo "<script>     
            alert('Tugas berhasil disimpan. Selamat mengerjakan!');
            document.location.href = 'tugas.php';
          </script>";
} else {
    echo "<script>     
            alert('Kerjakan tugas orang lain!');
            document.location.href = 'tugas.php';
          </script>";
}

function simpan($id_tugas) {
    global $conn;
    $id = $_SESSION['id'];

    mysqli_query($conn, "UPDATE tugas SET status='DONE', id_tutor='$id' WHERE id_tugas='$id_tugas' AND id_user<>$id ");

    return mysqli_affected_rows($conn);
}



?>