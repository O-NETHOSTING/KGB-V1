{if $server_igra eq 'CS'}
<div id="main">
{if $error}

<div id="error" style="display:none;">{$error}</div>

{else}

{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}
<div id="ljevo">
<div id="generalserverinfobox">
Ime  <a id="promeni_ime" srv_name="{$server.name}" srv_id="{$id}" href="javascript:void(0)"><img src="../template/img/edit.png" /></a> : <input class="input" type="text" value="{$server.name}" readonly /> <div class="space123"></div>
Istice : <input class="input" type="text" value="{if $server_istice|date_format:"%Y.%m.%d" lt $smarty.now|date_format:"%Y.%m.%d"}{$server_istice}{else}{$server_istice}{/if}" readonly /> <div class="space123"></div>
Igra : <input class="input" type="text" value="{if $server_igra eq 'CS'}Counter-Strike 1.6{else}San Andreas Multiplayer{/if}" readonly /> <div class="space123"></div>
Mod : <input class="input" type="text" value="{$server_mod}" readonly /> <div class="space123"></div>
Map <a id="default_mapa" srv_map="{$server.map}" srv_id="{$id}" href="javascript:void(0)"><img src="../template/img/edit.png" /></a> : <input class="input" type="text" value="{$server.map}" readonly /> <div class="space123"></div>
IP adresa : <input class="input" type="text" value="{$server.ip}:{$server.port}" readonly /> <div class="space123"></div>
Status : <input type="text" style="background:none;border:none;" disabled="disabled" class="{if $server.status eq 'Aktivan'}zelena{else}crvena{/if}"  value="{$server.status}" />  <div class="space123"></div>
</div>
</div>
<div id="desno">

{if $server.startovan eq 1}
<div id="serverinfocontrolbox">
<a href="main.php?page=server&id={$id}&action=restart"><div class="defaultbtn"> <center> RESTART<br> <font color="red" size="1" >RESTARTUJ SERVER</font> </div> </a> <div class="space111"></div>
<a href="main.php?page=server&id={$id}&action=stop"><div class="defaultbtn"> <center> STOP <br> <font color="red" size="1" >STOPIRAJ SERVER</font></div> </a><div class="space111"></div>
<a href="main.php?page=ftp&id={$id}&path=/"><div class="defaultbtn"> <center> WEB FTP <br> <font color="red" size="1" >PRISTUP FAJLOVIMA</font></div> </a> <div class="space111"></div>
<a id="dodaj_admina_dugme" srv_id="{$id}" href="javascript:void(0)"><div class="defaultbtn"> <center> ADMINI<br> <font color="red" size="1" >DODAJ ADMINA</font></div> </a> <div class="space111"></div>
<a id="promeni_mod_dugme" srv_id="{$id}" href="javascript:void(0)"><div class="defaultbtn"> <center> MOD <br> <font color="red" size="1" >PROMJENI MOD</font> </div> </a> <div class="space111"></div>
</div>
{else}
<div id="serverinfocontrolbox">
<a href="main.php?page=server&id={$id}&action=start"><div class="defaultbtn"> <center> START<br> <font color="red" size="1" >RESTARTUJ SERVER</font> </div> </a> <div class="space111"></div>
<a href="main.php?page=ftp&id={$id}&path=/"><div class="defaultbtn"> <center> WEB FTP <br> <font color="red" size="1" >PRISTUP FAJLOVIMA</font></div> </a> <div class="space111"></div>
<a id="dodaj_admina_dugme" srv_id="{$id}" href="javascript:void(0)"><div class="defaultbtn"> <center> ADMINI<br> <font color="red" size="1" >DODAJ ADMINA</font></div> </a> <div class="space111"></div>
<a id="promeni_mod_dugme" srv_id="{$id}" href="javascript:void(0)"><div class="defaultbtn"> <center> MOD <br> <font color="red" size="1" >PROMJENI MOD</font> </div> </a> <div class="space111"></div>
</div>
{/if}

</div>

<div id="centar">
<div id="ftpinfobox">
<div id="serverinfolabelbox">
Ip Adresa <br />
Ftp Port <br />
User <br />
Password<br />
</div>
<div id="serverinfotextbox">
{$server.ip} <br />
{$ftp_port}<br />
{$server.username}<br />
(nije dostupno na vasem korisniku)<br />
	</div></div>


<div id="statusinfobox">
<div id="serverinfolabelbox">
Status <br />
Naziv <br />
Mapa <br />
Igraci
</div>
<div id="serverinfotextbox">
{$status}<br />
{$ime_servera}<br />
{$server_mapa}<br />
{$broj_igraca}/{$maximalan_br_igraca} <a href="main.php?page=server&id={$id}"> <span style=color:green;>Refrish </span> </a> <br />  
</div>

<div id="serverinfodownloadbox">

<div id="serverinfolinkbox">
<a href="http://www.gametracker.rs/server_info/{$server.ip}:{$server.port}/" target="_new">Click here to check GT.rs Statistics </a>
</div></div></div>

	
<div id="webftpbox">
<a href="main.php?page=ftp&id={$id}&path=/cstrike/addons/amxmodx/configs/"> CONFIG</a>
<a href="main.php?page=ftp&id={$id}&path=/cstrike/addons/amxmodx/plugins"> PLUGINS</a>
<a href="main.php?page=ftp_file&id={$id}&path=/cstrike/&file=server.cfg"> SERVER.CFG</a>
<a href="main.php?page=ftp_file&id={$id}&path=/cstrike/addons/amxmodx/configs/&file=users.ini"> USERS.INI</a>
</div>

