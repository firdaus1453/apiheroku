<?php

include 'connect.php';

	$response = array();
	$username = $_POST["edtusername"];
	$password = md5($_POST["edtpassword"]);

	$sql = "SELECT * FROM tb_user tu WHERE tu.username = '$username' AND tu.password = '$password'";

	$check = mysqli_query($conn, $sql);

	if (!$check) {
		echo 'Could not run query: ' . mysqli_error($conn);
			exit();
	}

	$row = mysqli_fetch_array($check);

	if ($row['konfirmasi'] == 1 || $row['konfirmasi'] == 2) {
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
	
			if (mysqli_num_rows($check) > 0) {
					$response['result'] = "1";
					$response['msg'] = "Berhasil Login!!";
					$response['user'] = $result_data;
	
				
			}else {
				$response['result'] = "0";
				$response['msg'] = "Gagal Login!!";
			}
	
			echo json_encode($response);
	} else {
		$response['result'] = "-1";
		$response['msg'] = "Belum Terverifikasi";

		echo json_encode($response);
	}
?>