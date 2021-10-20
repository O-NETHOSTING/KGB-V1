<?php
error_reporting(0);
session_start();
if(!isset($_SESSION["id"])){
$_SESSION["return_path"] = 'main.php';
header("location:index.php");
}
ini_set('display_errors', 0);

define("GPANEL", "YES");
include "config.php";
include "includes/function.php";

require('includes/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('template');
$smarty->setCompileDir('cache/template_c');
$smarty->setCacheDir('cache/other_c');
$smarty->setConfigDir('includes/configs');

$smarty->assign('name', 'Ned');
$smarty->assign('config', $configs);
$smarty->display('head.tpl');
$smarty->display('top.tpl');

date_default_timezone_set("Europe/Belgrade");


mysql_query('UPDATE clients SET lastactivity = "'.$_SERVER['REQUEST_TIME'].'" WHERE id="'.$_SESSION["id"].'"');

// POČETNA STRANICA
if(!$_GET["page"]){
$news2 = mysql_query('SELECT * FROM news WHERE hidden=0 ORDER BY ID DESC LIMIT 5');
while($row[]=mysql_fetch_array($news2)){
$news = $row;	
}
$smarty->assign('news', $news);
$profil = mysql_query('SELECT * FROM clients WHERE id=\''.$_SESSION["id"].'\'');
$client = mysql_fetch_array($profil);
	
	
$smarty->assign('profil_email', htmlspecialchars($client["email"]));	
$smarty->assign('profil_fname', htmlspecialchars($client["fname"]));	
$smarty->assign('profil_lname', htmlspecialchars($client["lname"]));	


$smarty->display('main.tpl');
}


// STRANICA SERVERI 

if($_GET["page"]=="serveri"){
	
$broj_slotova_sql = mysql_fetch_array(mysql_query('SELECT SUM(slotovi) AS broj_slotova, COUNT(id) AS broj_servera FROM serveri WHERE user_id=\''.$_SESSION["id"].'\' and status=\'Aktivan\''));	

$broj_slotova = $broj_slotova_sql["broj_slotova"];
$broj_servera = $broj_slotova_sql["broj_servera"];

$smarty->assign('broj_slotova', $broj_slotova);
$smarty->assign('broj_servera', $broj_servera);

$serveri = mysql_query('SELECT serveri.*, ip.ip FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.user_id=\''.$_SESSION["id"].'\' ORDER BY serveri.id');
$i = 0;
while($row[]=mysql_fetch_array($serveri)){
$broj = $i++;

if(strlen($row["$broj"]["name"])>=30){
$row["$broj"]["name"] = substr($row["$broj"]["name"], 0, 30);
$row["$broj"]["name"] = $row["$broj"]["name"].'...';
}

$row["$broj"]["name"] = htmlspecialchars($row["$broj"]["name"]);
$smarty->assign('serveri', $row);
}



$smarty->display('serveri.tpl');


}






// STRANICA INFO SERVERA 

if($_GET["page"]=="server" && $_GET["id"]){

$id = $_GET["id"];	
$id = stripslashes($id);
$id = mysql_real_escape_string($id);
$id = intval($id);
$smarty->assign('id', $id);	


$server = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\' and serveri.user_id=\''.$_SESSION["id"].'\'');
$provjera=mysql_num_rows($server);

if($provjera=="1"){

$server_info2 = mysql_fetch_array($server);

$server_mod2 = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info2["mod"].'\''));

$server_box2 = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info2["box_id"].'\''));

/* KOMANDE START */

if($_GET[action]=="start"){
	$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$_SESSION["id"].''));
