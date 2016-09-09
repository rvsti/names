<?php
if (!$link = mysql_connect('localhost', 'root', 'rajv')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('raj', $link)) {
    echo 'Could not select database';
    exit;
}

$arrReturn=array_merge($_GET,$_POST);

$partQry="";

if(isset($arrReturn['fname']))$partQry.=" and first_name like '%".$arrReturn['fname']."%' ";
if(isset($arrReturn['lname']))$partQry.=" and last_name like '%".$arrReturn['lname']."%' ";

$sql    = "SELECT * FROM names where 1 $partQry limit 5";
//$sql = 'show create table names';
$result = mysql_query($sql, $link);

if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_assoc($result)) {
  $arrname[]=($row);  
//echo $row['foo'];
}
echo json_encode($arrname);

mysql_free_result($result);
?>
