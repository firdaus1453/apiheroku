<?php

    include 'connect.php';

    $response = array();

    if($_SERVER['REQUEST_METHOD'] = 'POST') {

        $id_user = $_POST['id_user'];
        $judul = $_POST['judul'];
        $laporan = $_POST['laporan'];
        $tgl_lapor = $_POST['tgl_lapor'];
    }

    $sql = "INSERT INTO tb_kritik (id_user, judul, laporan, tgl_lapor) VALUES ( '$id_user', '$judul', '$laporan', '$tgl_lapor')";

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