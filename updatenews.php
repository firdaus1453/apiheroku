<?php

    include 'connect.php';

    $response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $konfirmasi = 1;
    }

    $sql = "UPDATE tb_informasi SET konfirmasi = $konfirmasi WHERE id_informasi = $id";

    if(mysqli_query($conn, $sql)) {
        $response["pesan"] = "Berhasil Mengkonfirmasi";
        $response["result"] = "sukses";
    } else {
        $response["pesan"] = "Gagal Mengkonfirmasi";
        $response['result'] = "gagal";
    }
    
    echo json_encode($response);

    mysqli_close($conn);

?>