<div id="content">
        
        
        
<h1>Dodavanje Mašine</h1>
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
            <input type="text" name="ime" id="ime" />
        </div>                
        <div class="input long">
            <label for="ip">IP:</label>
            <input type="text" name="ip" id="ip" />
        </div>
     
        <div class="input long">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" />
        </div>  
        
        <div class="input long">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" />
        </div>  
        
        <div class="input long">
            <label for="ftp_port">FTP Port:</label>
            <input type="text" name="ftp_port" id="ftp_port" />
        </div>  
        
        <div class="input long">
            <label for="ssh_port">SSH Port:</label>
            <input type="text" name="ssh_port" id="ssh_port" />
        </div>  
        
       <div class="input long">
            <label for="lokacija">Lokacija:</label>
            <input type="text" name="lokacija" id="lokacija" />
        </div>           
        
        <div class="submit">
            <input type="submit" name="dodaj_masinu" value="Dodaj" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
