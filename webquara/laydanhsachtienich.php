<?php
	include_once("config.php");	

	$truyvancha = "SELECT * FROM loaisanpham lsp WHERE lsp.MALOAI_CHA = 82";
	$ketqua = mysqli_query($conn, $truyvancha);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {

			//Lấy danh sách phụ kiện con
			$truyvantienich = "SELECT * FROM loaisanpham lsp,sanpham sp WHERE lsp.MALOAI_CHA = ".$dong['MALOAISP']." AND lsp.MALOAISP = sp.MALOAISP ORDER BY sp.luotmua";

			

			$ketquacon = mysqli_query($conn, $truyvantienich);			
						// $chuoijson[] = $dong; 
			if ($ketquacon) {
				while ($dongtienich = mysqli_fetch_array($ketquacon)) {
					array_push($chuoijson, array("MASP" => $dongtienich["MASP"],"MALOAISP" => $dongtienich["MALOAISP"],"TENSP" => $dongtienich["TENLOAISP"],"GIA" => $dongtienich["GIA"]
				,"ANHLON" => $dongtienich["ANHLON"]));
				}
			}
		}
		
		
	} 
	echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);
	
	mysqli_close($conn);			

?>