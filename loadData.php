<?php


$filename='firstnames.out';
$firstname = file($filename, FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
//var_dump($firstname);
$filename2='lastnames.out';
$lastname= file($filename2, FILE_IGNORE_NEW_LINES| FILE_SKIP_EMPTY_LINES);
//var_dump($lastname);

if (!$link = mysql_connect('localhost', 'root', 'sidj1994')) {
    echo 'Could not connect to mysql';
    exit;
}

if (!mysql_select_db('raj', $link)) {
    echo 'Could not select database';
    exit;
}

foreach ($firstname as $fname) {
	$tempstr='';
	$i=0;
	foreach ($lastname as $lname) {
		# code...
		if($i!=0)$tempstr.=',';
		$i=1;
		$tempstr.="('$fname','$lname')";
	}
	$sql="INSERT ignore INTO `names`(`first_name`, `last_name`) VALUES $tempstr";
	mysql_query($sql, $link);
	echo '.';
}

$sql="";

mysql_free_result($result);

?>
