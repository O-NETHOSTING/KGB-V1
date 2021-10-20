<?php
if(!defined('GPANEL')) die('Hoćel to majstore :D');
function pretvoriDatum($mysqlDatum)

{

$tmp=explode("-", $mysqlDatum);

$datum=$tmp[2] . "." . $tmp[1] . "." . $tmp[0];

return $datum;

}




function server_cs($ip, $port, $request)
{
global $pingtime;
    $fp = @fsockopen('udp://'.$ip, $port, $errno, $errstr, 1);
    $error = "Greška ne mogu se konektovat";
    if (!$fp) return $error;
    stream_set_timeout($fp, 1, 0);
    stream_set_blocking($fp, true);  
    $pingtime1 = microtime();        
    $timeout = time();
    if (($request == "settings" || $request == "players")) {
      $challenge_code = "\xFF\xFF\xFF\xFF\x55\xFF\xFF\xFF\xFF"; 
      fwrite($fp, $challenge_code);
      $buffer = fread($fp, 4096);
      if (!trim($buffer)) { fclose($fp); return FALSE; }
      $challenge_code = substr($buffer, 5, 4);
    }
    if ($request == "players") $challenge = "\xFF\xFF\xFF\xFF\x55".$challenge_code;
    if ($request == "settings") $challenge = "\xFF\xFF\xFF\xFF\x56".$challenge_code;
    fwrite($fp, $challenge);
    $buffer = fread($fp, 4096);
    if (!$buffer) { fclose($fp); return FALSE; }     
    if ($request == "settings")
    {
    $second_packet = fread($fp, 4096);
    if (strlen($second_packet) > 0)
    {
      $reverse_check = dechex(ord($buffer[8]));      
      if ($reverse_check[0] == "1")
      {
        $tmp = $buffer;                 
        $buffer = $second_packet;
        $second_packet = $tmp;
      }
      $buffer = substr($buffer, 13);         
      $second_packet = substr($second_packet, 9);   
      $buffer = trim($buffer.$second_packet);
    }
    else	$buffer = trim(substr($buffer, 4));
    }
    else	$buffer = trim(substr($buffer, 4)); 
    fclose($fp);
    if (!trim($buffer)) return FALSE;
		
    if ($request == "players")
    {
    $player_number = 0;
    $position = 2;
    do {
      $player_number++;
      $player[$player_number]['name']='';                                  
      $player[$player_number]['id'] = ord($buffer[$position]);
      $position ++;                                             
      while($buffer[$position] != "\x00" && $position < 4000)
      {
        $player[$player_number]['name'] .= $buffer[$position];  
        $position ++;
      }
      $player[$player_number]['score'] = (ord($buffer[$position + 1]))
      + (ord($buffer[$position + 2]) * 256)
      + (ord($buffer[$position + 3]) * 65536)
      + (ord($buffer[$position + 4]) * 16777216);
      if ($player[$player_number]['score'] > 2147483648) $player[$player_number]['score'] -= 4294967296;
      $time = substr($buffer, $position + 5, 4);               
      if (strlen($time) < 4) return FALSE;              
      list(,$time) = unpack("f", $time);                
      $time = mktime(0, 0, $time);                          
      $player[$player_number]['time'] = date("H:i:s", $time);  
      $position += 9;
    }
    while ($position < strlen($buffer));                   
    return $player;
    }

    if ($request == "settings")
    {
      $tmp     = substr($buffer, 2); 
      $rawdata = explode("\x00", $tmp);
      for($i=1; $i<count($rawdata); $i=$i+2)
      {
        $rawdata[$i] = strtolower($rawdata[$i]);  
        $setting[$rawdata[$i]] = $rawdata[$i+1];  
        $setting['value'] = strtolower($rawdata[$i]);
        $setting['key'] = $rawdata[$i+1];  
      }
      return $setting; 
    }
}

