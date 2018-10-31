<?php
	include_once("config.php");

	$danhsachsanpham = $_POST["danhsachsanpham"];
	$tennguoinhan = $_POST["tennguoinhan"];
	$sodt = $_POST["sodt"];	
	$diachi = $_POST["diachi"];
	$chuyenkhoan = $_POST["chuyenkhoan"];
	
	$ngayhientai = date("d-m-Y");
	$ngaygiao = date_create($ngayhientai);
	$ngaygiao = date_modify($ngaygiao,"+3 days");
	$ngaygiao = date_format($ngaygiao,"d/m/Y");	

	$trangthai = "chờ kiểm duyệt";
	$truyvan = "INSERT INTO hoadon (NGAYMUA,NGAYGIAO,TRANGTHAI,TENNGUOINHAN,SODT,DIACHI,CHUYENKHOAN) VALUES ('".$ngayhientai."','".$ngaygiao."','".$trangthai."','".$tennguoinhan."','".$sodt."','".$diachi."','".$chuyenkhoan."')";

	$ketqua = mysqli_query($conn,$truyvan);

	if ($ketqua) {		
		$mahd = mysqli_insert_id($conn);
		$mangjson = json_decode($danhsachsanpham);
		$arrayDanhSachSanPham = $mangjson->DANHSACHSANPHAM;

		for ($i=0; $i < count($arrayDanhSachSanPham); $i++) { 
			$jsonobject = $arrayDanhSachSanPham[$i];
			$masp = $jsonobject->masp;
			$soluong = $jsonobject->soluong;
		
			$truyvan1 = "INSERT INTO chitiethoadon (MAHD,MASP,SOLUONG) VALUES ('".$mahd."','".$masp."','".$soluong."')";
			$ketqua1 = mysqli_query($conn,$truyvan1);
		
					
		}
		echo "true";
	} else {
		echo "false".mysqli_error($conn);
	}

	mysqli_close($conn);			

?>