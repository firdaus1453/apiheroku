<?php

    include 'connect.php';

    $sql = "SELECT * FROM tb_kritik, tb_user WHERE tb_user.id_user = tb_kritik.id_user AND tb_kritik.konfirmasi = 1 ORDER BY tb_kritik.id_kritik DESC";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $data['laporan'][] = $row;
        }

        $data['pesan'] = "Sukses";
        $data['hasil'] = "1";
    } else {
        $data['pesan'] = "Data Kosong";
        $data['hasil'] = "0";
    }

    echo json_encode($data);

?>