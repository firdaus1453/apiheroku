<?php
include 'connect.php';

$upload_path = 'upload/';
// $server_ip = gethostbyname(gethostname());
// $upload_url = 'http://'.$server_ip.'/Dinacom/'.$upload_path;
// $filename = "img".rand(9,9999).".jpg";
$response = array();

if ($_SERVER['REQUEST_METHOD']=='POST') {

		$nama_lengkap = $_POST['nama_lengkap'];
		$no_ktp = $_POST['no_ktp'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$jenkel = $_POST['jenkel'];
		$profesi = $_POST['profesi'];
		$no_tlp = $_POST['no_tlp'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$konfirmasi = $_POST['konfirmasi'];
		$level = $_POST['level'];

		// echo $file_name;

		// $fileinfo = pathinfo($_FILES['foto']['name']);
        // $extension = $fileinfo['extension'];
    

        // $file_path = $upload_path . $_FILES['foto']['name'];


		$sql = "SELECT * FROM tb_user WHERE username = '$username'";
		$check = mysqli_fetch_array(mysqli_query($conn, $sql));
		if (isset($check)) {
			$response["result"] = "0";
			$response["msg"] = "Username sudah terdaftar!";
		}else{

			try {
				// move_uploaded_file($_FILES['foto']['tmp_name'], $file_path);
				if($_SERVER['REQUEST_METHOD'] == 'POST') {
				if($_FILES['foto']) {
					$file_url = $_FILES['foto']['name'];
					$destination_file = $upload_path. $_FILES['foto']['name'];

					if(move_uploaded_file($_FILES['foto']['tmp_name'], $destination_file)) {
						$sql = "INSERT INTO tb_user ( nama_lengkap, no_ktp, alamat, status, tgl_lahir, jenkel, profesi, no_tlp, 
			email, username, password, foto, konfirmasi, level) VALUES ( '$nama_lengkap', '$no_ktp', '$alamat', '$status',
			 '$tgl_lahir', '$jenkel', '$profesi', '$no_tlp', '$email', '$username', '$password', '$file_url', '$konfirmasi', '$level');";

			 $eksekusi = mysqli_query($conn, $sql);
			 
				if($eksekusi) {

				$response['result'] = "1";
				$response['msg'] = "Berhasil Register!!";
				# code...
			} else {
				$response['result'] = "0";
				$response['msg'] = "Gagal Register!!";
			}
					}
				}
			}else{
				$response['result'] = "0";
				$response['msg'] = "Request tidak valid";
			}

				
		}catch (Exception $e) {
			$response['error'] = true;
			$response['message'] = $e->getMessage();
		}
		}

		echo json_encode($response);
			mysqli_close($conn);
		}

		

?>