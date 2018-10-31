<?php

require "dbconnect.php";

$page = $_GET['page'];
$idsp = $_POST['idsp'];
$space = 5;
$limit = ($page - 1) * $space;




$query = "SELECT * FROM sanpham WHERE idsp = $idsp LIMIT $limit,$space";

$data = mysqli_query($connect, $query);



class Sanpham
{
	
	function Sanpham($id, $tensp, $giasp, $motasp, $idsp, $hinhanhsp)
	{
		$this->id = $id;
		$this->tensp = $tensp;
		$this->giasp = $giasp;
		$this->hinhanhsp = $hinhanhsp;
		$this->motasp = $motasp;
		$this->idsp = $idsp;
		
	}
}
// Tao mang
$mangSanPham = array();
while ($row = mysqli_fetch_assoc($data)) {
	//them du lieu vao mang
	array_push($mangSanPham, new Sanpham(
		$row['id'],
		$row['tensp'],
		$row['giasp'],
		$row['motasp'],
		$row['idsp'],
		$row['hinhanhsp']));
	# code...
}


// Chuyen dinh dang mang thanh JSON
echo json_encode($mangSanPham);

?>