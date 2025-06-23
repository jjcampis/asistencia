<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
	$host ="localhost";
	$usuario= "root"; 
	$pass = "";
	$link = mysql_connect($host,$usuario,$pass);
	mysql_select_db('alumnado',$link);
mysql_set_charset('utf8', $link);
?>