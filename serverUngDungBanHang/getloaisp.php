<?php

require "dbconnect.php";




$query = "SELECT * FROM loaisanpham";

$data = mysqli_query($connect, $query);



class Loaisp
{
	
	function Loaisp($id, $tenloaisp, $hinhanhloaisp)
	{
		$this->id = $id;
		$this->tenloaisp = $tenloaisp;
		$this->hinhanhloaisp = $hinhanhloaisp;
		
	}
}
// Tao mang
$mangSP = array();
while ($row = mysqli_fetch_assoc($data)) {
	//them du lieu vao mang
	array_push($mangSP, new Loaisp($row['id'],$row['tenloaisp'],$row['hinhanhloaisp']));
	# code...
}


// Chuyen dinh dang mang thanh JSON
echo json_encode($mangSP);

?>