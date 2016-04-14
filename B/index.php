<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<form name="form" method="post" action="">
數字A　<input type="int" name="A"><br>
數字B　<input type="int" name="B"><br>
<br>

<input type="submit" name="button" value="計算" />&nbsp;&nbsp;

</form>

<?php

$A=$_POST['A'];
$B=$_POST['B'];

function add(){
	$sum=$A+$B
	echo "A+B=$sum";
}

function sub(){
	$sum=$A-$B
	echo "A-B=$sum";
}

function c(){
	$sum=$A*$B
	echo "A*B=$sum";
}

function d(){
	$sum=$A/$B
	echo "A/B=$sum";
}

function e(){
	for($i=1;$i<$B;$i++)
		$sum=$A*$A
	echo "A的B次方=$sum";
}

function b3(){
	if($A*100+$B*10==($A+$B)*($A+$B) || $A*10+$B*1==($A+$B)*($A+$B)){
	for($i=1;$i<=$A;$i++){
		for($j=1;$j<=$B;$j++){
			if($A>99 && $B>9 && $A*100+$B*10==($A+$B)*($A+$B)){
				echo "此範圍內巧合數有$A和$$B"
			}
			else if($A>9 && $B>0 && $A*10+$B*1==($A+$B)*($A+$B){
					echo "此範圍內巧合數有$A和$$B"
				 }
		}
	}
}

}


?>