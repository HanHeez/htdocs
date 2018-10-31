<?php
	include_once("config.php");

	$tennv = $_POST["tennv"];
	$tendangnhap = $_POST["tendangnhap"];
	$matkhau = $_POST["matkhau"];	
	$maloainv = $_POST["maloainv"];
	$emaildocquyen = $_POST["emaildocquyen"];
	

	$truyvan = "INSERT INTO nhanvien (TENNV,TENDANGNHAP,MATKHAU,MALOAINV,EMAILDOCQUYEN) VALUES ('".$tennv."','".$tendangnhap."','".$matkhau."','".$maloainv."','".$emaildocquyen."')";

	if (mysqli_query($conn,$truyvan)) {
		echo "true";
	} else {
		echo "false".mysqli_error($conn);
	}
	mysqli_close($conn);			

?>
