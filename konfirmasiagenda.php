<?php

    include 'connect.php';

    $sql = "SELECT * FROM tb_agenda WHERE konfirmasi = 0";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $data['agenda'][] = $row;
        }

        $data['pesan'] = "Sukses";
        $data['hasil'] = "1";
    } else {
        $data['pesan'] = "Data Kosong";
        $data['hasil'] = "0";
    }

    echo json_encode($data);

?>