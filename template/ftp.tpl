<div id="content">
{if $error}

<div id="error" style="display:none;">{$error}</div>

{else}

{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}
<div id="boxp3">
<div id="infoo"><br>
	<div id="infoi"><img src="template/images/web_ftp2.png"/></div>
	<p><pl></pl><br /><br /><br />Vasi WebFTP Fajlovi</p>
</div>

<table cellpadding="0" cellspacing="0" border="0" class="data">
	<thead>
	<tr>
		<th>
		<div id="ftp_home" style="margin-left: 2px; margin-top: 2px;">
			<a href="main.php?page=ftp&id={$id}&path=/"><img src="template/images/ftp_home.png" border="0" /></a>
		</div>
		{$ftp_path}
		</th>
	</tr>
	</thead>
</table>
<table cellpadding="0" cellspacing="0" border="0" class="data">
	<thead>
	<tr>
        <th width="230">Fajlovi i folderi</th>
        <th width="150">Velicina</th>	
		<th width="120">User</th>		
		<th width="120">Group</th>
		<th width="100">Permisije</th>
		<th width="100">Akcija</th>
	</tr>
	</thead> 
	<tbody>{foreach from=$ftp_folderi item=x}
	<tr>
		<td colspan="1" height="20px">
		<img src="template/images/ftp_folder.png" border="0" /> <a href="main.php?page=ftp&id={$id}&path={$old_path}{$x.8}">
		{if $x.8|count_characters > 18} 
		{$x.8|substr:0:18}...
		{else}
		{$x.8}
		{/if}</a><br />
		</td>
		<td colspan="1" height="20px">
		{if $x.4 < 1024} 
		{$x.4} B
		{elseif $x.4 < 1048576} 
		{math|string_format:"%.2f" equation="size / 1024" size=$x.4} KB 
		{else} 
		{math|string_format:"%.2f" equation="size / 1024 / 1024" size=$x.4} MB 
		{/if} 
		</td>
		<td colspan="1" height="20px">
		{$x.2}
		</td>
		<td colspan="1" height="20px">
		{$x.3}
		</td>
		<td colspan="1" height="20px">
		{$x.0}
		</td>
		<td colspan="1" height="20px">
		<img id="delete_folder" class="delete_folder" informacije="{$id},{$old_path},{$x.8}" src="template/images/ftp_delete.png" border="0" />
		</td>
	</tr>
	{/foreach}
	
	{foreach from=$ftp_fajlovi item=x}
	<tr>
		<td colspan="1" height="20px">
		<img src="template/images/ftp_fajl.png" border="0" /> 
		{if $x.9} 
		<a href="main.php?page=ftp_file&id={$id}&path={$old_path}&file={$x.8}">
		{if $x.8|count_characters > 18} 
		{$x.8|substr:0:18}...
		{else}
		{$x.8}
		{/if}
		</a>
		{else}

		{if $x.8|count_characters > 18} 
		{$x.8|substr:0:18}...
		{else}
		{$x.8}
		{/if}

		{/if}		
		</td>	
		<td colspan="1" height="20px">
		{if $x.4 < 1024} 
		{$x.4} B
		{elseif $x.4 < 1048576} 
		{math|string_format:"%.2f" equation="size / 1024" size=$x.4} KB 
		{else} 
		{math|string_format:"%.2f" equation="size / 1024 / 1024" size=$x.4} MB 
		{/if} 
		</td>	
		<td colspan="1" height="20px">
		{$x.2}
		</td>	
		<td colspan="1" height="20px">
		{$x.3}
		</td>	
		<td colspan="1" height="20px">
		{$x.0}
		</td>	
		<td colspan="1" height="20px">
		<img id="delete_file" class="delete_file" ftp_id="{$id}" ftp_path="{$old_path}" ftp_fname="{$x.8}" src="template/images/ftp_delete.png" border="0" />
		{if $x.9} 
		<a href="main.php?page=ftp_file&id={$id}&path={$old_path}&file={$x.8}"><img src="template/images/ftp_edit.png" border="0" /></a>
		{/if} 
		</td>
	</tr>
	{/foreach}			
	</tbody>
</table>

<div class="clear"></div>
</div>
<div id="boxp3">
<div id="upload_file" style="margin-left: 23px;">
<div id="upload_file_title"><img src="template/images/upload_file.png" border="0" /></div>
<div id="upload_form">
<form action="main.php?page=ftp&id={$id}&path={$old_path}" method="post" enctype="multipart/form-data">
<input type="hidden" name="upload_file" value="yes" />
<input type="file" name="file" class="filename" size="25" /> 
<input type="image" src="template/images/upload_button.png" class="upload_button" />
</form>
</div>
</div>

<div id="create_folder" style="margin-right: 23px;">
<div id="create_folder_title"><img src="template/images/make_new_folder.png" border="0" /></div>
<div id="create_folder_form">
<form method="post" action="main.php?page=ftp&id={$id}&path={$old_path}">
<input type="text" class="create_folder_input" name="folder_name" />
<input type="image" src="template/images/ftp_yes.png" class="input_yes" />
</form>
</div>
</div>
</div>
<div class="clear"></div>
</div>

{/if}


