{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}

<br /><br />

<table class="morphtbl">
<tr>
<th>IP</th>
<th>Hostname</th>
<th>Vreme</th>
</tr>

{foreach from=$logovi item=log}
<tr>
<td>{$log.ip} </td> <td>{$log.hostname}</td> <td>{$log.vreme|date_format:"%Y-%m-%d %H:%M"}</td>
</tr>
<div class="clear"></div>
{foreachelse}

</table>

<span style="font-family:TAHOMA;font-size:12px;font-weight:bold;margin-left:10px;"><br /> <center>Ova opcija je iskljucena na vasem racunu!</center></span><br /><br />

{/foreach}

</table>

<br />