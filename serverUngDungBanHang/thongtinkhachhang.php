<?php

require "dbconnect.php";

$tenkhachhang = $_POST['tenkhachhang'];
$sodienthoai = $_POST['sodienthoai'];
$email = $_POST['email'];
if (strlen($tenkhachhang)>0 && strlen($email)>0 && strlen($sodienthoai)>0) {
	$query = "INSERT INTO donhang(id, tenkhachhang, sodienthoai, email) VALUES 
	(null, '$tenkhachhang', '$sodienthoai' , '$email')";

	if (mysqli_query($connect, $query)) {
		$iddonhang = $connect->insert_id;
		echo $iddonhang;
	} else {
		echo "That bai";
	}
	# code...
} else {
	echo "Hãy kiểm tra dữ liệu";
}

?>