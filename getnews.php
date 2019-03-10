<?php

    include 'connect.php';

    $sql = "SELECT ti.id_informasi, ti.foto AS fotoInformasi, ti.content, ti.judul, ti.konfirmasi, ti.tgl_nulis, tu.nama_lengkap, tu.foto, tu.no_tlp
     FROM tb_informasi ti, tb_user tu WHERE ti.id_user = tu.id_user AND ti.konfirmasi = 0" ;

    $result = $conn->query($sql);

    if($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $data['news'][] = $row;
        }

        $data['pesan'] = "Sukses";
        $data['hasil'] = "1";
    } else {
        $data['pesan'] = "Data Kosong";
        $data['hasil'] = "0";
    }

    echo json_encode($data);

?>