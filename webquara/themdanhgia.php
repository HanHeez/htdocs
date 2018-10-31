<?php
	include_once("config.php");

	$madg = $_POST["madg"];
	$masp = $_POST["masp"];
	$tenthietbi = $_POST["tenthietbi"];	
	$tieude = $_POST["tieude"];
	$noidung = $_POST["noidung"];
	$sosao = $_POST["sosao"];	
	
	$ngaydang = date("d/m/Y");

	$truyvan = "INSERT INTO danhgia (MADG,MASP,TENTHIETBI,TIEUDE,NOIDUNG,SOSAO,NGAYDANHGIA) VALUES ('".$madg."','".$masp."','".$tenthietbi."','".$tieude."','".$noidung."','".$sosao."','".$ngaydang."')";

	$ketqua = mysqli_query($conn,$truyvan);

	if ($ketqua) {
		echo "true";
	} else {
		echo "false".mysqli_error($conn);
	}
	mysqli_close($conn);			

?>
