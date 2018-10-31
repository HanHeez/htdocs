	<?php
	include_once("config.php");	

	$truyvancha = "SELECT * FROM loaisanpham lsp WHERE lsp.TENLOAISP LIKE 'phụ kiện điện thoại%'";
	$ketqua = mysqli_query($conn, $truyvancha);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {

			//Lấy danh sách phụ kiện con
			$truyvanphukiencon = "SELECT * FROM loaisanpham lsp,sanpham sp WHERE lsp.MALOAI_CHA = ".$dong['MALOAISP']." AND lsp.MALOAISP = sp.MALOAISP ORDER BY sp.luotmua DESC LIMIT 10";

			$ketquacon = mysqli_query($conn, $truyvanphukiencon);			
						// $chuoijson[] = $dong; 
			if ($ketquacon) {
				while ($dongphukiencon = mysqli_fetch_array($ketquacon)) {
					array_push($chuoijson, array("MASP" => $dongphukiencon["MASP"],"MALOAISP" => $dongphukiencon["MALOAISP"],"TENSP" => $dongphukiencon["TENSP"],"GIA" => $dongphukiencon["GIA"]
				,"ANHLON" => $dongphukiencon["ANHLON"]));
				}
			}
		}
		
		
	} 
	echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);
	
	mysqli_close($conn);			

?>