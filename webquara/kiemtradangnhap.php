<?php
	include_once("config.php");

	$tendangnhap = $_POST["tendangnhap"];
	$matkhau = $_POST["matkhau"];		


	$truyvan = "SELECT * FROM nhanvien WHERE TENDANGNHAP='".$tendangnhap."' AND MATKHAU='".$matkhau."'";
	$ketqua = mysqli_query($conn,$truyvan);
	$demdong = mysqli_num_rows($ketqua);
	if ($demdong >=1) {
		$tennv = "";
		while ($dong = mysqli_fetch_array($ketqua)) {
			$tennv = $dong["TENNV"];

		}
		echo "{\"ketqua\" : true, \"tennv\" : \"".$tennv."\"}";
	} else {
		echo "{\"ketqua\" : false, \"tennv\" : \"\"}";
	}

?>
