<?php 
session_start();
require 'koneksi.php';

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

$id = $_SESSION['id'];
$sql = mysqli_query($conn, "SELECT * FROM tugas INNER JOIN user ON tugas.id_user = user.id WHERE status='' ORDER BY id_tugas DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Tugas</title>
    <link href="styleTugas.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
      table a button{

      border: 0px;  
      position: relative;
      width: 80px;
      height: 28px;
      margin: 15px;

      background: #1BB45C;
      border-radius: 5px;

      font-family: Lato;
      font-style: normal;
      font-weight: bold;
      font-size: 14px;
      line-height: 10px;
      /* identical to box height */


      color: #F9FCFB;
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
      <span class="p-profil"><p>Profil</p></span></a>
      <a href="tugas.php"><img class="icon2" src="icon/Group66.png" alt="">
      <span class="p-tugas"><p style="font-weight: bold">Tugas</p></span></a>
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

  <span class="judul-konten"><p>Tugas</p></span>

  <div class="konten">
    <table class="table-bordered" style="width:1000px">
      <thead class="table-warning" >
        <tr class="thead-light">
          <th class="col">Pembuat Tugas</th>
          <th class="col" scope="col">Judul Tugas</th>
          <th class="col" scope="col">Kategori</th>
          <th class="col" scope="col">Tanggal</th>
          <th class="col" scope="col">Harga</th>
          <th class="col" scope="col">Aksi</th>
        </tr>
      </thead>
      <?php 
      while($data = mysqli_fetch_array($sql)) {
      ?>
      <tbody>
        <tr>
          
          <td><?php echo $data['nama'] ?></td>
          <td>
          <a id="set_dtl" class="btn" data-toggle="modal" data-target="#modal-detail" data-isi_tugas="<?php echo $data['isi_tugas'] ?>">
            <?php echo $data['judul_tugas']?>
          </a>
              
            
          </td>
          <td><?php echo $data['kategori'] ?></td>
          <td><?php echo $data['tanggal'] ?></td>
          <td><?php echo $data['harga'] ?></td>
          <td>
            
            <a href="simpan.php?id_tugas=<?= $data["id_tugas"]; ?>" onClick="return confirm('apakah anda ingin mengerjakan tugas ini?')">
              <button>Kerjakan</button>
            </a>
          </td>
        </tr>
        <?php 
       
        }
        ?>
      </tbody>
    </table>
  </div>
  <div class="modal fade" id="modal-detail" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Deskripsi Tugas</h4>
          </div>
          <div class="modal-body">
            <p><span id="isi_tugas"></span></p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</body>
</html>

<script>

$(document).ready(function() {
  $(document).on('click', '#set_dtl', function() {
    var isi_tugas = $(this).data('isi_tugas');
    $('#isi_tugas').text(isi_tugas);

  }) 
})
</script>