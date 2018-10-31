<?php

require "dbconnect.php";




$query = "SELECT * FROM student";

$data = mysqli_query($connect, $query);



class SinhVien
{
	
	function SinhVien($Id, $hoten, $namsinh, $diachi)
	{
		$this->ID = $Id;
		$this->HoTen = $hoten;
		$this->NamSinh = $namsinh;
		$this->DiaChi = $diachi;
	}
}
// Tao mang
$mangSV = array();
while ($row = mysqli_fetch_assoc($data)) {
	//them du lieu vao mang
	array_push($mangSV, new SinhVien($row['id'],$row['hoten'],$row['namsinh'],$row['diachi']));
	# code...
}


// Chuyen dinh dang mang thanh JSON
echo json_encode($mangSV);

?>