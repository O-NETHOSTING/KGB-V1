
<div id="content">
<div id="boxp3">	
<br />
<div id="infoo">
	<div id="infoi"><img src="template/images/podrska.png"/></div>
	Otvorite Vas tiket
</div>
<div id="buttton">
	<a href="./main.php?page=podrska&arhiva=yes" style="text-decoration: none;"><input type="submit" value="Svi tiketi" id="button" /></a>
	<a href="./main.php?page=otvori_tiket" style="text-decoration: none;"><input type="submit" value="Novi tiket" id="button" /></a>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="data">
	<thead>
	<tr>
        <th width="90">Status</th>
        <th width="115">ID Tiketa</th>	
		<th width="90">Datum</th>		
		<th width="190">Server</th>
		<th width="160">Naslov tiketa</th>
		<th width="150">Broj poruka</th>
		<th width="120">Poslednji odgovor</th>
	</tr>
	</thead> 
	{foreach from=$tiketi item=tiket}
	<tr>
		<td colspan="1" height="20px">{$tiket.status}</td>
		<td colspan="1" height="20px"><a href="main.php?page=tiket&id={$tiket.id}">#{$tiket.id}</a></td>
		<td colspan="1" height="20px">{$tiket.datum|date_format:"%d.%m.%Y"}</td>
		<td colspan="1" height="20px">{$tiket.ip}:{$tiket.port}</td>
		<td colspan="1" height="20px"><a href="main.php?page=tiket&id={$tiket.id}">
{if $tiket.naslov|count_characters > 21} 
{$tiket.naslov|substr:0:21}...
{else}
{$tiket.naslov}
{/if}
</a></td>
		<td colspan="1" height="20px">{$tiket.broj_odgovora}</td>
		<td colspan="1" height="20px">{$tiket.zadnji_odgovor|date_format:"%H:%M:%S"}</td>
	</tr>		
	{foreachelse}	
	<tbody>
	<tr>
		<td colspan="6" height="20px">Nemate jos nijedan tiket.</td>
	</tr>
	</tbody>
	{/foreach}
</table>