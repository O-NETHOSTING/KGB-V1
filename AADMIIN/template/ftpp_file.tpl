<div id="content">
        
        
        
<h1>Promena Akcije</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">
    	Server: {$server_info.name} <span style="margin-left: 100px;">IP:{$server_info.ip}:{$server_info.port}</span>
    </div>  
    <div class="content">
    <div class="lokacija">{$ftp_path}<a href="admin.php?page=ftp_file&id={$id}&path={$old_path}&file={$file}">{$file}</a><br /></div>
    <div class="linija"></div><br />
    <form method="post" name="file_edit" id="file_edit" action="">
        <div class="input long">
            <textarea name="new_file" spellcheck="false" id="naslov" cols="100%" rows="25" class="edit_file_textare">{$ftp_contents}</textarea>
        </div>            
        </div>      
        <div class="submit">
            <input type="submit" name="dodaj" value="Dodaj" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
