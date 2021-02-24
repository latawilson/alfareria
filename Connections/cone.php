<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
// $hostname_cone = "localhost";
// $database_cone = "bd_ver1";
// $username_cone = "root";
// $password_cone = "";
// 
$hostname_cone = "alfareriabd.cn3hw4ruastd.us-east-2.rds.amazonaws.com";
$database_cone = "bd_ver1";
$username_cone = "admin";
$password_cone = "admin1234";	

$cone = mysql_pconnect($hostname_cone, $username_cone, $password_cone) or trigger_error(mysql_error(),E_USER_ERROR); 
?>