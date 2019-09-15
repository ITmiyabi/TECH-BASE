<html>
<head>
<meta charset="utf-8">
<title>mission_3-4edit</title>
</head>
<body>
<form method="POST" action="mission_3-4edit.php">
    <font size="4"><b>編集</b></font><br>
    編集後の名前：<input name="editname" type="text"><br>
    編集後のコメント：<input name="editcomment" type="text"><br>
    <br>
    <input  type="submit" value="送信">
    <br>

    <div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333;">
    <?php
    $editnumber=$_POST["editnumber"];
    $editname=$_POST["editname"];
    $editcomment=$_POST["editcomment"];

    $filename="mission_3-4.txt";
    $fp=fopen($filename,"a+");
    $fileArray=file($filename);//ファイルの中身を配列に変換

    //編集
    if($editname!=null && $editcomment!=null){
	$fileArray[$editnumber-1]=$editname." : ".$editcomment."\n";
	file_put_contents($filename, $fileArray);
    }
    fclose($fp);

    ?>
    </div>
</form>
</body>
</html>