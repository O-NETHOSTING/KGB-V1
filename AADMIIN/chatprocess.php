<?php
session_start();

if(!$_SESSION["admin"]){
	header('location: index.php');	
} else {
define("GPANEL", "YES");
include "../config.php";
require('../includes/libs/Smarty.class.php');
include_once "../includes/function.php";
date_default_timezone_set("Europe/Belgrade");

if(isset($_GET['chat_send'])){
	$pristup_query = mysql_query("SELECT * FROM admin WHERE id='".$_SESSION["admin_id"]."'");
	$pristup_rows = mysql_num_rows($pristup_query);
	if($pristup_rows == 1)
	{
		while($pristup_row = mysql_fetch_assoc($pristup_query))
		{
			$ime = $pristup_row['fname'];
			$prez = $pristup_row['lname'];
			$vlasnik = $pristup_row['status'];
		}
	}
	global $vlasnik;
	if($vlasnik == "admin"){
		$boja = "color: red;";
	}else{
		$boja = "color: #0A93CC;";
	}
		
	$chat_text = htmlspecialchars($_POST['chat_text']);
	$chat_autor = '<span style="'. $boja .'">'. $ime .' '. $prez .'</span>';
	
	// Zastita za Javascript, Html i ostalo.
	$zamene = array
	(
		':D' => '<img src="http://ljuska.org/images/smilies/icon_e_biggrin.gif" />',
		':P' => '<img src="http://ljuska.org/images/smilies/nyam.gif" />',
		'o.o' => '<img src="http://forum.your.org/images/smilies/012.png" />',
		':)' => '<img src="http://forum.your.org/images/smilies/001.png" />',
		'-.-' => '<img src="http://forum.your.org/images/smilies/006.png" />',
		';)' => '<img src="http://ljuska.org/images/smilies/icon_e_wink.gif" />',
		':bot:' => '<img src="http://ljuska.org/images/smilies/suicide.gif" />',
		':relax:' => '<img src="http://ljuska.org/images/smilies/coffee.gif" />',
		':placko:' => '<img src="http://ljuska.org/images/smilies/smrthz.gif" />',
		':okej:' => '<img src="http://ljuska.org/images/smilies/iagree.gif" />',
                ':okej:' => '<img src="http://ljuska.org/images/smilies/iagree.gif" />',
                'picka' => 'pic*a',
		'kurac' => 'ku**c',
		':ljut:' => '<img src="http://ljuska.org/images/smilies/angry2.gif" />'
	);
	$chat_text = str_replace(array_keys($zamene), array_values($zamene), $chat_text);	
	
	$date=getdate(date("U"));
	$datum = "$date[mday] $date[month] $date[year], $date[hours]:$date[minutes]:$date[seconds]";
	
	$zamenee = array
	(
		'January' => 'Jan',
		'February' => 'Feb',
		'March' => 'Mar',
		'April' => 'Apr',
		'May' => 'Maj',
		'June' => 'Jun',
		'July' => 'Jul',
		'August' => 'Aug',
		'September' => 'Sep',
		'October' => 'Oct',
		'November' => 'Nov',	
		'December' => 'Dec'
	);	
	$datum = str_replace(array_keys($zamenee), array_values($zamenee), $datum);
	
	mysql_query('UPDATE admin SET lastactivity = "'.$_SERVER['REQUEST_TIME'].'" WHERE id="'.$_SESSION["admin_id"].'"');
	
	// Zabranjuje prazan text da se ispise
	if(empty($chat_text)){}
	else{
		if(empty($chat_autor)){
		}else{
			if($chat_text == "undefined"){
			}else{
				mysql_query("INSERT INTO chat_messages VALUES('". $chat_text ."', '". $chat_autor ."', '". $datum ."', '')");
				
			}
		}	
	}	
}

if(isset($_GET['chat_refresh'])){
	$query = mysql_query("SELECT * FROM chat_messages ORDER BY ID DESC LIMIT 40");
	if (mysql_num_rows($query) == 0){
		echo '<li><a style="margin-left: 5px; text-decoration: none;">Na chatu trenutno nema poruka!</a></li>';
	}
	while($row = mysql_fetch_assoc($query)){	
		echo '<aaa onclick="Chat_Izbrisi()" href="#" id="'.$row['ID'].'"><li><span id="autor">'. $row['Autor'] .' </span><span id="chatt">< '. $row['Datum'] .' ></span> '. $row['Text'] .'<span style="display: none;">'. $row['ID'] .'</span></li></a>';
	}
}

if(isset($_GET['online_refresh'])){
	$PosMin = time() - 1 * 300;
	$query = mysql_query("SELECT * FROM admin WHERE `lastactivity` >= '".$PosMin."'");
	$queryy = mysql_query("SELECT * FROM clients WHERE `lastactivity` >= '".$PosMin."'");
	if (mysql_num_rows($query) == 0){
		echo '<li><a style="margin-left: 5px; text-decoration: none;">Trenutno niko nije online!</a></li>';
	}
	while($row = mysql_fetch_assoc($query)){	
		echo '<li><img src="http://cdn1.iconfinder.com/data/icons/fugue/icon_shadowless/status.png" /> <span style="color: '.$row['boja'].';">'.$row['fname'].' '.$row['lname'].'</span></li>';
	}	
}

if(isset($_GET['clanovi_refresh'])){
	$PosMin = time() - 1 * 300;
	$query = mysql_query("SELECT * FROM clients WHERE `lastactivity` >= '".$PosMin."'");
	if (mysql_num_rows($query) == 0){
		echo '<li><a style="margin-left: 5px; text-decoration: none;">Trenutno niko nije online!</a></li>';
	}
	while($row = mysql_fetch_assoc($query)){	
		echo '<li><img src="http://cdn1.iconfinder.com/data/icons/fugue/icon_shadowless/status.png" /> <span style="color: '.$row['boja'].';">'.$row['fname'].' '.$row['lname'].'</span></li>';
	}	
}

if(isset($_GET['online_brojk'])){
	$PosMin = time() - 1 * 300;
	$klijenti = mysql_num_rows(mysql_query("SELECT * FROM clients WHERE `lastactivity` >= '".$PosMin."'"));	
	echo '<input class="btn btn-primary" type="button" value="Online: '.$klijenti.'" style="margin: 5px 10px 5px 10px;" onclick="Online_Brojk()" />';
}

if(isset($_GET['online_broja'])){
	$PosMin = time() - 1 * 300;
	$admini = mysql_num_rows(mysql_query("SELECT * FROM admin WHERE `lastactivity` >= '".$PosMin."'"));	
	echo '<input class="btn btn-primary" type="button" value="Online: '.$admini.'" style="margin: 5px 10px 5px 10px;" onclick="Online_Broja()" />';
}


if(isset($_GET['chat_delete_all'])){
	$ime = $_SESSION['adminusername'];
	$pristup_query = mysql_query("SELECT * FROM admin WHERE id='".$_SESSION["admin_id"]."'");
	$pristup_rows = mysql_num_rows($pristup_query);
	mysql_query('UPDATE admin SET lastactivity = "'.$_SERVER['REQUEST_TIME'].'" WHERE id="'.$_SESSION["admin_id"].'"');
	if($pristup_rows == 1)
	{
		while($pristup_row = mysql_fetch_assoc($pristup_query))
		{
			$vlasnik = $pristup_row['status'];
		}
	}
	global $vlasnik;	
	if($vlasnik == "admin"){
		mysql_query("DELETE FROM `chat_messages`");
	}else{
		echo"<script>alert('Nemate pristup ovoj komandi!');</script>";
	}	
}

if(isset($_GET['chat_delete'])){
	$chatid = $_GET['chat_delete'];
	mysql_query('UPDATE admin SET lastactivity = "'.$_SERVER['REQUEST_TIME'].'" WHERE id="'.$_SESSION["admin_id"].'"');
	mysql_query("DELETE FROM `chat_messages` WHERE ID = '".$chatid."'");
}
}
?>