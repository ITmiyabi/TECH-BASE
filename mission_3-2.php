<html>
<head>
<meta charset="utf-8">
<title>mission_3-2</title>
</head>
<body>
<form method="POST" action="mission_3-2.php">
    名前：<br>
    <input name="name" type="text"><br>
    コメント：<br>
    <input name="comment" type="text"><br>
    <br>
    <input  type="submit" value="送信">
    <br>
    <div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333;">
    <?php
      if($_POST!=null){
	header('Content-Type: text/html; charset=UTF-8');
	$name=$_POST["name"];
	$comment=$_POST["comment"];
	$filename="mission_3-2.txt";
	$fp=fopen($filename,"a+");
	if($comment!=""){
		fwrite($fp,$name." : ".$comment."\n");
	}
	$fileArray=file($filename);
	foreach($fileArray as $fA){
		echo $fA."<br>";
	}
	if($name==null || $comment==null){
		echo "<br>名前かコメントに何も書かれていませんでした。もう一度入力してください。<br>";
	}
	fclose($fp);
      }else{
	echo "<br>名前とコメントを入力してください。<br>";
      }
    ?>
    </div>
</form>
</body>
</html>