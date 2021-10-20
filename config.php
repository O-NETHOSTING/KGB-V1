<?php
include_once("mysql.php");
error_reporting(0);
if(!defined('GPANEL')) die('Nije dozvoljeno na ovom klijentu');


$mysql_server = '';
$mysql_username = '';
$mysql_password = '';
$mysql_database = '';
$mysql_charset = 'utf8';
$link = 'https://link.com';
$configs["email"] = 'demo';
$configs["host"] = 'VAS HOSTING';

$connect = mysql_connect($mysql_server, $mysql_username, $mysql_password) or die('Cannot connect to database!');
$select = mysql_select_db($mysql_database) or die('Cannot select database!');
mysql_query('SET  NAMES \''.$mysql_charset.'\'',$connect);
?>