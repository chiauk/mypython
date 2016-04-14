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

//刪除
if($_GET['del']!=''){
	//將del參數所指定的編號的紀錄刪掉
	$sql="DELETE FROM member_table WHERE '帳號'='{$_GET['del']}'";
	mysqli_query($conn,$sql);

	$rowDeleted=mysqli_affected_rows($conn);

	if($rowDeleted>0){
		echo '<br>刪除成功';
		echo '<br>已刪除了'.$rowDeleted.'筆資料';	
	}
	else{
		echo '刪除失敗';
	}

}

?>