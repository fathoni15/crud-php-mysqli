<?php
    include 'connection.php';

    $data = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE id_siswa = '".$_GET['id']."'");
    $r = mysqli_fetch_array($data);

    $nis = $r['nis'];
    $nama = $r['nama'];
    $rombel = $r['rombel'];
    $rayon = $r['rayon'];
    $alamat = $r['alamat'];
    $agama = $r['agama'];
    $file = $r['file'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN EDIT DATA</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href='img/LOGO KEBANGSAAN.png' rel='shortcut icon'>
</head>
<body>

    <!-- awal form -->
        <div class="card-body">
                <div class="card-header bg-dark text-white">
                    Silhkan edit data anda
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                                <label>NIS</label>
                                <input type="text" name="nis" value="<?php echo $nis?>" class="form-control" placeholder="Input NIS anda disini!" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?php echo $nama?>" class="form-control" placeholder="Input Nama anda disini!" required>
                            </div>
                            <div class="form-group">
                                <label>Rombel</label>
                                <input type="text" name="rombel" value="<?php echo $rombel?>" class="form-control" placeholder="Input Rombel anda disini!" required>
                            </div>
                            <div class="form-group">
                                <label>Rayon</label>
                                <input type="text" name="rayon" value="<?php echo $rayon?>" class="form-control" placeholder="Input Rayon anda disini!" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Input Alamat anda disini!"><?=@$alamat?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Agama</label>
                                <input type="text" name="agama" value="<?php echo $agama?>" class="form-control" placeholder="Input Agama anda disini!" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="img" value="<?php echo $file?>" class="form-control" placeholder="Input Foto anda disini!" required>
                                <input type="file" name="foto" />
                            </div>
                            <div class="form-group">
                                <img src="upload/<?php echo $file ?>" width="100px" height="100px" />
                            </div>
                                <button type="submit" class="btn btn-primary" name="kirim" value="kirim" >Update</button>
                                <a href="data.php" class="btn btn-secondary">Kembali</a>
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

        if($nama_file != ''){
            move_uploaded_file($source, $folder.$nama_file);
            $update = mysqli_query($conn, "UPDATE tb_siswa SET
                nis = '".$nis."',
                nama = '".$nama."',
                rombel = '".$rombel."',
                rayon = '".$rayon."',
                alamat = '".$alamat."',
                agama = '".$agama."',
                file = '".$nama_file."'
                WHERE id_siswa = '".$_GET['id']."'
                ");
                if($update){
                    echo 'Berhasil update';
                }else{
                    echo 'Gagal update';
                }
        }else{
            $update = mysqli_query($conn, "UPDATE tb_siswa SET
                nis = '".$nis."',
                nama = '".$nama."',
                rombel = '".$rombel."',
                rayon = '".$rayon."',
                alamat = '".$alamat."',
                agama = '".$agama."'
                WHERE id_siswa = '".$_GET['id']."'
                ");
                
                
            if ($update) {
                echo "<script type='text/javascript'>
                            alert('Data berhasil di edit.')
                    </script>";
            }else{
            echo "gagal simpan.";
            }
        }
    }
    ?>
    
</body>
</html>