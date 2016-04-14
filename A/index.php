<?php
session_start();

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

//開始判斷帳號正確性
$id=$_POST['id'];
$pw=$_POST['pw'];

//搜尋資料庫資料
$sql="SELECT 帳號,密碼 FROM member_table WHERE 帳號=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員

if($id!=null && $pw!=null && $row[0]==$id && $row[1]==$pw){
	//計算登站次數
	$counter=1;

	if(isset($_COOKIE['counter'])){
		if(isset($_SESSION['entered']))
			$counter=$_COOKIE['counter'];
		else
			$counter=$_COOKIE['counter']+1;

	//將帳號寫入session，方便驗證使用者身份
	$_SESSION['username']=$id;  
	echo '登入成功!';

	}
	//紀錄登站時間
	date_default_timezone_set('Asia/Taipei');

	echo "$id 歡迎回來<br/>";
	echo "您的登入次數為 $counter<br/>";
	//echo "您的上一次登入時間為 $_SESSION['enterTime']<br/>";

	if(!isset($_SESSION['enterTime']))
		$_SESSION['enterTime']=time();

	setcookie("counter",$counter,time()+24*3600);

	$_SESSION['entered']=TRUE;

	//echo '<meta http-equiv=REFRESH CONTENT=1;url=z_member.php>';

	echo "<a href='checkdel.php'>刪除帳號</a>"
	echo "<a href='profile.php'>編輯個人資料</a></td></tr>";
}
else{
	echo "登入失敗!<br/>";
	echo "<a href='log.php'>返回登入頁</a>";
	//echo '<meta http-equiv=REFRESH CONTENT=1;url=z_index.php>';
}


?>