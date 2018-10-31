
<?php
	include_once("config.php");

	$maloaicha = $_POST['maloaicha'];

	$truyvancha = "SELECT * FROM loaisanpham WHERE MALOAI_CHA =".$maloaicha;
	$ketqua = mysqli_query($conn, $truyvancha);
	$chuoijson = array();	

	if ($ketqua) {
		while ($dong = mysqli_fetch_array($ketqua)) {
						// $chuoijson[] = $dong; 
			array_push($chuoijson, array("TENLOAISP" => $dong["TENLOAISP"],"MALOAISP" => $dong["MALOAISP"],"MALOAI_CHA" => $dong["MALOAI_CHA"]));
		}
		echo json_encode($chuoijson,JSON_UNESCAPED_UNICODE);	
	} 

	mysqli_close($conn);
			

?>
