
<?php
	include_once("config.php");	

	$masp = $_POST["masp"];
	$ngayhientai = date ("Y/m/d");

	$truyvan = "SELECT * FROM sanpham sp, nhanvien nv WHERE sp.MASP = ".$masp." AND sp.MANV = nv.MANV";

	$truyvanchitiet = "SELECT * FROM chitietsanpham WHERE MASP = ".$masp;

	$truyvankhuyenmai = "SELECT *, DATEDIFF(km.NGAYKETTHUC,'".$ngayhientai."') AS THOIGIANKM FROM khuyenmai km,chitietkhuyenmai ctkm WHERE km.MAKM = ctkm.MAKM AND ctkm.MASP= '".$masp."'";
	$ketquakhuyenmai = mysqli_query($conn, $truyvankhuyenmai);
	$phantramkm = 0;

	if ($ketquakhuyenmai) {
		while ($dongkhuyenmai = mysqli_fetch_array($ketquakhuyenmai)) {
			$thoigiankm = $dongkhuyenmai["THOIGIANKM"];

			if ($thoigiankm >= 0) {
				$phantramkm = $dongkhuyenmai["PHANTRAMKM"];
			}
		}

	}

	$ketqua = mysqli_query($conn, $truyvan);
	$ketquachitiet = mysqli_query($conn, $truyvanchitiet);
	$chuoijson = array();	
	$chuoijsonchitiet = array();

	if ($ketquachitiet) {
		while ($dongchitiet = mysqli_fetch_array($ketquachitiet)) {
			array_push($chuoijsonchitiet, array("TENCHITIET" => $dongchitiet["TENCHITIET"],"GIATRI" => $dongchitiet["GIATRI"]));
			//Key động :
			// array_push($chuoijsonchitiet, array($dongchitiet["TENCHITIET"]=>$dongchitiet["GIATRI"]));
		}			
	}

	if ($ketqua) {	

		while ($dong = mysqli_fetch_array($ketqua)) {		
					
			array_push($chuoijson, array("MASP" => $dong["MASP"],"TENSP" => $dong["TENSP"],"GIA" => $dong["GIA"],"ANHLON" => $dong["ANHLON"],"ANHNHO" => $dong["ANHNHO"],"THONGTIN" => $dong["THONGTIN"],"SOLUONG" => $dong["SOLUONG"],"MALOAISP" => $dong["MALOAISP"],"PHANTRAMKM" => $phantramkm,"MATHUONGHIEU" => $dong["MATHUONGHIEU"],"LUOTMUA" => $dong["LUOTMUA"],"MANV" => $dong["MANV"],"TENNV" => $dong["TENNV"],"THONGSOKYTHUAT" => $chuoijsonchitiet));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 

	mysqli_close($conn);
			

?>