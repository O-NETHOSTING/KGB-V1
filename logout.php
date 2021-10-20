<?php
session_start();
if($_GET["admin"]){
session_destroy();
} else {
unset($_SESSION["id"]);	
unset($_SESSION["remember"]);
}
define("GPANEL", "YES");
include "config.php";
include "includes/function.php";
$test = $_SERVER['REQUEST_TIME']-900;
mysql_query('UPDATE admin SET lastactivity = "'.$test.'" WHERE id="'.$_SESSION["admin_id"].'"');
mysql_close();
header("location:index.php");
?>