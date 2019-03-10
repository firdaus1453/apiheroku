<?php

    include 'connect.php';

    $id_user = $_POST['id_user'];

    $sql = "SELECT * FROM tb_user tu WHERE tu.id_user = $id_user";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            if ($row['konfirmasi'] == 1 || $row['konfirmasi'] == 2) {
                $data['user'][] = $row;
                $data['pesan'] = "Sukses";
                $data['hasil'] = "1";
            } else {
                $data['pesan'] = "Gagal";
                $data['hasil'] = "-1";
            }
            } 
    } else {
        $data['pesan'] = "Data Kosong";
        $data['hasil'] = "0";
    }

    echo json_encode($data);

?>