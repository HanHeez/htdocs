<?php
	include_once("config.php");	

	$maloaith = $_POST["maloaith"];
	$limit = $_POST["limit"];

	$truyvancha = "SELECT * FROM thuonghieu th,sanpham sp WHERE th.MATHUONGHIEU =".$maloaith." AND th.MATHUONGHIEU = sp.MATHUONGHIEU ORDER BY sp.luotmua DESC LIMIT ".$limit.", 20";
	$ketqua = mysqli_query($conn, $truyvancha);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {
						// $chuoijson[] = $dong; 
			array_push($chuoijson, array("MASP" => $dong["MASP"],"TENSP" => $dong["TENSP"],"MALOAISP" => $dong["MALOAISP"],"GIA" => $dong["GIA"]
				,"ANHLON" => $dong["ANHLON"]
			,"ANHNHO" => $dong["ANHNHO"]));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 



	mysqli_close($conn);			

?>