if($klijent["email"]==$configs["email"]){
echo 'Ova akcija nije dozvoljena demo klijentu.';	
} else {
if($server_info2["status"]=="Aktivan"){	

$ip = $server_info2["ip"];
$port = $server_info2["port"];
$slots = $server_info2["slotovi"];
$map = $server_info2["map"];
$fps = $server_info2["fps"];

$komanda = $server_mod2["komanda"]; 

$komanda = str_replace('{$ip}', "$ip", $komanda);
$komanda = str_replace('{$port}', "$port", $komanda);
$komanda = str_replace('{$slots}', "$slots", $komanda);
$komanda = str_replace('{$map}', "$map", $komanda);
$komanda = str_replace('{$fps}', "$fps", $komanda);

$start_s = start_server("$server_info2[ip]", "$server_box2[ssh_port]", "$server_info2[username]", "$server_info2[password]", "$komanda");	

if($start_s=="TRUE"){
$smarty->assign('message', "Server je uspješno startovan");		
mysql_query('UPDATE serveri SET startovan=\'1\' WHERE id=\''.$id.'\'');
}else{
$smarty->assign('message', "$start_s");			
}

} else {
$smarty->assign('message', "Vaš server nije aktivan.");			
}
}

}


if($_GET[action]=="stop"){ 
	
if($server_info2["status"]=="Aktivan"){
	
$stop_s = stop_server("$server_info2[ip]", "$server_box2[ssh_port]", "$server_info2[username]", "$server_info2[password]");	

if($stop_s=="TRUE"){
$smarty->assign('message', "Server je uspješno stopiran");	
mysql_query('UPDATE serveri SET startovan=\'0\' WHERE id=\''.$id.'\'');
}else {
$smarty->assign('message', "$stop_s");	
}

} else {
$smarty->assign('message', "Vaš server nije aktivan.");				
}

}


if($_GET[action]=="restart"){ 

if($server_info2["status"]=="Aktivan"){
	
$stop_s = stop_server("$server_info2[ip]", "$server_box2[ssh_port]", "$server_info2[username]", "$server_info2[password]");	

if($stop_s=="TRUE"){
	
$ip = $server_info2["ip"];
$port = $server_info2["port"];
$slots = $server_info2["slotovi"];
$map = $server_info2["map"];

$komanda = $server_mod2["komanda"]; 

$komanda = str_replace('{$ip}', "$ip", $komanda);
$komanda = str_replace('{$port}', "$port", $komanda);
$komanda = str_replace('{$slots}', "$slots", $komanda);
$komanda = str_replace('{$map}', "$map", $komanda);	
	

sleep(3);

$start_s = start_server("$server_info2[ip]", "$server_box2[ssh_port]", "$server_info2[username]", "$server_info2[password]", "$komanda");	

if($start_s=="TRUE"){
$smarty->assign('message', "Server je uspješno restartovan");		
}else{
$smarty->assign('message', "$start_s");			
}

}else {
$smarty->assign('message', "$stop_s");	
}

} else {
$smarty->assign('message', "Vaš server nije aktivan.");					
}
	
}







if($_GET[change_ftp_pw]=="yes"){ 
$ftp_pw = ftp_pass("$server_info2[ip]", "$server_box2[ssh_port]", "$server_info2[username]", "$server_info2[password]");	

if($ftp_pw=="FALSE"){
$smarty->assign('message', "Dogodila se pogreška prilikom promjene ftp lozinke.");		
}else{
$smarty->assign('message', "FTP lozinka je uspješno promjenjena.");

mysql_query('UPDATE serveri SET password=\''.$ftp_pw.'\' WHERE id=\''.$id.'\'');

}

}






/* KOMANDE STOP */

$server2 = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\' and serveri.user_id=\''.$_SESSION["id"].'\'');


$server_info = mysql_fetch_array($server2);

$server_mod = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info["mod"].'\''));

$server_box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info["box_id"].'\''));

$user_info = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$_SESSION["id"].''));
if($user_info["email"]==$configs["email"]){
$server_info["password"] = "Nije vidljiv demo klijentu.";
$server_info["hostname"] = "Nije vidljiv demo klijentu.";
}

$smarty->assign('ftp_port', $server_box["ftp_port"]);


