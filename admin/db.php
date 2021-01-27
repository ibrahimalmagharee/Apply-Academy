<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'admin';
$conn = mysqli_connect($host, $user, $pass, $db);

mysqli_set_charset($conn,'utf8');
mysqli_query($conn,"SET NAMES 'utf8'");

