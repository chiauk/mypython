<?php

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

//編輯
if(!empty($_GET['edit'])){
	$sql="SELECT * FROM member_table WHERE 帳號='{$_GET['id']}'";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
}
else{
	header("Location:index.php");
}

?>