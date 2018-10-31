<?php
$token = $_GET['token'];

require('jwt.php');

$json = JWT::decode($token, 'SECRET_CODE_GI_DO', true);
echo json_encode($json);
?>