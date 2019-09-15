<html>
  <head>
    <title>mission1-3</title>
    <meta charset="utf-8">
  </head>

  <body>
    <?php
	//テキストファイルの読み込み
	$filename="mission_1-3.txt";
	$fp=fopen($filename,"r");
	while(!feof($fp)){
		$line=fgets($fp);
		print $line."<br>\n";
	}
	fclose($fp);
    ?>
  </body>
</html>