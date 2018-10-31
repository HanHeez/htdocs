<?php
	include_once("config.php");	

	$tensp = $_POST["tensp"];
	$limit = $_POST["limit"];

	$ngayhientai = date("Y/m/d");
	$truyvan = "SELECT *, DATEDIFF(km.NGAYKETTHUC,'".$ngayhientai."') AS THOIGIANKM FROM sanpham sp,khuyenmai km, chitietkhuyenmai ctkm WHERE DATEDIFF(km.NGAYKETTHUC,'".$ngayhientai."') >=0 AND sp.TENSP LIKE '%".$tensp."%' AND sp.MASP = ctkm.MASP and ctkm.MAKM = km.MAKM ORDER BY sp.MASP LIMIT ".$limit.", 20";
	
	$ketqua = mysqli_query($conn, $truyvan);

	$chuoijson = array();	

	if ($ketqua) {		
		while ($dong = mysqli_fetch_array($ketqua)) {			
			$phantramkm = 0;
			$thoigiankm = $dong["THOIGIANKM"];

			if ($thoigiankm >= 0) {
				$phantramkm = $dong["PHANTRAMKM"];
			}
					
			array_push($chuoijson, array("MASP" => $dong["MASP"],"TENSP" => $dong["TENSP"],"GIA" => $dong["GIA"],"ANHLON" => $dong["ANHLON"],"PHANTRAMKM" => $dong["PHANTRAMKM"],"MANV" => $dong["MANV"]));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 


	mysqli_close($conn);			

?>