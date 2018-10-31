<?php
//ket noi databse : server, user, password , tendatabase

$connect = mysqli_connect("localhost","root","","quanlysinhvien");

if ($connect) {
	echo "Ket noi thanh cong";
} else {
	echo "Failed";
}
?>