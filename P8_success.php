<html>
<head>
<meta charset="utf-8" />
<title>P8_fail</title>
</head>
<body>
    <h1>基本資料管理系統-查詢</h1>
    <hr size="1px" align="center" width="100%">
    <form method="post" action="P8_search.php">
    <?php
        // 是否是表單送回
        if ( isset($_POST["Query"]) ) {
            // 取得SQL指令
            $sql = "SELECT * FROM users WHERE No=".$_POST["No"];
            // 開啟MySQL的資料庫連接
            $link = mysqli_connect("localhost", "root", "", "testdb") 
            or die("無法開啟MySQL資料庫連接!<br/>");
            //送出UTF8編碼的MySQL指令
            mysqli_query($link, 'SET NAMES utf8');
            // 執行SQL查詢
            $result = mysqli_query($link, $sql);
            if ($result) {
                // 返回資料筆數
                $rowcount = mysqli_num_rows($result);
                // echo var_dump($rowcount);
                if ($rowcount > 0) {
                    // 取得欄位數值
                    while ($rows = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<p>編號：".$rows[0]."</p>";
                        echo "<p>姓名：".$rows[1]."</p>";
                        echo "<p>地址：".$rows[2]."</p>";
                        echo "<p>電話：".$rows[3]."</p>";
                        echo "<p>生日：".$rows[4]."</p>";
                        echo "<p>Email：".$rows[5]."</p>";
                        echo "<p>等級：".$rows[6]."</p>";
                        // echo var_dump($rows);
                    }
                    mysqli_free_result($result);
                }
                else {
                    header("Location:P8_fail.php");
                }
            }
            else if ( mysqli_errno($link) != 0 ) {
                header("Location:P8_fail.php");
            }

            mysqli_close($link); // 關閉資料庫連接
        }
        else {
            header("Location:P8_fail.php");  
        }
    ?>
        <input type="submit" value="回到查詢畫面">
        <hr size="1px" align="center" width="100%">
    </form>
</body>
</html>