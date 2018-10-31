<?php
	include_once("config.php");	
	
	$ngayhientai = date("Y/m/d");

	$truyvan = "SELECT * FROM khuyenmai km,loaisanpham lsp WHERE DATEDIFF(km.NGAYKETTHUC,'".$ngayhientai."') >=0 AND km.MALOAISP = lsp.MALOAISP";
	$ketqua = mysqli_query($conn, $truyvan);

	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {
			
			$truyvanchitietkm = "SELECT * FROM chitietkhuyenmai ctkm,sanpham sp WHERE ctkm.MAKM = '".$dong["MAKM"]."' AND ctkm.MASP = sp.MASP";
			$ketquakm = mysqli_query($conn, $truyvanchitietkm);

			$chuoijsondssp = array();

			if ($ketquakm) {
				while ($dongkm = mysqli_fetch_array($ketquakm)) {
					$chuoijsondssp[] = $dongkm;
				}
			}

			array_push($chuoijson,array("MAKM"=>$dong["MAKM"],"NGAYBATDAU"=>$dong["NGAYBATDAU"],"NGAYKETTHUC"=>$dong["NGAYKETTHUC"],"MALOAISP"=>$dong["MALOAISP"],"TENLOAISP"=>$dong["TENLOAISP"],"TENKM"=>$dong["TENKM"],"HINHKHUYENMAI"=>$dong["HINHKHUYENMAI"],"DANHSACHSANPHAM"=>$chuoijsondssp));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 


	mysqli_close($conn);			

?>