</div>	

{/if}
{else}


<div id="main">
{if $error}

<div id="error" style="display:none;">{$error}</div>

{else}

{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}
<div id="ljevo">
<div id="generalserverinfobox">
Ime  <a id="promeni_ime" srv_name="{$server.name}" srv_id="{$id}" href="javascript:void(0)"><img src="../template/img/edit.png" /></a> : <input class="input" type="text" value="{$server.name}" readonly /> <div class="space123"></div>
Istice : <input class="input" type="text" value="{if $server_istice|date_format:"%Y.%m.%d" lt $smarty.now|date_format:"%Y.%m.%d"}{$server_istice}{else}{$server_istice}{/if}" readonly /> <div class="space123"></div>
Igra : <input class="input" type="text" value="{if $server_igra eq 'CS'}Counter-Strike 1.6{else}San Andreas Multiplayer{/if}" readonly /> <div class="space123"></div>
Mod : <input class="input" type="text" value="{$server_mod}" readonly /> <div class="space123"></div>
Map <a id="default_mapa" srv_map="{$server.map}" srv_id="{$id}" href="javascript:void(0)"><img src="../template/img/edit.png" /></a> : <input class="input" type="text" value="{$server.map}" readonly /> <div class="space123"></div>
IP adresa : <input class="input" type="text" value="{$server.ip}:{$server.port}" readonly /> <div class="space123"></div>
Status : <input type="text" style="background:none;border:none;" disabled="disabled" class="{if $server.status eq 'Aktivan'}zelena{else}crvena{/if}"  value="{$server.status}" />  <div class="space123"></div>
</div>
</div>
<div id="desno">

{if $server.startovan eq 1}
<div id="serverinfocontrolbox">
<a href="main.php?page=server&id={$id}&action=restart"><div class="defaultbtn"> <center> RESTART<br> <font color="red" size="1" >RESTARTUJ SERVER</font> </div> </a> <div class="space111"></div>
<a href="main.php?page=server&id={$id}&action=stop"><div class="defaultbtn"> <center> STOP <br> <font color="red" size="1" >STOPIRAJ SERVER</font></div> </a><div class="space111"></div>
<a href="main.php?page=ftp&id={$id}&path=/"><div class="defaultbtn"> <center> WEB FTP <br> <font color="red" size="1" >PRISTUP FAJLOVIMA</font></div> </a> <div class="space111"></div>
<a id="promeni_mod_dugme" srv_id="{$id}" href="javascript:void(0)"><div class="defaultbtn"> <center> MOD <br> <font color="red" size="1" >PROMJENI MOD</font> </div> </a> <div class="space111"></div>
</div>
{else}
<div id="serverinfocontrolbox">
<a href="main.php?page=server&id={$id}&action=start"><div class="defaultbtn"> <center> START<br> <font color="red" size="1" >RESTARTUJ SERVER</font> </div> </a> <div class="space111"></div>
<a href="main.php?page=ftp&id={$id}&path=/"><div class="defaultbtn"> <center> WEB FTP <br> <font color="red" size="1" >PRISTUP FAJLOVIMA</font></div> </a> <div class="space111"></div>
<a id="promeni_mod_dugme" srv_id="{$id}" href="javascript:void(0)"><div class="defaultbtn"> <center> MOD <br> <font color="red" size="1" >PROMJENI MOD</font> </div> </a> <div class="space111"></div>
</div>
{/if}

</div>

<div id="centar">
<div id="ftpinfobox">
<div id="serverinfolabelbox">
Ip Adresa <br />
Ftp Port <br />
User <br />
Password<br />
</div>
<div id="serverinfotextbox">
{$server.ip} <br />
{$ftp_port}<br />
{$server.username}<br />
(nije dostupno na vasem korisniku)<br />
	</div></div>


<div id="statusinfobox">
<div id="serverinfolabelbox">
Status <br />
Naziv <br />
Mapa <br />
Igraci
</div>
<div id="serverinfotextbox">
{$status}<br />
{$ime_servera}<br />
{$server_mapa}<br />
{$broj_igraca}/{$maximalan_br_igraca} <a href="main.php?page=server&id={$id}"> <span style=color:green;>Refrish </span> </a> <br />  
</div>

<div id="serverinfodownloadbox">

<div id="serverinfolinkbox">
<a href="http://www.gametracker.rs/server_info/{$server.ip}:{$server.port}/" target="_new">Click here to check GT.rs Statistics </a>
</div></div></div>

	
<div id="webftpbox">
<a href="main.php?page=ftp_file&id={$id}&path=/&file=server.cfg"> server.cfg</a>
<a href="main.php?page=ftp&id={$id}&path=/scriptfiles"> scriptfiles</a>
<a href="main.php?page=ftp&id={$id}&path=/gamemodes"> gamemodes</a>
<a href="main.php?page=ftp_file&id={$id}&path=/&file=server_log.txt"> log.txt</a> 
</div>

</div>	

{/if}



{/if}




<div id="footer"></div>