$istice = pretvoriDatum($server_info["istice"]);

$sampp = mysql_query('SELECT * FROM serveri WHERE user_id = '.$_SESSION["id"].' and id = '.$id.'');
$sampp2 = mysql_fetch_array($sampp);

if($sampp2['mod']=="7"){
	$server_query = samp_scan("$server_info[ip]", "$server_info[port]");
	//
	$ime = $server_query["hostname"];
	if($server_query["map"] == "Server je offline!"){
	  $ime = "Server je offline";
	}
	
	$smarty->assign('ime_servera', $ime);
    $smarty->assign('broj_igraca', $server_query["players"]);
    $smarty->assign('maximalan_br_igraca', $server_query["maxplayers"]);
    $smarty->assign('server_mapa', $server_query["map"]);
    $smarty->assign('status', $status);



	$smarty->assign('server_istice', $istice);
	$smarty->assign('server_mod', $server_query["gamemode"]);
	$smarty->assign('server_igra', 'SAMP');
	$smarty->assign('server', $server_info);
	
    $status = $server_query['map'];
	if($status == "Server je offline!"){
	  $status = "<span style='color:red;'>Offline</span>";
	} else {
	  $status = "<span style='color:green;'>Online</span>";
	}
	
	$smarty->assign('status', $status);
}else{
	
	$mapaa = mysql_query("SELECT * FROM `modovi` WHERE id='".$server_info['mod']."'");
	$mapaa = mysql_fetch_array($mapaa);
	$server_query = cs_scan("$server_info[ip]", "$server_info[port]");
	//
	$status = $server_query['status'];
	if($status == "0"){
	  $status = "<span style='color:red;'>Offline</span>";
	} else {
	  $status = "<span style='color:green;'>Online</span>";
	}
	//
	
	$smarty->assign('ime_servera', $server_query["hostname"]);
    $smarty->assign('broj_igraca', $server_query["players"]);
    $smarty->assign('maximalan_br_igraca', $server_query["maxplayers"]);
    $smarty->assign('server_mapa', $server_query["mapname"]);
	$smarty->assign('server_igra', $server_query["game"]);
    $smarty->assign('status', $status);



	$smarty->assign('server_istice', $istice);
	$smarty->assign('server_mod', $server_mod["ime"]);
	$smarty->assign('server_igra', $server_mod["igra"]);
	$smarty->assign('server_mapaa', $mapaa['mapa']);
	$smarty->assign('server', $server_info);	
	
	$graph = "<img style='margin-left:10px;width:250px;height:120px;' src='http://yourhosting.info/chart/$server_info[ip]:$server_info[port]'>";
	$smarty->assign('graph', $graph);	
	
	$graph_samp = "<img style='margin-left:10px;width:250px;height:120px;' src='http://chart.apis.google.com/chart?chf=bg,s,67676700&chxl=0:$chart_x_fields&chxp=$chart_x_replace&chxr=0,0,24|1,0,$chart_x_max&chxt=x,y&chs=260x150&cht=lc&chco=FFFFFF&chds=0,$chart_x_max&chd=t:$chart_data&chdlp=b&chg=16,16,0,0&chls=2&chm=B,068789,0,0,0,1'>";
	$smarty->assign('graph_samp', $graph_samp);
}







} else {
$smarty->assign('error', "Nemate pristup ovom serveru");	
};

	
$smarty->display('server.tpl');	
}









// WEB FTP SERVERA


if($_GET["page"]=="ftp" && $_GET["id"] && $_GET["path"]){

$id = $_GET["id"];	
$id = stripslashes($id);
$id = mysql_real_escape_string($id);
$smarty->assign('id', $id);	


$server = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\' and serveri.user_id=\''.$_SESSION["id"].'\'');
$provjera=mysql_num_rows($server);

if($provjera=="1"){
	
$server_info = mysql_fetch_array($server);
	
$server_mod = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info["mod"].'\''));

