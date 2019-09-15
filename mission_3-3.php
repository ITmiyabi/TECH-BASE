<html>
<head>
<meta charset="utf-8">
<title>mission_3-3</title>
</head>
<body>
<form method="POST" action="mission_3-3.php">
    名前：<br>
    <input name="name" type="text"><br>
    コメント：<br>
    <input name="comment" type="text"><br><br>
    削除：<br>
    削除したい投稿番号を指定してください<input name="delete" type="tel" maxlength="3"><br>
    <br>
    <input  type="submit" value="送信">
    <br>
    <div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333;">
    <?php
      if($_POST!=null){
	header('Content-Type: text/html; charset=UTF-8');
	$name=$_POST["name"];
	$comment=$_POST["comment"];
	$delete=$_POST["delete"];

	//フォームに入力したものをファイルに追記
	$filename="mission_3-3.txt";
	$fp=fopen($filename,"a+");
	if($comment!=""){
		fwrite($fp,$name." : ".$comment."\n");
	}

	//削除機能
	$fileArray=file($filename);
	if($delete!=null){
		unset($fileArray[$delete-1]);
		file_put_contents($filename, $fileArray);
	}

	//ファイルを一行ずつ出力
	$i=0;//投稿番号
	foreach($fileArray as $fA){
		$i++;
		echo $i." : ".$fA."<br>";
	}

	//入力したものに不備があればその旨のメッセージを出す
	if(($name==null || $comment==null) && $delete==null){
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