<?php
require('jwt.php');

$token = array();
$token['id'] = 8888;
$token['hoten'] = 'Nguyen Huynh Long';
$token['email'] = 'luhansmilex@gmail.com';

$jsonWebToken = JWT::encode($token,'SECRET_CODE_GI_DO');

echo JsonHelper::getJson('token', $jsonWebToken);
?>
