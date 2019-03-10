<?php

    include 'connect.php';
    
    $response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $judul = $_POST['judul'];
        $content = $_POST['content'];
        $tempat = $_POST['tempat'];
        $tanggal  = $_POST['tanggal'];
        $konfirmasi = $_POST['konfirmasi'];
    }

    $sql = "INSERT INTO tb_agenda (judul, content, tempat, tanggal, konfirmasi) VALUES ('$judul', '$content', '$tempat', '$tanggal', '$konfirmasi')";

    if(mysqli_query($conn, $sql)) {
        $response["pesan"] = "Berhasil menyimpan data";
        $response["result"] = "sukses";
    } else {
        $response["pesan"] = "Gagal Mengirim Data";
        $response['result'] = "gagal";
    }

    echo json_encode($response);

    mysqli_close($conn);

?>