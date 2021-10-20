<div id="content">
        
        
        
<h1>Uređivanje Klijenta</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Informacije o Klijentu</div>
    <div class="content">
    <form action="" method="post">
        <input type="hidden" name="uredi_klijenta" value="1" />
        <div class="input long">
            <label for="fname">Ime:</label>
            <input type="text" name="fname" id="fname" value="{$fname}" />
        </div>                
        <div class="input long">
            <label for="lname">Prezime:</label>
            <input type="text" name="lname" id="lname" value="{$lname}" />
        </div>
        <div class="input long">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{$email}" />
        </div>        
        <div class="input">
            <label class="label">Resetuj Lozinku</label>
            <input type="radio" id="radio1" name="podatci" value="1"  /><label for="radio1" class="inline">Da</label> <br/>
            <input type="radio" id="radio2"  name="podatci" value="0" checked="checked" /> <label for="radio2" class="inline">Ne</label>
        </div>    
        <div class="submit">
            <input type="submit" value="Uredi" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
