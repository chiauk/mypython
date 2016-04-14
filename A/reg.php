<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form name="form" method="post" action="">
帳號 <input type="text" name="id"><br/>
密碼 <input type="password" name="pw"><br/>
email <input type="text" name="email"><br/>
電話 <input type="text" name="telephone"><br/>

<br/>

<input type="submit" name="button" value="確定">

</form>

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

if(!empty($_POST['id'])){
	//判斷帳密是否為空值
	$id=$_POST['id'];
	$pw=$_POST['pw'];
	$email=$_POST['email'];
	$telephone=$_POST['telephone'];

	if($id!=null && $pw!=null){
		//新增資料進資料庫
		//$sql="SELECT * FROM member_table ";
		$sql="INSERT INTO member_table(帳號,密碼,email,電話) 
					VALUES ('$id','$pw','$email','$telephone')";
		if(mysqli_query($conn,$sql)){
			echo '新增成功<br/>';
			echo "<a href='log.php'>返回登入頁</a>";
			//echo '<a href='http-equiv=REFRESH CONTENT=2;url=z_index.php'>返回登入頁</a>;
		}
		else{
			echo '新增失敗<br/>';
			echo "<a href='log.php'>返回登入頁</a>";
			//echo '<meta http-equiv=REFRESH CONTENT=2;url=z_index.php>';
		}
	}
	else{
		echo '您的資料可能不完整<br/>';
		echo "<a href='log.php'>返回登入頁</a>";
		//echo '<meta http-equiv=REFRESH CONTENT=2;urlz_index.php>';
	}
}
else
	echo "請依序填入資料";

?>