function samp_scan($ip,$port)
{
    require("SampQuery.class.php"); 
 
    $query = new SampQuery($ip,$port); 
 
    if ($query->connect())
	{
		$data = $query->getInfo(); 
		//
		$data['players'];
		$data['maxplayers']; 
		$data['gamemode'];
		$data['map'];
		return $data;
		//
		$query->close();
    } 
	else
	{ 
		unset($data);
		$data['players'] = "Server je offline!";
		$data['maxplayers'] = "";
		$data['gamemode'] = "Server je offline!";
		$data['map'] = "Server je offline!";
		return $data;
    } 
}

function cs_scan($ip,$port)
{
  global $pingtime;
  $fp = @fsockopen('udp://'.$ip,$port,$errno,$errstr,1);
  if ($config['timeout'] = intval($config['timeout']))
  {
    @stream_set_timeout($fp, $config['timeout']);
  }
  else
  {
    @stream_set_timeout($fp, 0, 500000);
  }

  @stream_set_blocking($fp, TRUE);
  if (!$fp) {
    unset($data);
    $data['color'] = "st4";
    $data['address'] = $ip.":".$port;
    $data['gamemod'] = "-";
    $data['hostname'] = "-";
    $data['mapname'] = "-";
    $data['players'] = "0";
    $data['maxplayers'] = "0";
    $data['password'] = "-";
    $data['datatype'] = "-";
    $data['version'] = "-";
    $data['description'] = "-";
    $data['server_type'] = "-";
    $data['server_os'] = "-";
    $data['server_secure'] = "-";
    $data['server_bots'] = "-";
    $stopro = 1;
    $osv1   = $data['players'];
    $osvw1  = $osv1/$stopro;
    $osve1  = $osvw1*100;
    $data['percent'] = round($osve1);
    $data['la'] = "images/la/0.gif";
    $data['color'] = "color2";
    $data['status'] = 0;
    return $data;
  }
  else { 
   $pingtime1 = microtime(); 
   $final = false;
   fwrite($fp,"\xFF\xFF\xFF\xFFTSource Engine Query\x00");
   $buffer = fread($fp,4096);
   if (!$buffer) {
    fclose($fp);
    unset($data);
    $data['color'] = "st4";
    $data['address'] = $ip.":".$port;
    $data['gamemod'] = "-";
    $data['hostname'] = "-";
    $data['mapname'] = "-";
    $data['players'] = "0";
    $data['maxplayers'] = "0";
    $data['password'] = "-";
    $data['datatype'] = "-";
    $data['version'] = "-";
    $data['description'] = "-";
    $data['server_type'] = "-";
    $data['server_os'] = "-";
    $data['server_secure'] = "-";
    $data['server_bots'] = "-";
    $stopro = 1;
    $osv1   = $data['players'];
    $osvw1  = $osv1/$stopro;
    $osve1  = $osvw1*100;
    $data['percent'] = round($osve1);
    $data['la'] = "images/la/0.gif";
    $data['color'] = "color2";
    $data['status'] = 0;
    return $data;
   }
   $second_packet = $buffer;
   if (strlen($second_packet) > 0) {
    $reverse_check = dechex(ord($buffer[8]));
    if ($reverse_check[0] == "1") {
     $tmp = $buffer;
     $buffer = $second_packet;
     $second_packet = $tmp;
    }
    $buffer = substr($buffer, 13);
    $second_packet = substr($second_packet, 9);
    $buffer = trim($buffer.$second_packet);
    $buffer = trim(substr($buffer, 4));
    if (!trim($buffer)) {
    unset($data);
    $data['color'] = "st4";
    $data['address'] = $ip.":".$port;
    $data['gamemod'] = "-";
    $data['hostname'] = "-";
    $data['mapname'] = "-";
    $data['players'] = "0";
    $data['maxplayers'] = "0";
    $data['password'] = "-";
    $data['datatype'] = "-";
    $data['version'] = "-";
    $data['description'] = "-";
    $data['server_type'] = "-";
    $data['server_os'] = "-";
    $data['server_secure'] = "-";
    $data['server_bots'] = "-";
    $stopro = 1;
    $osv1   = $data['players'];
    $osvw1  = $osv1/$stopro;
    $osve1  = $osvw1*100;
    $data['percent'] = round($osve1);
    $data['la'] = "images/la/0.gif";
    $data['color'] = "color2";
    $data['status'] = 0;
    return $data;
    }
   }
  }
  fclose($fp);
  unset($data);
  $tmp       = explode("\x00", $buffer);
  $place = strlen($tmp[0].$tmp[1].$tmp[2].$tmp[3].$tmp[4]) + 5;
  $data['color'] = "st4";
  $data['address'] = $ip.":".$port;
  $data['gamemod'] = $tmp[3];
  $data['hostname'] = $tmp[1];
  $data['mapname'] = $tmp[2];
  if ($data['mapname'] == "cstrike"){
  $data['hostname'] = $tmp[3];
  $data['mapname']  = $tmp[1];  
  }
  if ($data['mapname'] == "") {
  $data['hostname'] = $tmp[1];
  $data['mapname']  = $tmp[2];
  }
  $data['next']             = 1; 
  $data['players'] = ord($buffer[$place]);
  $data['maxplayers'] = ord($buffer[$place + 1]);
  $data['color'] = "";
  $stopro = $data['maxplayers'];  
  $osv1   = $data['players'];
  $osvw1  = $osv1/$stopro;
  $osve1  = $osvw1*100;
  $data['percent'] = round($osve1);
  $data['status']  = 1;
  $data['la'] = "images/la/0.gif";
  if(round($osve1)>0 && round($osve1)<21) {
  $data['la'] = "images/la/1.gif";  }
  if(round($osve1)>20 && round($osve1)<41) {
  $data['la'] = "images/la/2.gif";  }
  if(round($osve1)>40 && round($osve1)<61) {
  $data['la'] = "images/la/3.gif";  }
  if(round($osve1)>60 && round($osve1)<81) {
  $data['la'] = "images/la/4.gif";  }
  if(round($osve1)>80 && round($osve1)<101) {
  $data['la'] = "images/la/5.gif";  }
  $data['pingtime']              =       microtime()-$pingtime1;
  $data['password'] = ord($buffer[$place + 5]);
  if ($data['password'] = ord($buffer[$place + 5])){
                         $data['password'] = 'Clan War';
                         }
                         else{
                         $data['password'] = 'Public';
                         }
  $data['datatype'] = $buffer[0];                // m для стрим инфы
  $data['version'] = ord($buffer[$place + 2]);   // версия
  $data['description'] = $tmp[4];
  $data['server_type'] = $buffer[$place + 3];    // D выделный или L простой
  $data['server_os'] = $buffer[$place + 4];      // W под виндой или L под линуксом
  $data['server_secure'] = ord($tmp[14]);        // VAC
  if ($data['server_secure']  = ord($tmp[14])){
                          $data['server_secure'] = "есть";
                          }
                          else{
                          $data['server_secure'] = "нет";
                          }
  $data['server_bots'] = ord($tmp[15]);          // кол-во ботов
  if (substr_count($data['hostname'],"banned") == 1) {
   $data['hostname'] = "IP Banned";
   $data['mapname'] = "-";
   $data['password'] = "-";
   $data['server_secure'] = "-";
  }
  if ($data == "Server offline") { 
   unset($data);
   $data['hostname'] = "Server Offline";
   $data['mapname'] = "-";
   $data['players'] = "0";
   $data['maxplayers'] = "0";
  }
  if($data['players'] > $data['maxplayers']){
   $temp=$data['players'];
   $data['players']=$data['maxplayers'];
   $data['maxplayers']=$temp;
  }
  return $data;
}


