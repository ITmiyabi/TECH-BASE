<html>
<head>
<meta charset="utf-8">
<title>mission_5-1</title>
</head>
<body>
<form method="POST" action="mission_5-1.php">
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
	//データベース接続
	$dsn = 'データベース名';
		$user = 'ユーザー名';
		$password = 'パスワード名';
		$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	//テーブル作成
	$sql = "CREATE TABLE IF NOT EXISTS information"
	." ("
	. "id INT AUTO_INCREMENT PRIMARY KEY,"
	. "name char(32),"
	. "comment TEXT,"
	. "password TEXT"
	.");";
	$stmt = $pdo->query($sql);

	//フォームから入力されたデータの設定
	$fname=$_POST["name"];
	$fcomment=$_POST["comment"];
	$delete=$_POST["delete"];
	$editnumber=$_POST["editnumber"];
	$editname=$_POST["editname"];
	$editcomment=$_POST["editcomment"];
	$pw=$_POST["password"];
	$deletepw=$_POST["deletepassword"];
	$editpw=$_POST["editpassword"];

	//新規投稿
	if($fname!=null && $fcomment!=null && $pw!=null){
		//フォームに入力したものをテーブルに追記
		$sql = $pdo -> prepare("INSERT INTO information (name, comment,password) VALUES (:name, :comment, :password)");
		$sql -> bindParam(':name', $name, PDO::PARAM_STR);
		$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
		$sql -> bindParam(':password', $password, PDO::PARAM_STR);
		$name = $fname;
		$comment = $fcomment;
		$password = $pw;
		$sql -> execute();
    	}

	//削除
	elseif($delete!=null && $deletepw!=null){
		$sql = 'DELETE FROM information WHERE password=:password';
		$stmt = $pdo->prepare($sql);
		$params = array(':password'=>$deletepw);
		$stmt->execute($params);
	}

	//編集
	elseif($editnumber!=null && $editname!=null && $editcomment!=null && $editpw!=null){
		$sql = 'UPDATE information SET name=:name,comment=:comment WHERE id=:id AND password=:password';
		$stmt = $pdo->prepare($sql);
		$params = array(':id'=>$editnumber,':name'=>$editname,':comment'=>$editcomment,':password'=>$editpw);
		$stmt->execute($params);
    	}

	//初期表示
	elseif($_POST==null){
		echo "<br>掲示板へようこそ！<br>";
    	}

	//ここまでの条件にひっかかなければ入力したものに不備があるのでその旨のメッセージを出す
	else{
		echo "<br>入力に不備がありました。もう一度入力してください。<br>";
	}

	//テーブルを出力
	$sql = 'SELECT * FROM information';
	$stmt = $pdo->query($sql);
	$results = $stmt->fetchAll();
	foreach ($results as $row){
		echo $row['id'].' : ';
		echo $row['name'].' : ';
		echo $row['comment'].'<br>';
		echo "<hr>";
	}
    ?>
    </div>
</form>
</body>
</html>