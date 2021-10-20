
<div id="content">
{if $error}

<div id="error" style="display:none;">{$error}</div>

{/if}        
        
        
<h1>Web FTP</h1>
               
{if $message}
{$message}
{/if}
<div class="bloc">

    <div class="title">
    	Server: {$server_info.name} <span style="margin-left: 100px;">IP:{$server_info.ip}:{$server_info.port}</span>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>

                    <th>Naslov</th>
                    <th>Datum</th>
                    <th>Skrivena</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$ftp_folderi item=x}
                <tr>
                    <td>		
                    <img src="template/img/ftp_folder.png" border="0" /> <a href="admin.php?page=ftp&id={$id}&path={$old_path}{$x.8}">
                    {if $x.8|count_characters > 18} 
                    {$x.8|substr:0:18}...
                    {else}
                    {$x.8}
                    {/if}</a><br />
                    <td>
                    {if $x.4 < 1024} 
                    {$x.4} B
                    {elseif $x.4 < 1048576} 
                    {math|string_format:"%.2f" equation="size / 1024" size=$x.4} KB 
                    {else} 
                    {math|string_format:"%.2f" equation="size / 1024 / 1024" size=$x.4} MB 
                    {/if} 
                    </td>
                    <td>{$x.2}</td>
                    <td>{$x.3}</td>
                    <td>{$x.0}</td>
                    <td class="actions"><img id="delete_folder" class="delete_folder" informacije="{$id},{$old_path},{$x.8}" src="template/img/icons/delete.png" alt="" /></td>
                </tr>
             {/foreach}
             
             {foreach from=$ftp_fajlovi item=x}
                <tr>
                    <td>		
                    <img src="template/img/ftp_fajl.png" border="0" /> 
                    {if $x.9} 
                    <a href="admin.php?page=ftp_file&id={$id}&path={$old_path}&file={$x.8}">
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
                    <td>
                    {if $x.4 < 1024} 
                    {$x.4} B
                    {elseif $x.4 < 1048576} 
                    {math|string_format:"%.2f" equation="size / 1024" size=$x.4} KB 
                    {else} 
                    {math|string_format:"%.2f" equation="size / 1024 / 1024" size=$x.4} MB 
                    {/if} 
                    </td>
                    <td>{$x.2}</td>
                    <td>{$x.3}</td>
                    <td>{$x.0}</td>
                    <td class="actions">
                    {if $x.9} 
                    	<a href="admin.php?page=ftp_file&id={$id}&path={$old_path}&file={$x.8}"><img src="template/img/icons/edit.png" border="0" /></a>
                    {/if}                     
                    <img id="delete_folder" class="delete_folder" informacije="{$id},{$old_path},{$x.8}" src="template/img/icons/delete.png" alt="" /></a>		
        			</td>
                </tr>
			{/foreach}
            </tbody>

        </table>
    </div>
</div>
                

       


</div>
        
        


