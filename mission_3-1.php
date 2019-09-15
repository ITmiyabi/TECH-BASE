<html>
<head>
<meta charset="utf-8">
<title>mission_3-1</title>
</head>
<body>
    <?php
	header('Content-Type: text/html; charset=UTF-8');
	$name=$_POST["name"];
	$comment=$_POST["comment"];
	$filename="mission_3-1.txt";
	$fp=fopen($filename,"w");
	fwrite($fp,$name." : ".$comment."\n");
	fclose($fp);
    ?>
</form>
</body>
</html>