function start_server($server, $port, $username, $password, $komanda){
if (!function_exists("ssh2_connect")) return "SSH2 PHP extenzija nije instalirana";

if(!($con = ssh2_connect("$server", "$port"))){
    return "Ne mogu se spojiti na server";
} else {

    if(!ssh2_auth_password($con, "$username", "$password")) {
        return "Netačni podatci za prijavu";
    } else {
/* START FUNKIJE */    	    

$stream = ssh2_shell($con, 'vt102', null, 80, 24, SSH2_TERM_UNIT_CHARS);
fwrite( $stream, "screen -A -m -S $username".PHP_EOL);
sleep(1);
fwrite( $stream, "$komanda".PHP_EOL);
sleep(1);
while($line = fgets($stream)) {
$data .= $line;
}

return TRUE;
    
/* KRAJ FUNKCIJE */    
    }
}	
}

function stop_server($server, $port, $username, $password){
if (!function_exists("ssh2_connect")) return "SSH2 PHP extenzija nije instalirana";

if(!($con = ssh2_connect("$server", "$port"))){
    return "Ne mogu se spojiti na server";
} else {

    if(!ssh2_auth_password($con, "$username", "$password")) {
        return "Netačni podatci za prijavu";
    } else {
/* START FUNKIJE */    	    

$stream = ssh2_shell($con, 'vt102', null, 80, 24, SSH2_TERM_UNIT_CHARS);
/*fwrite( $stream, "screen -S $username -X quit".PHP_EOL);*/
fwrite( $stream, 'kill -9 `screen -list | grep "'.$username.'" | awk {\'print $1\'} | cut -d . -f1`'.PHP_EOL);
sleep(1);
fwrite( $stream, 'screen -wipe'.PHP_EOL);
sleep(1);
while($line = fgets($stream)) {
$data .= $line;
}

return TRUE;
    
/* KRAJ FUNKCIJE */    
    }
}	
}



  function generatePassword ($length = 8)
  {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;

  }





