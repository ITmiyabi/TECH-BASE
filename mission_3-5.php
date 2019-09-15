<html>
<head>
<meta charset="utf-8">
<title>mission_3-5</title>
</head>
<body>
<form method="POST" action="mission_3-5.php">
    <font size="5"><b>新規投稿</b></font><br>
    名前：<input name="name" type="text"><br>
    コメント：<input name="comment" type="text"><br>
    パスワード：<input name="password" type="text"><br>
    <br>
    <font size="5"><b>削除</b></font><br>
    削除したい投稿番号：<input name="delete" type="tel" maxlength="3"><br>
    パスワード：<input name="deletepassword" type="text"><br>
    <br>
    <font size="5"><b>編集</b></font><br>
    編集したい投稿番号：<input name="editnumber" type="tel" maxlength="3"><br>
    編集後の名前：<input name="editname" type="text"><br>
    編集後のコメント：<input name="editcomment" type="text"><br>
    パスワード：<input name="editpassword" type="text"><br>
    <br>
    <input type="submit" value="送信">
    <br><br>

    <div style="padding: 10px; margin-bottom: 10px; border: 5px double #333333;">
    <?php
    $name=$_POST["name"];
    $comment=$_POST["comment"];
    $delete=$_POST["delete"];
    $editnumber=$_POST["editnumber"];
    $editname=$_POST["editname"];
    $editcomment=$_POST["editcomment"];
    $password=$_POST["password"];
    $deletepw=$_POST["deletepassword"];
    $editpw=$_POST["editpassword"];

    $filename="mission_3-5.txt";
    $fp=fopen($filename,"a+");
    $fileArray=file($filename);//ファイルの中身を配列に変換

    //パスワード保存用ファイル
    $pwfilename="mission_3-5password.txt";
    $pwfp=fopen($pwfilename,"a+");
    $pwArray=file($pwfilename);



    //新規投稿
    if($name!=null && $comment!=null && $password!=null){
	//フォームに入力したものをファイルに追記
	$fileArray[]=$name." : ".$comment."\n";
	file_put_contents($filename, $fileArray);
	$pwArray[]=$password."\n";
	file_put_contents($pwfilename, $pwArray);
    }

    //削除
    elseif($delete!=null && $deletepw!=null){
	if(strcmp($deletepw."\n",$pwArray[$delete-1])==0){
		unset($fileArray[$delete-1]);
		file_put_contents($filename, $fileArray);
		unset($pwArray[$delete-1]);
		file_put_contents($pwfilename, $pwArray);
	}else{
		echo "<br>パスワードが違います。<br>";
	}
    }

    //編集
    elseif($editnumber!=null && $editname!=null && $editcomment!=null && $editpw!=null){
	if(strcmp($editpw."\n",$pwArray[$editnumber-1])==0){
		$fileArray[$editnumber-1]=$editname." : ".$editcomment."\n";
		file_put_contents($filename, $fileArray);
	}else{
		echo "<br>パスワードが違います。<br>";
	}
    }

    //初期表示
    elseif($_POST==null){
	echo "<br>掲示板へようこそ！<br>";
    }

    //ここまでの条件にひっかかなければ入力したものに不備があるのでその旨のメッセージを出す
    else{
	echo "<br>入力に不備がありました。もう一度入力してください。<br>";
    }

    //ファイルを一行ずつ出力
    $i=0;//投稿番号
    foreach($fileArray as $fA){
	$i++;
	echo $i." : ".$fA."<br>";
    }
    fclose($pwfp);
    fclose($fp);

    ?>
    </div>
</form>
</body>
</html>