<div id="content">
        
        
        
<h1>Mass email</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Posalji email</div>
    <div class="content">
    <form action="" method="post">
        <div class="input long">
            <label for="naslov">Korisnici:</label>
            <input type="text" name="korisnici" id="korisnici" value="{$korisnici}" />
        </div> 
        <div class="input long">
            <label for="naslov">Naslov:</label>
            <input type="text" name="naslov" id="naslov" />
        </div>                        
        <div class="input textarea">
            <label for="text">Text</label>
            <textarea name="text" id="text" rows="7" class="wysiwyg" cols="4">
            </textarea>
        </div>      
        <div class="submit">
            <input type="submit" name="mass_email" value="Dodaj" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