$server_box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info["box_id"].'\''));



$smarty->assign('server_info', $server_info); 		




$ftp_server = "$server_info[ip]";
$ftp_port = "$server_box[ftp_port]";

$path = "$_GET[path]";

$conn_id = ftp_connect($ftp_server, $ftp_port) or $smarty->assign('error', "Ne mogu se konektovati na ftp"); 	

$ftp_path = substr("$path", 1);
$breadcrumbs = split('/', $ftp_path);
if(($bsize = sizeof($breadcrumbs))>0) {
  	$sofar = '';
  	for($bi=0;$bi<$bsize;$bi++) {
	$sofar = $sofar . $breadcrumbs[$bi] . '/';

$ftp_pth .= '
<div class="ftp_arrow">
<img src="template/images/ftp_arrow.png" border="0" />
</div>

<div class="ftp_path_folder">
<a href="main.php?page=ftp&id='.$id.'&path=/'.$sofar.'">'.$breadcrumbs[$bi].'</a>
</div> ';
	}
}

$smarty->assign('ftp_path', $ftp_pth);





if (ftp_login($conn_id, $server_info["username"], $server_info["password"]))
{
	
        ftp_chdir($conn_id, $path);
        
        
        
if($_POST["upload_file"]){   
	
	
$fajl = $_FILES["file"]["tmp_name"];	
$ime_fajla = $_FILES["file"]["name"];
$putanja_na_serveru = ''.$path.'/'.$ime_fajla.'';


if (ftp_put($conn_id, $putanja_na_serveru, $fajl, FTP_BINARY)) {
$smarty->assign('message', "Fajl je uspješno uploadovan.");
} else {
$smarty->assign('message', "Dogodio se problem prilikom uploada fajla.");
}     
	
	
}

if($_POST["folder_name"]){
$dir = $_POST["folder_name"];
if (ftp_mkdir($conn_id, $dir)) {
 $smarty->assign('message', "Folder je uspješno kreiran.");
} else {
 $smarty->assign('message', "Dogodio se problem prilikom kreiranja foldera.");
}	

}

if($_GET["delete"]=="file"){
$file = ''.$_GET["path"].''.$_GET["file"].'';	
if (ftp_delete($conn_id, $file)) {
 $smarty->assign('message', "Fajl uspješno izbrisan.");

} else {
 $smarty->assign('message', "Ne mogu izbrisati fajl.");
}	
}

function ftp_delAll($conn_id,$dst_dir){
  $ar_files = ftp_nlist($conn_id, $dst_dir);
  if (is_array($ar_files)){ 
      for ($i=0;$i<sizeof($ar_files);$i++){ 
          $st_file = basename($ar_files[$i]);
          if($st_file == '.' || $st_file == '..') continue;
          if (ftp_size($conn_id, $dst_dir.'/'.$st_file) == -1){ 
              ftp_delAll($conn_id,  $dst_dir.'/'.$st_file); 
          } else {
              ftp_delete($conn_id,  $dst_dir.'/'.$st_file);
          }
      }
      sleep(1);
      ob_flush() ;
  }
  if(ftp_rmdir($conn_id, $dst_dir)){
  return "true";
  }
}


if($_GET["delete"]=="folder"){
$dirf =	''.$_GET["path"].''.$_GET["folder"].'';	
if(ftp_delAll($conn_id,$dirf)){
$smarty->assign('message', "Folder je uspješno izbrisan");
} else {
$smarty->assign('message', "Ne mogu izbrisati folder.");
}	
}
        
        

        $ftp_contents = ftp_rawlist($conn_id, $path);
        $i = "0";
        foreach ($ftp_contents as $folder)
        {
        $broj = $i++;	
        $current = preg_split("/[\s]+/",$folder,9);

        $isdir = ftp_size($conn_id, $current[8]);
        if($isdir=='-1'){
        $ftp_dir[]=$current;
        } else {
        	
        $ext = explode(".", $current[8]);
        if($ext[1]=="txt" || $ext[1]=="log" || $ext[1]=="cfg" || $ext[1]=="ini"){
           $current[9] = $ext[1];     	
        }
        
        $ftp_fajl[]=$current;
        
	
        }
        
        
        
        }
                
        
        $smarty->assign('ftp_fajlovi', $ftp_fajl);
        $smarty->assign('ftp_folderi', $ftp_dir);
        

        $old_path = ''.$_GET["path"].'/';
        $old_path = str_replace('//', '/', $old_path);
        
        $smarty->assign('old_path', $old_path);
             
        

        
        
        
        
}else {
$smarty->assign('error', "Netačni username i lozinka"); 		
}




} else {
$smarty->assign('error', "Nemate pristup ovom serveru");	
};

	
$smarty->display('ftp.tpl');	
}





