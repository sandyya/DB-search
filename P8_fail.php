<html>
<head>
<meta charset="utf-8" />
<title>P8_fail</title>
</head>
<body>
    <form method="post" action="P8_search.php">
        <h1>基本資料管理系統-查詢</h1>
        <hr size="1px" align="center" width="100%">
        <p><?php echo isset($_POST['No']) ? "編號：".$_POST['No'] : '' ?></p>
        <p><font color="#FF0000">!資料不存在!</font></p>
        <input type="submit" value="回到查詢畫面">
        <hr size="1px" align="center" width="100%">
    </form>
</body>
</html>