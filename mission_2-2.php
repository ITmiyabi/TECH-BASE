<html>
<head>
<meta charset="utf-8">
<title>mission_2-2 送信結果</title>
</head>
<body>
<?php
	header('Content-Type: text/html; charset=UTF-8');
	$comment=$_POST["comment"];
	if($comment!=""){
		$filename="mission_2-2.txt";
		$fp=fopen($filename,"w");
		fwrite($fp,$comment);
		fclose($fp);
	}else{
		echo "入力されていません。";
	}
?>
</body>
</html>