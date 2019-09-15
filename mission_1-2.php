<?php
	$moji="TECH - BASE";
	$filename="mission_1-2.txt";
	$fp=fopen($filename,"w");
	fwrite($fp,$moji);
	fclose($fp);
?>