// WEB FTP FILE

if($_GET["page"]=="ftp_file" && $_GET["id"] && $_GET["path"]){

$id = $_GET["id"];	
$id = stripslashes($id);
$id = mysql_real_escape_string($id);
$smarty->assign('id', $id);	


$server = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\' and serveri.user_id=\''.$_SESSION["id"].'\'');
$provjera=mysql_num_rows($server);

if($provjera=="1"){

$server_info = mysql_fetch_array($server);
	
$server_mod = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info["mod"].'\''));

$server_igra = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info["mod"].'\''));

$server_box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info["box_id"].'\''));



$smarty->assign('server_info', $server_info); 		




$ftp_server = "$server_info[ip]";
$ftp_port = "$server_box[ftp_port]";

$path = "$_GET[path]";

$conn_id = ftp_connect($ftp_server, $ftp_port) or $smarty->assign('error', "Ne mogu se konektovati na ftp"); 	

$ftp_path = substr("$path", 1);
$breadcrumbs = split('/', $ftp_path);
if(($bsize = sizeof($breadcrumbs))>0) {
  	$sofar = '';
  	for($bi=0;$bi<$bsize;$bi++) {
	$sofar = $sofar . $breadcrumbs[$bi] . '/';

$ftp_pth .= '
<div class="ftp_arrow">
<img src="template/images/ftp_arrow.png" border="0" />
</div>

<div class="ftp_path_folder">
<a href="main.php?page=ftp&id='.$id.'&path=/'.$sofar.'">'.$breadcrumbs[$bi].'</a>
</div> ';
	}
}

$smarty->assign('ftp_path', $ftp_pth);	
	
if (ftp_login($conn_id, $server_info["username"], $server_info["password"]))
{
	
        ftp_chdir($conn_id, $path);

/* FTP FILE START */



if ($_POST["new_file"]) {
	
$newdata = $_POST['new_file'];
$fajov = $_GET["file"];
$folder = 'cache/other_c/ftp/ftp_papy_gpanel_'.$server_info["username"].'_'.$fajov.'';

$fw = fopen(''.$folder.'', 'w+') or $smarty->assign('message', "Ne mogu otvoriti fajl");
$fb = fwrite($fw,stripslashes($newdata)) or $smarty->assign('message', "Ne mogu spremiti fajl");
$file = "$fajov";
$remote_file = ''.$_GET["path"].'/'.$fajov.'';
if (ftp_put($conn_id, $remote_file, $folder, FTP_BINARY)) {
 $smarty->assign('message', "Fajl je uspješno spremljen.");
} else {
 $smarty->assign('message', "Dogodila se greška prilikom spremanja fajla.");
}

unlink($folder);

} 


/*$filename = "ftp://$server_info[username]:$server_info[password]@$ftp_server:$ftp_port.$_GET[path]/$_GET[file]";
$handle = fopen($filename, "r") or $smarty->assign('message', "Ne mogu otvoriti fajl");
$contents = fread($handle, filesize($filename)) or $smarty->assign('message', "Ne mogu pročitati fajl");
$smarty->assign('ftp_contents', $contents);	
fclose($handle);*/

//$filename = "ftp://srv_4_1:vupuvagyj@188.40.52.207/cstrike/server.cfg";
$filename = "ftp://$server_info[username]:$server_info[password]@$ftp_server:$ftp_port".$_GET[path]."/$_GET[file]";
$contents = file_get_contents($filename);
$smarty->assign('ftp_contents', $contents);




/* FTP FILE STOP */        
        
        $old_path = ''.$_GET["path"].'/';
        $old_path = str_replace('//', '/', $old_path);
        
        $smarty->assign('old_path', $old_path);     
        $smarty->assign('file', $_GET["file"]);        


}else {
$smarty->assign('error', "Netačni username i lozinka"); 		
}	
	
} else {
$smarty->assign('error', "Nemate pristup ovom serveru");	
};	
$smarty->display('ftp_file.tpl');	
}




