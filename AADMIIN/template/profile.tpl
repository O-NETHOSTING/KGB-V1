<div id="content">
        
        
        
<h1>Izmene Administratorkog Profila</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Informacije o Profilu</div>
    <div class="content">
    <form action="" method="post">
        <div class="input long">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" id="ime" value="{$ime}" />
        </div>                
        <div class="input long">
            <label for="prezime">Prezime:</label>
            <input type="text" name="prezime" id="prezime" value="{$prezime}" />
        </div>
        <div class="input long">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="{$username}" />
        </div>  
        
        <div class="input long">
            <label for="password">Password (Nije Vidljiv):</label>
            <input type="password" name="password" id="password" value="{$password}" />
        </div>     
        
        <div class="input long">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{$email}" />
        </div>     
        <div class="submit">
            <input type="submit" name="uredi_profil" value="Uredi" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
