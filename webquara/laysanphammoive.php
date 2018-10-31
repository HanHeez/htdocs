
<?php
	include_once("config.php");	

	$truyvancha = "SELECT * FROM sanpham ORDER BY MASP DESC LIMIT 20";
	$ketqua = mysqli_query($conn, $truyvancha);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {
						// $chuoijson[] = $dong; 
			array_push($chuoijson, array("MASP" => $dong["MASP"],"GIA" => $dong["GIA"],"MALOAISP" => $dong["MALOAISP"],"TENSP" => $dong["TENSP"],"ANHLON" => $dong["ANHLON"]));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 

	mysqli_close($conn);
			

?>