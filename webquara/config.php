<?php
	define("DBSERVER","localhost");
	define("DBUSERNAME",'root');
	define("DBPASSWORD","");
	define("DBNAME", "quara");

	date_default_timezone_set("Asia/Ho_Chi_Minh");

	$conn = mysqli_connect(DBSERVER,DBUSERNAME,DBPASSWORD,DBNAME);
	$conn->set_charset("utf8");
?>