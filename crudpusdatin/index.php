<?php
    include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PUSDATIN SMKS WIKRAMA 1 GARUT</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href='img/LOGO KEBANGSAAN.png' rel='shortcut icon'>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PUSDATIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="data.php">Data Siswa</a>
                </div>
            </div>
        </div>
    </nav>


</head>
<body>
<div class="container">

    <div class="card-body">
        <div class="card-header bg-dark text-white">
            <h1 class="text-center mt-3">PENDATAAN ULANG SISWA</h1>
            <h1 class="text-center">SMKS WIKRAMA 1 GARUT</h1>
        </div>
    </div>

    <!-- awal form -->
    <div class="card-body">
        <div class="card-header bg-alert">
            Form input data siswa
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" placeholder="Input NIS anda disini!" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Input Nama anda disini!" required>
                </div>
                <div class="form-group">
                    <label>Rombel</label>
                    <select class="form-control" name="rombel">
                        <option value="<?=@$rombel?>"><?=@$rombel?></option>
                        <option value="RPL X">RPL X</option>
                        <option value="RPL XI">RPL XI</option>
                        <option value="RPL XII">RPL XII</option>
                        <option value="TKJ X">TKJ X</option>
                        <option value="TKJ XI">TKJ XI</option>
                        <option value="TKJ XII">TKJ XII</option>
                        <option value="HTL X">HTL X</option>
                        <option value="HTL XI">HTL XI</option>
                        <option value="BDP X">BDP X</option>
                        <option value="BDP X">BDP XI</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Rayon</label>
                    <select class="form-control" name="rayon">
                        <option value="<?=@$rayon?>"><?=@$rayon?></option>
                        <option value="Al Ikrom 1">Al Ikrom 1</option>
                        <option value="Al Ikrom 2">Al Ikrom 2</option>
                        <option value="Garteng">Garteng</option>
                        <option value="Tarkal">Tarkal</option>
                        <option value="Tarkid">Tarkid</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Input Alamat anda disini!"></textarea>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <input type="text" name="agama" class="form-control" placeholder="Input Agama anda disini!" required>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" placeholder="Input Foto anda disini!" required>
                </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" required>
                            <label class="form-check-label" for="disabledFieldsetCheck">
                                Saya sudah yakin
                            </label>
                    </div>
                    <button type="submit" class="btn btn-warning form-control mt-3" name="kirim" value="kirim" >KIRIM</button>
                    
               
            </form>
        </div>
    </div>
    <!-- akhir form -->


    <?php
    if(isset($_POST['kirim'])){
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $rombel = $_POST['rombel'];
        $rayon = $_POST['rayon'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $nama_file = $_FILES['foto']['name'];
        $source = $_FILES['foto']['tmp_name'];
        $folder = './upload/';

        move_uploaded_file($source, $folder.$nama_file);
        $insert = mysqli_query($conn, "INSERT INTO tb_siswa VALUES (
            NULL,
            '$nis',
            '$nama',
            '$rombel',
            '$rayon',
            '$alamat',
            '$agama',
            '$nama_file')");

        if ($insert) {
            echo "<script type='text/javascript'>
                        alert('Data berhasil di simpan.')
                        document.location='data.php'
                  </script>";
        }else{
        echo "gagal simpan.";
        }
    }
    ?>
</div>  
</body>
</html>