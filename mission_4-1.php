<?php
	$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード名';
	$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

	echo "大丈夫だ、問題ない";
?>