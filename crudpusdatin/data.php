<?php  
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN DATA</title>
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

    <!-- awal table -->
    <div class="card-body">
        <div class="card-header bg-success text-white">
            Daftar Siswa
        </div>
        <div class="card-body">
                <table class="table table-bordered table-striped">
                <tr>
                    <td>No.</td>
                    <td>Nis</td>
                    <td>Nama</td>
                    <td>Rombel</td>
                    <td>Rayon</td>
                    <td>Alamat</td>
                    <td>Agama</td>
                    <td>Foto</td>
                    <td>Aksi</td>
                </tr>

                <?php  
                $query = mysqli_query($conn, "SELECT * FROM tb_siswa");
                while($row = mysqli_fetch_array($query)){
                ?>

                <tr>
                    <td><?php echo $row['id_siswa'] ?></td>
                    <td><?php echo $row['nis'] ?></td>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['rombel'] ?></td>
                    <td><?php echo $row['rayon'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><?php echo $row['agama'] ?></td>
                    <td><img src="upload/<?php echo $row['file'] ?>" width="100px" height="100px" ></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id_siswa'] ?>" class="btn btn-warning">Edit</a>
                        <a href="hapus.php?id=<?php echo $row['id_siswa'] ?>"
                            onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
            
            <a href="index.php" class="btn btn-primary mt-3">Tambah Data</a>
        
        </div>    
    </div>
    <!-- akhir table -->

</div>
</body>
</html>