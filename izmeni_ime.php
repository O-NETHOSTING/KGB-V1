<?php
session_start();
define("GPANEL", "YES");
include "config.php";

if($_SESSION["id"] == "1"){
   echo "Ova akcija nije dozvoljena na demo klijentu.";
   die();
}

if(isset($_SESSION["id"])){
if(intval($_POST['srv_id_p'])){
if($_POST['srv_name']){

				
				if($_POST["srv_name"]){
					
					$id = intval($_POST["srv_id_p"]);	
					$id = stripslashes($id);
					$id = mysql_real_escape_string($id);
					$srv = $_POST["srv_name"];	
					$srv = stripslashes($srv);
					$srv = mysql_real_escape_string($srv);
					
					$server = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\' and serveri.user_id=\''.$_SESSION["id"].'\'');
					
					$provjera=mysql_num_rows($server);
					
					if($provjera=="1"){

						$server_info = mysql_fetch_array($server);

					    mysql_query("UPDATE serveri SET name='$srv' WHERE id='$id'");
						echo 'Uspesno ste izmenili ime servera.';
						
					} else {
						
						echo 'Nemate pristup ovom serveru.';
						
					}
					
					
				}
				
				} else {
				       echo 'Ime servera ne sme biti prazno.';
				}
				
				} else {
                      echo 'Dogodila se pogreška.';	
                }
				
				} else {
				  header("location:/main.php");
				}

?>
