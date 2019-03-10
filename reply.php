<?php

    include 'connect.php';

    $response = array();

    if(isset($_POST['id_kritik']) 
    && isset($_POST['reply'])) {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id_kritik'];
        $reply = $_POST['reply'];

        $sql = "UPDATE tb_kritik SET reply = '$reply', konfirmasi = 1 WHERE id_kritik = '$id'";

        $act = mysqli_query($conn, $sql);

        if($act) {
            $response['result'] = "1";
            $response['message'] = "Succes to reply";
        } else {
            $response['result'] = "0";
            $response['message'] = "Error";
        }
    }
} else {
    $response['result'] = "-1";
    $response['message'] = "Field tidak boleh kosong";
}

echo json_encode($response);

mysqli_close($conn)

?>
