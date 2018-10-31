<?php
	
//$a = 12;
//$b = "abc5";

//echo $a + $b;

/**
* 
*/
// Tao Class
class SinhVien
{
	
	function SinhVien($hoten, $namsinh, $diachi)
	{
		$this->HoTen = $hoten;
		$this->NamSinh = $namsinh;
		$this->DiaChi = $diachi;
	}
}
// Tao mang
$mangSV = array();
array_push($mangSV, new SinhVien("Nguyen Van A",1999,"Ha Noi"));
array_push($mangSV, new SinhVien("Nguyen Van B",1995,"Ho Chi Minh"));

// Chuyen dinh dang mang thanh JSON
echo json_encode($mangSV);

?>