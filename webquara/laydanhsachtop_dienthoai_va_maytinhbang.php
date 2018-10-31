<?php
	include_once("config.php");	

	$truyvancha = "SELECT * FROM loaisanpham lsp,sanpham sp WHERE lsp.TENLOAISP LIKE 'điện thoại%' AND lsp.MALOAISP = sp.MALOAISP ORDER BY sp.luotmua DESC LIMIT 10";
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