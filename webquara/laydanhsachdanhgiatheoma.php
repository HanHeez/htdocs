
<?php
	include_once("config.php");	

	$masp = $_POST["masp"];
	$limit = $_POST["limit"];
	$gioihanload = $_POST["gioihanload"];

	$truyvan = "SELECT * FROM danhgia WHERE MASP = ".$masp." ORDER BY NGAYDANG LIMIT ".$limit." ,".$gioihanload;

	
	$ketqua = mysqli_query($conn, $truyvan);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {					
			$chuoijson[] = $dong;
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 

	mysqli_close($conn);
			

?>