<?php

    include 'connect.php';

    $sql = "SELECT ti.id_informasi, ti.foto AS fotoInformasi, ti.judul, ti.content, ti.tgl_nulis, tu.nama_lengkap, tu.no_tlp,
     tu.foto FROM tb_informasi ti, tb_user tu WHERE ti.id_user = tu.id_user AND ti.konfirmasi = 0";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $data['informasi'][] = $row;
        }

        $data['pesan'] = "Sukses";
        $data['hasil'] = "1";
    } else {
        $data['pesan'] = "Data Kosong";
        $data['hasil'] = "0";
    }

    echo json_encode($data);

?>