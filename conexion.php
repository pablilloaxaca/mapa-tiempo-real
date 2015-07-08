<?php 
$link = mysql_connect('localhost', 'userbd', 'passdb') or die ('No de puede conectar' . mysql_error());	
mysql_select_db("namebd", $link) or die('No se puede seleccionar la db');
mysql_query("SET NAMES utf8");
?>
