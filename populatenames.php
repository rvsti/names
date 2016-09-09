<?php 

//phpinfo();die;
ini_set('display_errors', '1');
echo "hi";
$server = 'localhost';
$user = 'root';
$pass = 'rajv';
$dbname= 'raj';
$con = mysql_connect($server, $user, $pass) or die("Can't connect");
mysql_select_db($dbname,$con);

$res=mysql_db_query('show create table names ');
echo mysql_fetch_assoc(res);
echo "ddddddddd";

?>
