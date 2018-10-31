<?php
	include_once("config.php");	

	$json = file_get_contents('php://input');
	$obj= json_decode($json, TRUE);	

	if (isset($_POST["maloaisp"]) && isset($_POST["limit"])) {
		$maloaisp = $_POST["maloaisp"];
		$limit = $_POST["limit"];
	} else {
		$maloaisp = $obj["maloaisp"];
		$limit = $obj["limit"];
	}	

	$truyvancha = "SELECT * FROM loaisanpham lsp,sanpham sp WHERE lsp.MALOAISP =".$maloaisp." AND lsp.MALOAISP = sp.MALOAISP ORDER BY sp.luotmua DESC LIMIT ".$limit.", 10";
	$ketqua = mysqli_query($conn, $truyvancha);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {
						// $chuoijson[] = $dong; 
			array_push($chuoijson, array("MASP" => $dong["MASP"],"TENSP" => $dong["TENSP"],"MALOAISP" => $dong["MALOAISP"],"GIA" => $dong["GIA"]
				,"ANHLON" => $dong["ANHLON"]));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 


	mysqli_close($conn);			

?>