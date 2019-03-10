<?php

    include 'connect.php';

    $upload_path = 'storeupload/';
    $server_ip = gethostbyname(gethostname());
    $upload_url = 'http://'.$server_ip.'/Dinacom/'.$upload_path;
    $response = array();
    $response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_user = $_POST['id_user'];
        $nama = $_POST['nama_toko'];
        $deskripsi = $_POST['deskripsi'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];
        $konfirmasi = 0;

        $fileinfo = pathinfo($_FILES['foto']['name']);
        $extension = $fileinfo['extension'];
        $file_url = $_FILES['foto']['name'];

        $file_path = $upload_path . $_FILES['foto']['name'];

        try{
            move_uploaded_file($_FILES['foto']['tmp_name'], $file_path);

            $sql = "INSERT INTO tb_toko(id_user, foto_toko, nama_toko, alamat_toko, deskripsi, no_tlp, konfirmasi) VALUES ('$id_user', '$file_url', '$nama', '$deskripsi', '$alamat', '$no_tlp', '$konfirmasi')";


             $eksekusi = mysqli_query($conn, $sql);

             if($eksekusi) {
                 $response['result'] = "1";
                 $response['msg'] = "Berhasil Mengirim";
             } else {
                 $response['result'] = "0";
                 $response['msg'] = "Gagal Mengirim";
             }

        }catch (Exception $e) {
            $response['error'] = true;
            $response['message'] = $e->getMessage();
        }

        echo json_encode($response);

        mysqli_close($conn);

    }

?>