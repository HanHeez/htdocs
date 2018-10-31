
<?php
	include_once("config.php");	

	$truyvancha = "SELECT * FROM thuonghieu th,chitietthuonghieu cth WHERE th.MATHUONGHIEU = cth.MATHUONGHIEU";
	$ketqua = mysqli_query($conn, $truyvancha);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {
						 // $chuoijson[] = $dong; 
			array_push($chuoijson, array("MASP" => $dong["MATHUONGHIEU"],"MALOAISP" => $dong["MATHUONGHIEU"],"TENSP" => $dong["TENTHUONGHIEU"],"ANHLON" => $dong["HINHLOAISPTH"]));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 

	mysqli_close($conn);
			

?>