if($_GET["page"]=="podrska"){


	if($_POST["otvori_tiket"] || $_POST["tiket_title"] || $_POST["pitanje"]){
		
		if(!$_POST["tiket_title"]){
		$smarty->assign('message', "Niste upisali naslov tiketa.");
		} else {
			
		if(!$_POST["pitanje"]){
		$smarty->assign('message', "Niste upisali pitanje.");		
		} else {
			
		$tiket_naslov = $_POST["tiket_title"];
		$tiket_pitanje = $_POST["pitanje"];
		$server = $_POST["serveri"];
		$vrsta  = $_POST["vrsta"];
		$prioritet = $_POST["prioritet"];
                
                $tiket_naslov = stripslashes($tiket_naslov);
                $tiket_naslov = mysql_real_escape_string($tiket_naslov);
                
                $tiket_pitanje = stripslashes($tiket_pitanje);
                $tiket_pitanje = mysql_real_escape_string($tiket_pitanje);
                
                $server = stripslashes($server);
                $server = mysql_real_escape_string($server);
                
                
		$datum = time();
		$otvori_tiket = mysql_query('INSERT INTO tiketi (server_id, user_id, status, datum, naslov, vrsta, prioritet) VALUES ("'.$server.'", "'.$_SESSION["id"].'", "Neodgovoren", "'.$datum.'", "'.$tiket_naslov.'", "'.$vrsta.'", "'.$prioritet.'")');	
			
		$otvoren_tiket_id = mysql_insert_id();
		$postavi_pitanje = mysql_query('INSERT INTO tiketi_odgovori (tiket_id, user_id, odgovor, vrijeme_odgovora) VALUES ("'.$otvoren_tiket_id.'", "'.$_SESSION["id"].'", "'.$tiket_pitanje.'", "'.$datum.'")');
		
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
		$link = "admin.php?page=tiket&akcija=pregled&id=";

		
		$userr = mysql_query('SELECT * FROM clients WHERE id='.$_SESSION["id"].'');
		$useri = mysql_fetch_array($userr);		
		
		
		$test2 = mysql_query("INSERT INTO chat_messages (Text, Autor, Datum) VALUES('Otvorio sam nov tiket <a href=".$link."".$otvoren_tiket_id.">".$tiket_naslov."</a>', '<span>".$useri['fname']." ".$useri['lname']."</span>', '".$datum."')") or die(mysql_error());
			
				
		}
		}
		
	}

	
	if($_GET["arhiva"]=="yes"){
	$arhiva = '';	
	} else {
	$arhiva = 'AND zatvoren=0';	
	}
	
$tiketi = mysql_query('SELECT * FROM tiketi WHERE user_id=\''.$_SESSION["id"].'\' '.$arhiva.' ORDER BY datum DESC');
$i = 0;
while($row[] = mysql_fetch_array($tiketi)){
$broj = $i++;	
$tiket_server = mysql_fetch_array(mysql_query('SELECT ip_id, port FROM serveri WHERE id='.$row["$broj"]["server_id"].''));
$server_ip = mysql_fetch_array(mysql_query('SELECT ip FROM ip WHERE id='.$tiket_server["ip_id"].''));
$odgovori = mysql_query('SELECT * FROM tiketi_odgovori WHERE tiket_id='.$row["$broj"]["id"].' ORDER BY vrijeme_odgovora DESC');
$broj_odgovora = mysql_num_rows($odgovori);
$odgovori_row = mysql_fetch_array($odgovori);
$row["$broj"]["zadnji_odgovor"] = $odgovori_row["vrijeme_odgovora"];
$row["$broj"]["broj_odgovora"] = $broj_odgovora;
$row["$broj"]["port"] = $tiket_server["port"];
$row["$broj"]["ip"] = $server_ip["ip"];
$row["$broj"]["naslov"] = htmlspecialchars($row["$broj"]["naslov"]);
$smarty->assign('tiketi', $row);
}	
	

$smarty->display('podrska.tpl');
}



