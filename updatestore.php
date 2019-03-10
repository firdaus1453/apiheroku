<?php

    include 'connect.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $konfirmasi = 1;
    }

    $sql = "UPDATE tb_toko SET konfirmasi = $konfirmasi WHERE id_toko = $id";

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