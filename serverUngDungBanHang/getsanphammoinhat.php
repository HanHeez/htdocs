<?php

require "dbconnect.php";




$query = "SELECT * FROM sanpham ORDER BY ID DESC LIMIT 6";

$data = mysqli_query($connect, $query);



class sanphammoinhat
{
	
	function sanphammoinhat($id, $tensp, $giasp, $hinhanhsp, $motasp, $idsp)
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
$mangSPMN = array();
while ($row = mysqli_fetch_assoc($data)) {
	//them du lieu vao mang
	array_push($mangSPMN, new sanphammoinhat(
		$row['id']
		,$row['tensp']
		,$row['giasp']
		,$row['hinhanhsp']
		,$row['motasp']
		,$row['idsp']));
	# code...
}


// Chuyen dinh dang mang thanh JSON
echo json_encode($mangSPMN);

?>