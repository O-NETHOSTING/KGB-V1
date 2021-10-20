<?php
session_start();
define("GPANEL", "YES");
include "config.php";

$email = $_GET["email"];
$password = $_GET["password"];
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);
$password = md5("$password");

// Test
$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$vreme = time();

$sql= mysql_query("SELECT * FROM clients WHERE email='$email' and password='$password'");
$count=mysql_num_rows($sql);
if($count=="1"){
$sql_arr = mysql_fetch_array($sql);
$_SESSION["id"]= $sql_arr["id"];
mysql_query("INSERT INTO ip_logs (ip,user_id,hostname,vreme) VALUES ('$ip','$_SESSION[id]','$hostname','$vreme')");
if($_GET["remember"]=="1"){
$_SESSION["remember"]="yes";	
}
if(isset($_SESSION["return_path"])){
echo $_SESSION["return_path"];
} else {
echo 'main.php';
};
}
?>