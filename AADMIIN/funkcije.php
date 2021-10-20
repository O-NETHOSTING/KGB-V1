<?php
/* COPYRIGHT © MAHIR DZINIC
 * ALL RIGHTS RESERVED
 */

function ssh_dodaj_server($server, $port, $username, $password, $new_user, $new_user_pw, $mod){
if (!function_exists("ssh2_connect")) return "SSH2 PHP extenzija nije instalirana";

if(!($con = ssh2_connect("$server", "$port"))){
    return "Ne mogu se spojiti sa serverom";
} else {

    if(!ssh2_auth_password($con, "$username", "$password")) {
        return "Netacni podaci za prijavu";
    } else {
/* START FUNKIJE */    	    

$cmd1 = "passwd $new_user";
$cmd2 = "$new_user_pw";
$cmd3 = "$new_user_pw";        
        
$stream = ssh2_shell($con, 'xterm');
fwrite( $stream, "useradd $new_user\n");
sleep(2);
fwrite( $stream, "mkdir /home/$new_user\n");
sleep(1);
fwrite( $stream, "$cmd1\n");
sleep(1);
fwrite( $stream, "$cmd2\n");
sleep(1);
fwrite( $stream, "$cmd3\n");
sleep(1);
$cmd1_final = 'screen -m -S '.$new_user.'_instalacija';	    
fwrite( $stream, "$cmd1_final\n");
sleep(1);
$cmd_final = 'nice -n 19 rm -Rf /home/'.$new_user.'/* && cp -Rf '.$mod.'/* /home/'.$new_user.' && chown -Rf '.$new_user.':'.$new_user.' /home/'.$new_user.' && exit';
fwrite( $stream, "$cmd_final\n");
sleep(1);
while($line = fgets($stream)) {
$data .= $line;
}

return "DA";
    
/* KRAJ FUNKCIJE */    
    }
}	
}




function ssh_brisi_server($server, $port, $username, $password, $new_user){
if (!function_exists("ssh2_connect")) return "SSH2 PHP extenzija nije instalirana";

if(!($con = ssh2_connect("$server", "$port"))){
    return "Ne mogu se spojiti sa serverom";
} else {

    if(!ssh2_auth_password($con, "$username", "$password")) {
        return "Netacni podaci za prijavu";
    } else {
/* START FUNKIJE */    	    

       
$stream = ssh2_shell($con, 'xterm');
$cmd1_final = 'screen -m -S '.$new_user.'_brisanje';	    
fwrite( $stream, "$cmd1_final\n");
sleep(1);
fwrite( $stream, "userdel -r $new_user && exit\n");
sleep(1);
fwrite( $stream, "rm-rf /var/run/screen/S-$new_user\n");
sleep(1);
while($line = fgets($stream)) {
$data .= $line;
}

return "DA";
    
/* KRAJ FUNKCIJE */    
    }
}	
}



function ssh_provjera($server, $port, $username, $password){
if (!function_exists("ssh2_connect")) return "SSH2 PHP extenzija nije instalirana";

if(!($con = ssh2_connect("$server", "$port"))){
    return "Ne mogu se spojiti na server";
} else {
    if(!ssh2_auth_password($con, "$username", "$password")) {
        return "Netacni podaci za prijavu";
    } else {
return "DA";
    }
    
   }
}


function server_status($server, $port, $username, $password){
if (!function_exists("ssh2_connect")) return "SSH2 PHP extenzija nije instalirana";

if(!($con = ssh2_connect("$server", "$port"))){
    return "Ne mogu se spojiti na server";
} else {
    if(!ssh2_auth_password($con, "$username", "$password")) {
        return "Netacni podaci za prijavu";
    } else {

        // execute a command
        if (!($stream = ssh2_exec($con, "top -bi -d .5 -n 2" ))) {
            echo "fail: unable to execute command\n";
        } else {
            // collect returning data from command
            stream_set_blocking($stream, true);
            $data = "";
            while ($buf = fread($stream,4096)) {
                $data .= $buf;
            }
            fclose($stream);
        }
        
        return $data;
    
    }
    
   }
}

function get_string_between($string, $start, $end){
	$string = " ".$string;
	$ini = strpos($string,$start);
	if ($ini == 0) return "";
	$ini += strlen($start);
	$len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}


?>
