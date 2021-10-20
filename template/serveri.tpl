<div id="content">
<br />
<div id="boxp3">
<div id="infoo"><br>
	<div id="infoi"><img src="template/images/serveri.png"/></div>
	<p><pl></pl><br /><br /><br />Lista vasih servera.</p>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="data">
	<thead>
	<tr>
        <th width="150">Ime Servera</th>
        <th width="200">Ip adresa</th>	
		<th width="10">Slotovi</th>		
		<th width="30">Vazi do</th>
		<th width="100">Igra</th>
		<th width="40">Status</th>
	</tr>
	</thead> 
	{foreach from=$serveri item=srv}
	<tr>
		<td colspan="1" height="20px"><a href="main.php?page=server&id={$srv.id}">{$srv.name}</a></td>
		<td colspan="1" height="20px">{$srv.ip}:{$srv.port}</td>
		<td colspan="1" height="20px">{$srv.slotovi}</td>
		<td colspan="1" height="20px">{if $srv.istice|date_format:"%Y.%m.%d" gt $smarty.now|date_format:"%Y.%m.%d"} {$srv.istice|date_format:"%d.%m.%Y"} {else} <font color="red">{$srv.istice|date_format:"%d.%m.%Y"}</font> {/if}</td>
		{if $srv.mod eq '7'}<td colspan="1" height="20px">SA:MP</td> {else}<td colspan="1" height="20px">Counter-Strike 1.6</td> {/if}
		<td colspan="1" height="20px" {if $srv.status eq 'Aktivan'}zelena{else}crvena{/if}>{$srv.status}</td>
	</tr>		
	{foreachelse}	
	<tbody>
	<tr>
		<td colspan="6" height="20px">Trenutno nemate nijedan server.</td>
	</tr>
	</tbody>
	{/foreach}
</table>
<br /><br />
</boxp3>
</body>
</html>

