<?php

    include 'connect.php';

    $sql = "SELECT tt.id_toko, tt.nama_toko, tt.alamat_toko,tt.foto_toko, tt.deskripsi, tt.no_tlp AS no_tlp_store, tu.nama_lengkap, tu.no_tlp,
     tu.foto FROM tb_toko tt, tb_user tu WHERE tt.id_user = tu.id_user AND tt.konfirmasi = 0";

$result = $conn->query($sql);

if($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $data['store'][] = $row;
    }

    $data['pesan'] = "Sukses";
    $data['hasil'] = "1";
} else {
    $data['pesan'] = "Data Kosong";
    $data['hasil'] = "0";
}

echo json_encode($data);

?>