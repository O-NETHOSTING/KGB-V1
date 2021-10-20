
{if $error}

<div id="error" style="display:none;">{$error}</div>

{else}

{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}

<div id="content">
<div id="boxp3"><br />	<br />		
TRENUTNO NIJE DOSTUPNO!!!
<br />	<br />	

<div id="otvori_tiket">
<div id="novosti_title"><img border="0" src="template/images/otvori_tiket.png"></div>
<div class="module_line"></div>
<div id="podrska_opis">
Popunjavanjem ovog formulara otvarate novi support tiket.<br />
Potrudite se da sto detaljnije opisete problem koji imate oko servera i nas support tim ce vam odgovoriti u najkracem roku. <br />
</div><br>
<div id="podrska_otvori_tiket">
<form action="main.php?page=podrska" method="post">
<label for="tiket_title">Naslov:</label> <input type="text" name="tiket_title" />
<div class="clear"></div>
<label for="serveri">Server:</label> 
<select name="serveri" >
{foreach from=$serveri item=srv}
<option value="{$srv.id}">{$srv.ip}:{$srv.port}</option>
{/foreach}
</select>
<div class="clear"></div>
<label for="pitanje">Pitanje:</label>
<textarea name="pitanje"></textarea>
<div class="clear"></div>
<div id="test" style="margin-left: 80px;"><input type="submit" value="Sacuvaj" id="button" /></div><br />
</form>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<div class="clear"></div>



{/if}
</div>