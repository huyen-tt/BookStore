<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'tdt';
 
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("データベースに接続できません");
mysqli_query($conn,"SET NAMES 'UTF8'");
//print_r ($conn);
?>