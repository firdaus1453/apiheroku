<?php

$response = array();
$username = $_POST["edtusername"];
$password = md5($_POST["edtpassword"]);

include 'connect.php';

$konfirmasi = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' and password = '$password' and konfirmasi = 2");

if (!$konfirmasi) {
    echo 'Could not run query: ' . mysqli_error($conn);
        exit();
}

$row = mysqli_fetch_row($konfirmasi);

$result_data = array(
    'id_user' => $row[0],
    'nama_lengkap' => $row[1],
    'no_ktp' => $row[2],
    'alamat' => $row[3],
    'status' => $row[4],
    'tgl_lahir' => $row[5],
    'jenkel' => $row[6],
    'profesi' => $row[7],
    'no_tlp' => $row[8],
    'email' => $row[9],
    'username' => $row[10],
    'password' => $row[11],
    'foto' => $row[12],
    'konfirmasi' => $row[13],
    'level' => $row[14]
);

    if (mysqli_num_rows($konfirmasi) > 0) {
            $response['result'] = "1";
            $response['msg'] = "Berhasil Login!!";
            $response['user'] = $result_data;

        
    }else {
        $response['result'] = "0";
        $response['msg'] = "Gagal Login!!";
    }

    echo json_encode($response);

?>