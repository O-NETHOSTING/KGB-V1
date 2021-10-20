<div id="content">
        
        
        
<h1>Uređivanje Moda</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Informacije o Modu</div>
    <div class="content">
    <form action="" method="post">
        <input type="hidden" name="uredi_klijenta" value="1" />
        <div class="input long">
            <label for="ime">Ime:</label>
            <input type="text" name="ime" id="ime" value="{$ime}" />
        </div>       
        <div class="input long">
            <label for="igra">Igra:</label>
            <input type="text" name="igra" id="igra" value="{$igra}" />
        </div>         
        <div class="input long">
            <label for="putanja">Putanja:</label>
            <input type="text" name="putanja" id="putanja" value="{$putanja}" />
        </div>
        <div class="input long">
            <label for="putanja">Default mapa:</label>
            <input type="text" name="mapa" id="mapa" value="{$mapa}" />
        </div>
		<div class="input textarea">
            <label for="komanda">Komanda</label>
            <textarea name="komanda" id="komanda" rows="7" cols="4">{$komanda}</textarea>
        </div>      
        <div class="input">
            <label class="label">Skriven</label>
            <input type="radio" id="radio1" name="skriven" value="1" {if $hidden eq 1}checked="checked"{/if} /><label for="radio1" class="inline">Da</label> <br/>
            <input type="radio" id="radio2"  name="skriven" value="0" {if $hidden eq 0}checked="checked"{/if} /> <label for="radio2" class="inline">Ne</label>
        </div>    
        <div class="submit">
            <input type="submit" name="uredi_mod" value="Uredi" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
