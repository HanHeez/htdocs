<?php
	require "connect.php";

	$taikhoan = $_POST['taikhoan'];
	$matkhau = $_POST['matkhau'];
	$hinhanh = $_POST['hinhanh'];

	if (strlen($taikhoan)>0 && strlen($matkhau)>0 && strlen($hinhanh)>0) {
		$query = "INSERT INTO sinhvien VALUES (null,'$taikhoan','$matkhau','$hinhanh')";
		$data = mysqli_query($connect,$query);
		if ($data) {
			echo "success";
		} else {
			echo "failed";
		}

	} else {
		echo "Null";
	}
?>