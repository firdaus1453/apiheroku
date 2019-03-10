<?php
include 'connect.php';

$upload_path = 'upload_informasi/';
$server_ip = gethostbyname(gethostname());
$upload_url = 'http://'.$server_ip.'/Dinacom/'.$upload_path;
$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['id_user']) && isset($_POST['judul']) &&  isset($_POST['content'])){

        $id_user = $_POST['id_user'];
        $judul = $_POST['judul'];
        $content = $_POST['content'];
        $date = $_POST['tgl_nulis'];
        $konfirmasi = $_POST['konfirmasi'];

        $fileinfo = pathinfo($_FILES['foto']['name']);
        $extension = $fileinfo['extension'];
        $file_url = $_FILES['foto']['name'];

        $file_path = $upload_path . $_FILES['foto']['name'];

        try{
            move_uploaded_file($_FILES['foto']['tmp_name'], $file_path);

            $sql = "INSERT INTO tb_informasi (id_user, foto,judul, content, tgl_nulis, konfirmasi) VALUES ('$id_user', '$file_url', '$judul', '$content',
             '$date', '$konfirmasi')";

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

    } else {
        $response['error'] = true;
        $response['message'] = "Field tidak boleh kosong";
    }

        mysqli_close($conn);

}
?>