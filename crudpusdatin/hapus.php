<?php  
    include 'connection.php';
    $delete = mysqli_query($conn, "DELETE FROM tb_siswa WHERE id_siswa = '".$_GET['id']."'");
    if($delete){
        header('location:data.php');
    }else{
        echo 'Gagal hapus';
    }
?>