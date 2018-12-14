<?php
	$n=$_GET[Name];
	$e=$_GET[Email];
	$t=$_GET[Textcontent];

	$name=$_POST[Name];
	$email=$_POST[Email];
	$content=$_POST[Textcontent];


echo "$n<br>";
echo "$e<br>";
echo "$t<br>";

echo "$name<br>";
echo "$email<br>";
echo "$content<br>";

 ?>

 <?php

$sql_upd = "UPDATE result SET name = '$name' , email = '$email' , textarea = '$content' WHERE name = '$n' AND email = '$e' AND textarea = '$t'";

$db_server = "localhost";
$db_user = "kevin";
$db_password = "kevinxd";
$db_name = "result";
$link = mysqli_connect($db_server,$db_user,$db_password); //連結伺服器,登入
mysqli_select_db($link,"text_board");//選擇資料庫
mysqli_query($link,"set names utf8");//以utf-8讀取資料,讓資料可以讀取中文
mysqli_query($link,"select * from $db_name");//選擇從result資料表中讀取所有的資料




mysqli_query($link,$sql_upd)or die ("<br>無法修改".mysql_error()); //執行sql語法
mysqli_close($link); //關閉資料庫連結
header( "location:index.php");  //回index.php


  ?>