if($_GET["page"]=="tiket" && $_GET["id"]){
	
$tiket_id = $_GET["id"];
$tiket_id = intval($tiket_id);

$smarty->assign('tiket_id', $tiket_id);
	

	
	
$provjera = mysql_query('SELECT * FROM tiketi WHERE id='.$tiket_id.' AND user_id='.$_SESSION["id"].'');	
$procjera_check = mysql_num_rows($provjera);
if($procjera_check=="1"){

	if($_POST["odgovor"]){
		$odgovor = $_POST["odgovor"];
                $odgovor = stripslashes($odgovor);
                $odgovor = mysql_real_escape_string($odgovor);
				$odgovor = nl2br($odgovor);
		$vrijeme = time();
		$infoti = mysql_fetch_array($provjera);
		if($infoti["zatvoren"]==0){
		$dodaj_odgovor = mysql_query('INSERT INTO tiketi_odgovori (tiket_id, user_id, odgovor, vrijeme_odgovora) VALUES ("'.$tiket_id.'", "'.$_SESSION["id"].'", "'.$odgovor.'", "'.$vrijeme.'")');

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
		$link = "admin.php?page=tiket&akcija=pregled&id=";

		
		$userr = mysql_query('SELECT * FROM clients WHERE id='.$_SESSION["id"].'');
		$useri = mysql_fetch_array($userr);		
		
		mysql_query("INSERT INTO chat_messages (Text, Autor, Datum) VALUES('Odgovorio sam na tiket ID <a href=".$link."".$tiket_id.">#".$tiket_id."</a>', '<span>".$useri['fname']." ".$useri['lname']."</span>', '".$datum."')") or die(mysql_error());

		$update_tiket = mysql_query('UPDATE tiketi SET status="Neodgovoren" WHERE id='.$tiket_id.'');
		} else {
			$smarty->assign('message', "Tiket je zatvoren!");	
		}
	}
	
	if($_GET["zatvori"]){
		$update_tiket = mysql_query('UPDATE tiketi SET status="Zatvoren", zatvoren="1" WHERE id='.$tiket_id.'');
		$smarty->assign('message', "Tiket je uspješno zatvoren.");
	}
	
$provjera2 = mysql_query('SELECT * FROM tiketi WHERE id='.$tiket_id.' AND user_id='.$_SESSION["id"].'');	
	
$tiket = mysql_fetch_array($provjera2);	
$smarty->assign('tiket_naslov', htmlspecialchars($tiket["naslov"]));		
$smarty->assign('tiket_datum', $tiket["datum"]);
$smarty->assign('tiket_zatvoren', $tiket["zatvoren"]);
$i = 0;
$odgovori = mysql_query('SELECT * FROM tiketi_odgovori WHERE tiket_id='.$tiket_id.' ORDER BY vrijeme_odgovora ASC');
while($row[] = mysql_fetch_array($odgovori)){
$broj = $i++;
if($row["$broj"]["admin_id"]==NULL){
$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$row["$broj"]["user_id"].''));
$row["$broj"]["user"] = htmlspecialchars($klijent["fname"]);
$row["$broj"]["user1"] = htmlspecialchars($klijent["lname"]);
} else {
$admin = mysql_fetch_array(mysql_query('SELECT * FROM admin WHERE id='.$row["$broj"]["admin_id"].''));
$row["$broj"]["user"] = htmlspecialchars($admin["fname"]);	
$row["$broj"]["user1"] = htmlspecialchars($admin["lname"]);
$row["$broj"]["napomena"] = nl2br(htmlspecialchars($admin["signature"]));
}
$row["$broj"]["odgovor"] = nl2br(htmlspecialchars($row["$broj"]["odgovor"]));

$smarty->assign('odgovori', $row);	
}

	
} else {
$smarty->assign('error', 'Tiket ne postoji');	
}

