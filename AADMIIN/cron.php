<?php
define("GPANEL", "YES");
include "../config.php";
include "funkcije.php";
include "../includes/function.php";

// Suspendovanje isteklih servera nakon 5 dana

$vreme = time() + (-5 * 24 * 60 * 60);
mysql_query("UPDATE serveri SET status=Suspendovan, startovan=0 WHERE istice < '".date("Y-m-d", $vreme)."'");


// BOX INFO 


$box = mysql_query('SELECT * FROM box');
while($row = mysql_fetch_array($box)){
$pass = base64_decode($row["password"]);	

$queri = server_status($row["ip"], $row["ssh_port"], $row["username"], $pass);
$status = get_string_between($queri, '%ni, ', 'id,');

$abdejt = mysql_query('UPDATE box SET slobodan="'.$status.'" WHERE id='.$row["id"].'');

}


// GAŠENJE NEAKTIVI A STARTOVANI SERVERA

$serveri = mysql_query('SELECT * FROM serveri WHERE status="Suspendovan"');
while($row = mysql_fetch_array($serveri)){
$ip = mysql_fetch_array(mysql_query('SELECT * FROM ip WHERE id='.$row["ip_id"].''));	
$test = cs_scan($ip["ip"], $row["port"]);
/*print_r($test);*/

if($test["mapname"]=='-'){
$trenutni_status = 'Ne radi';	
} else {
$trenutni_status = 'Radi';	
}

if($trenutni_status=='Radi'){
$box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id='.$row["box_id"].''));		
$pass = base64_decode($box["password"]);	
stop_server($box["ip"], $box["ssh_port"], $row["username"], $row["password"]);	
}

}


// STARTOVANJE STARTOVANI SERVERA A KOJI NE RADE

$serveri = mysql_query('SELECT * FROM serveri WHERE status="Aktivan" AND startovan=1 AND port BETWEEN 26015 AND 39999');
while($row = mysql_fetch_array($serveri)){
$ip = mysql_fetch_array(mysql_query('SELECT * FROM ip WHERE id='.$row["ip_id"].''));	
$test = cs_scan($ip["ip"], $row["port"]);
/*print_r($test);*/

if($test["mapname"]=='-'){
$trenutni_status2 = 'Ne radi';	
} else {
$trenutni_status2 = 'Radi';	
}

if($trenutni_status2=='Ne radi'){
	
$box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id='.$row["box_id"].''));		
$pass = base64_decode($box["password"]);

$server_mod2 = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$row["mod"].'\''));

$ip_ip = $ip["ip"];
$port = $row["port"];
$slots = $row["slotovi"];
$map = $row["map"];

$komanda = $server_mod2["komanda"]; 

$komanda = str_replace('{$ip}', "$ip_ip", $komanda);
$komanda = str_replace('{$port}', "$port", $komanda);
$komanda = str_replace('{$slots}', "$slots", $komanda);
$komanda = str_replace('{$map}', "$map", $komanda);


stop_server($box["ip"], $box["ssh_port"], $row["username"], $row["password"]);	
sleep(3);
start_server($box["ip"], $box["ssh_port"], $row["username"], $row["password"], $komanda);	
}

echo ''.$ip["ip"].':'.$row["port"].' '.$trenutni_status2.'<br />';
}

?>