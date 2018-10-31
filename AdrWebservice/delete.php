<?php

require "dbconnect.php";

$idSV = $_POST['idCuaSV'];

$query = "DELETE FROM student WHERE id = '$idSV'";

if (mysqli_query($connect, $query)) {

	echo "success";

} else { 
	echo "error";
}

?>