$smarty->display('tiket.tpl');
	
}




if($_GET["page"]=="otvori_tiket"){
$serveri = mysql_query('SELECT serveri.*, ip.ip FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.user_id=\''.$_SESSION["id"].'\' ORDER BY serveri.id');
while($row[] = mysql_fetch_array($serveri)){
$smarty->assign('serveri', $row);	
}
	
$smarty->display('otvori_tiket.tpl');	
}


if($_GET["page"]=="ip_log"){
$logs = mysql_query("SELECT * FROM ip_logs WHERE user_id='$_SESSION[id]' ORDER BY id DESC");
while($row[] = mysql_fetch_array($logs)){
$smarty->assign('logovi', $row);	
}

$smarty->display('ip_logs.tpl');	
}


if($_GET["page"]=="profil"){

if($_POST["fname"]){
	$profil = mysql_query('SELECT * FROM clients WHERE id=\''.$_SESSION["id"].'\'');
	$client = mysql_fetch_array($profil);
	if($client["email"]==$configs["email"]){
		$smarty->assign('message', "Nije dozvoljeno na ovom klijentu");	
	} else {
		
$ime = $_POST["fname"];
$ime = stripslashes($ime);
$ime = mysql_real_escape_string($ime);

$prezime = $_POST["lname"];
$prezime = stripslashes($prezime);
$prezime = mysql_real_escape_string($prezime);

$email = $_POST["email"];
$email = stripslashes($email);
$email = mysql_real_escape_string($email);

$password = $_POST["password"];
$password = stripslashes($password);
$password = mysql_real_escape_string($password);
$password = md5($password);

$profil = mysql_query('SELECT * FROM clients WHERE id=\''.$_SESSION["id"].'\'');
$client = mysql_fetch_array($profil);

if($email==$client["email"]){
	
} else {
$profili = mysql_query('SELECT * FROM clients WHERE email=\''.$email.'\'');
if(mysql_num_rows($profili)==1){
$email_error = 1;
}	
}

if($email_error){
$smarty->assign('message', "Email postoji u bazi.");		
} else {

if($_POST["password"]){
mysql_query('UPDATE clients SET fname=\''.$ime.'\', lname=\''.$prezime.'\', password=\''.$password.'\' WHERE id=\''.$_SESSION["id"].'\'');		
} else {
mysql_query('UPDATE clients SET fname=\''.$ime.'\', lname=\''.$prezime.'\' WHERE id=\''.$_SESSION["id"].'\'');	
}
	
$smarty->assign('message', "Profil je uspješno spremljen.");	
}

}
}	

$profil = mysql_query('SELECT * FROM clients WHERE id=\''.$_SESSION["id"].'\'');
$client = mysql_fetch_array($profil);
	
	
$smarty->assign('profil_email', htmlspecialchars($client["email"]));	
$smarty->assign('profil_fname', htmlspecialchars($client["fname"]));	
$smarty->assign('profil_lname', htmlspecialchars($client["lname"]));	





$smarty->display('profil.tpl');	
	

}
include("template/footer.php");
?>