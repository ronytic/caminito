<?php
date_default_timezone_set('America/La_Paz');
function connect(){
	$host="localhost";
	$user="root";
	$pass="";
	$db="csb2011";
	$l=mysql_connect($host,$user,$pass);
	if($l){
		if(mysql_select_db($db,$l)){
			mysql_query("SET NAMES utf8");
			return $l;
		}
		else{
			echo "Cannot select Data Base";
			exit();
		}
	}
	else{
		echo "Cannot connect Data Base";
		exit();
	}
}
?>