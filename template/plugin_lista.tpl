<div id="main">
{if $error}

<div id="error" style="display:none;">{$error}</div>

{else}

{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}

<div class="serveri_morph">
<img src="template/images/web_ftp2.png" border="0" />
<br />
Lista plugina i njihovo Menadziranje.<br />
</div>

<br />
</div>

<br />


<table style="margin-left:25px;width:900px;" class="morphtbl">
<tr>
<th>#ID</th>
<th>Ime Plugina</th>
<th>Opis Plugina</th>
<th>Velicina</th>
<th>Instalacija</th>
</tr>

{foreach $plugins as $plugin}
<tr>
<td>#{counter}</td>
<td>{$plugin.name}</td>
<td>Test Opis</td>
<td>{$plugin.size} kb</td>
<td><a href="?page=plugini&id={$server.id}&task=install&ime={$plugin.name}">Instalacija</a></td>

</tr>
{/foreach}
</table>



<br /><br />

<div class="clear"></div>
</div>


<br /><br />

{/if}
</div>

