<html>
<head>
<meta charset="utf-8" />
<title>P8_search</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION["success"])){
	if($_SESSION["success"]=="yes"){
		header("Location:P8_success.php");
	}elseif($_SESSION["fail"]=="yes"){
		header("Location:P8_fail.php");
	}
}elseif(isset($_SESSION["fail"])){
	if($_SESSION["fail"]=="yes"){
		header("Location:P8_fail.php");
	}
}



if ( isset($_POST["Query"]) ) {
	// 取得SQL指令
	$sql="SELECT * FROM users where No=";
	// 開啟MySQL的資料庫連接
	$link = mysqli_connect("localhost", "root","","testdb") or die("無法開啟MySQL資料庫連接!<br/>");
		mysqli_select_db($link, "myschool");  // 選擇myschool資料庫
    //送出UTF8編碼的MySQL指令
	mysqli_query($link, 'SET NAMES utf8'); 
	// 執行SQL查詢
	$result = @mysqli_query($link, $sql); 
	$_POST['No'];
	if ( mysqli_errno($link) != 0 ) {
		header("Location:P8_fail.php");
	} 
	else { 
		echo "<table border=1 align=center>";
		echo "<tr>";
		while ( $meta = mysqli_fetch_field($result) )
			echo "<td><small>".$meta->name."</small></td>";
		echo "</tr>";
		// 取得欄位數
		$total_fields = mysqli_num_fields($result);
		while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
			echo "<tr>";
			for ( $i = 0; $i < $total_fields; $i++ )
				echo "<td><small>".$rows[$i]."</small></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	mysqli_close($link); // 關閉資料庫連接
	}
else
	$sql = "SELECT * FROM users where No="; 
?>
<form method="post" action="P8_search.php">
<h1>基本資料管理系統-查詢</h1>

<hr size="1px" align="center" width="100%">


<p>編號：<input type="text" name="No" cols="50"></p>
<input type="submit" name="Query" value="查詢">
<input type="reset" value="清除">

<hr size="1px" align="center" width="100%">
</form>
</body>
</html>