<div id="content">
        
        
        
<h1>Dodavanje Radnika</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Informacije o Profilu</div>
    <div class="content">
    <form action="" method="post">
        <div class="input long">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" id="ime" />
        </div>                
        <div class="input long">
            <label for="prezime">Prezime:</label>
            <input type="text" name="prezime" id="prezime" />
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
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"/>
        </div> 
        
        <div class="input">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="admin">Admin</option>
                <option value="support">Support</option>
            </select>
        </div>        
        <div class="submit">
            <input type="submit" name="dodaj_radnika" value="Dodaj" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
