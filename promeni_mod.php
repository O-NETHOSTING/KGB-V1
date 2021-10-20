<?php
session_start();
define("GPANEL", "YES");
include "config.php";
if(isset($_SESSION["id"])){
if(intval($_POST['srv_id'])){

$id = intval($_POST["srv_id"]);	
$id = stripslashes($id);
$id = mysql_real_escape_string($id);
					
$server = mysql_query("SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id='".$id."' and serveri.user_id='".$_SESSION["id"]."'");
					
$provjera=mysql_num_rows($server);	

if($provjera=="1"){
	
$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$_SESSION["id"].''));
if($klijent["email"]==$configs["email"]){
echo 'Ova akcija nije dozvoljena demo klijentu.';	
} else {
	if($_POST["akcija"]=="gethtml"){
	$server_ba_info = mysql_fetch_array($server);
	$mod_info_ba = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id='.$server_ba_info["mod"].''))or die(mysql_error());
	$modovi = mysql_query('SELECT * FROM modovi WHERE hidden=0 AND igra LIKE "'.$mod_info_ba["igra"].'"');
	echo 'Izaberite mod: <select name="modovi" id="modovi">';
	while($row = mysql_fetch_array($modovi)){
	echo '<option value="'.$row["id"].'">'.$row["ime"].'</option>';	
	}
	echo '</select>';
		
	} else {
		
		
	$server_info = mysql_fetch_array($server);
	if($server_info["status"]=="Neaktivan"){
		echo 'Vaš server nije aktivan.';	
	} else {
		
if($server_info["startovan"]==1){
		echo 'Prije promene moda stopirajte server.';	
} else {		
	
	$server_box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info["box_id"].'\''));
	$mod_id = $_POST["mod_id"];
	$mod_info_ba = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id='.$server_info["mod"].''));
	$mod = mysql_query('SELECT * FROM modovi WHERE id="'.$mod_id.'" AND hidden=0 AND igra LIKE "'.$mod_info_ba["igra"].'"');
	if(mysql_num_rows($mod)!=0){
	$mod = mysql_fetch_array($mod);
/* START SSH2 FUNKCIJE */		
if (!function_exists("ssh2_connect")) die("SSH2 Funkcija nije instalirana");
// log in at server1.example.com on port 22
if(!($con = ssh2_connect($server_box["ip"], $server_box["ssh_port"]))){
    echo "Ne mogu se spojiti na server";
} else {
    // try to authenticate with username root, password secretpassword
    if(!ssh2_auth_password($con, $server_box["username"], base64_decode($server_box["password"]))) {
        echo "Netačan username ili lozinka mašine";
    } else {
    	    
    	   
    	    if(!$stream = ssh2_shell($con, 'xterm')){
    	    	echo "Ne mogu izvršiti komadu";    
    	    }else {
    	      
    	    	    
    	    $cmd1 = 'screen -m -S '.$server_info["username"].'_mod';	    
    	    fwrite( $stream, "$cmd1\n");
    	    sleep(1);
    	    $cmd2 = 'nice -n 19 rm -Rf /home/'.$server_info["username"].'/* && cp -Rf '.$mod["putanja"].'/* /home/'.$server_info["username"].' && chown -Rf '.$server_info["username"].':'.$server_info["username"].' /home/'.$server_info["username"].' && exit';
    	    fwrite( $stream, "$cmd2\n");
    	    sleep(1);
    	    while($line = fgets($stream)) {
    	    	    $data .= $line;
    	    }
			$mapaa = mysql_query('SELECT * FROM `modovi` WHERE `id`='.$mod_id.'');
			$mapaa = mysql_fetch_assoc($mapaa);
			$mapa = $mapaa['mapa'];
    	    $update_sql = 'UPDATE `serveri` SET `mod`=\''.$mod_id.'\', `map`=\''.$mapa.'\' WHERE `id`='.$id.'';
    	    if(mysql_query($update_sql)){
    	    echo 'Mod je uspješno promjenjen. 
    	    Potrebno je sačekati 5 minuta, prije startovanja servera.';
    	    } else {
    	    echo 'Desio se problem prilikom promjene moda. Molimo Vas pokušajte ponovo.';    
    	    	    
    	    }


    	    
    	    }
    	    
        
    }
}

/* STOP SSH2 FUNKCIJE */
	} else {
		echo 'Mod nije pronađen.';	
	}

	}

	}
	
	}
}	
} else {
echo 'Nemate pristup ovom serveru.';
}
	
} else {
echo 'Dogodila se pogreška.';	
}
} else {
echo 'Nisi logovan!';	
}

?>