function ftp_pass($server, $port, $username, $password){
if (!function_exists("ssh2_connect")) return "FALSE";

if(!($con = ssh2_connect("$server", "$port"))){
    return "FALSE";
} else {

    if(!ssh2_auth_password($con, "$username", "$password")) {
        return "FALSE";
    } else {
/* START FUNKIJE */   


$new_password = generatePassword();

$cmd1 = 'passwd';
$cmd2 = "$password";
$cmd3 = "$new_password";
$cmd4 = "$new_password";

$stream = ssh2_shell($con, 'xterm');
fwrite( $stream, "$cmd1\n");
sleep(1);
fwrite( $stream, "$cmd2\n");
sleep(1);
fwrite( $stream, "$cmd3\n");
sleep(1);
fwrite( $stream, "$cmd4\n");
sleep(1);
while($line = fgets($stream)) {
$data .= $line;
$pos = strpos($line, "successfully");	
if($pos !== false){
$changed = "yes";	
}
}
if($changed=="yes"){	
return "$new_password";
} else {
return false;	
}
    
/* KRAJ FUNKCIJE */    
    }
}	
}






function start_server_shell($server, $port, $username, $password, $komanda){
if (!function_exists("ssh2_connect")) return "SSH2 PHP extenzija nije instalirana";

if (!($con = ssh2_connect("$server", "$port"))) {
    return "Ne mogu se spojiti na server";
} else {
    // try to authenticate with username root, password secretpassword
    if (!ssh2_auth_password($con, "$username", "$password")) {
        return "Netačni podatci za prijavu";
    } else {
        // allright, we're in!
         /*return "Uspješno sam se logovao";*/
 
        // create a shell
        if (!($shell = ssh2_shell($con, 'vt102', null, 80, 40, SSH2_TERM_UNIT_CHARS))) {
            return "Ne mogu otvoriti shell";
        } else {
            stream_set_blocking($shell, true);
            // send a command
            fwrite($shell, "ls");
            sleep(1);
 
            // & collect returning data
            $data = "";
            while ($buf = fread($shell,4096)) {
                $data .= $buf;
            }
            fclose($shell);
        }
        // Done
       return $data;       
        
    }
}	
}



?>