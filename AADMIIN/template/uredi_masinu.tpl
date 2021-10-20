<div id="content">
        
        
        
<h1>Uređivanje Mašine</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Informacije o Mašini</div>
    <div class="content">
    <form action="" method="post">
        <input type="hidden" name="uredi_klijenta" value="1" />
        <div class="input long">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" id="ime" value="{$ime}" />
        </div>                
        <div class="input long">
            <label for="ip">IP:</label>
            <input type="text" name="ip" id="ip" value="{$ip}" />
        </div>
     
        <div class="input long">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="{$username}" />
        </div>  
        
        <div class="input long">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="{$password}" />
        </div>  
        
        <div class="input long">
            <label for="ftp_port">FTP Port:</label>
            <input type="text" name="ftp_port" id="ftp_port" value="{$ftp_port}" />
        </div>  
        
        <div class="input long">
            <label for="ssh_port">SSH Port:</label>
            <input type="text" name="ssh_port" id="ssh_port" value="{$ssh_port}" />
        </div>  
        
       <div class="input long">
            <label for="lokacija">Lokacija:</label>
            <input type="text" name="lokacija" id="lokacija" value="{$lokacija}" />
        </div>           
        
        <div class="submit">
            <input type="submit" name="dodaj_masinu" value="Izmijeni" />
        </div>  
    </form>    
    </div>
</div>    
       

<div class="bloc left">

    <div class="title">
        Lista IP Adresa
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>
                    <th>IP</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$ip_adrese item=ip_adresa}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>{$ip_adresa.id}</td>
                    <td>{$ip_adresa.ip}</td>
                    <td class="actions"><a href="admin.php?page=box&akcija=uredi&id={$id}&brisiip={$ip_adresa.id}" title="Izbriši ovu ip adresu"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="4">Nema ni jedne ip adrese</td>
             </tr>
             {/foreach}

            </tbody>

        </table>
    </div>
</div>                   
  
                 
<div class="bloc right">

    <div class="title">
        Dodaj IP adresu
    </div>
    <div class="content">
    <form action="" method="post">
        <div class="input long">
            <label for="ip">IP:</label>
            <input type="text" name="ip" id="ip" />
        </div>                
        <div class="submit">
            <input type="submit" name="dodaj_ip" value="Dodaj" />
        </div>  
    </form>           
    </div>
</div>                 
                 
<div class="cb"></div>                 
                 

</div>
        
        
