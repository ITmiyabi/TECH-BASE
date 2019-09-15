<?php
	$hensu="hello world";
	$filename="misssion_1-2.txt";
	$fp=fopen($filename,"w");
	fwrite($fp,$hensu);
	fclose($fp);
?>