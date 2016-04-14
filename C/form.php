<?php

//連接資料庫
$dbServer="localhost";
$dbUser="root";
$dbPwd="123456";
$dbName="midterm";

$conn=mysqli_connect($dbServer,$dbUser,$dbPwd,$dbName); 

if(mysqli_connect_errno($conn))
	die("無法連接資料庫");
else
	echo "連接資料庫成功了!<br/>";

mysqli_set_charset($conn,"utf8");

$myTable='surl';
$myHost='$_SERVER['HTTP_HOST']';
$myUri=$_SERVER['PHP_SELF'];
$shortUrl="";

if(isset($_POST['longUrl']))
	$longUrl=$_POST['longUrl'];
else
	$longUrl="";

if($longUrl!=""){
	$stmt=mysqli_prepare($conn,"INSERT $myTable (url) VALUES (?)");

	mysqli_stmt_bind_param($stmt,'s',$longUrl);
	mysqli_stmt_bind_execute($stmt);

	$id=mysqli_insert_id($conn);

	$shortUrl="http://$myHost$myUri?id=$id";
}

elseif($id!=""){
	$stmt=mysqli_prepare($conn,"SELECT url FROM $myTable WHERE $id=?");

	mysqli_stmt_bind_param($stmt,'d','$id');

	mysqli_stmt_bind_execute($stmt);
}

	mysqli_stmt_bind_result($symt,$url);

	mysqli_stmt_fetch($stmt);

	header("Location:" .$url);

?>