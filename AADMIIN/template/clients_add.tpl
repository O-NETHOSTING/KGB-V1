<div id="content">
        
        
        
<h1>Dodavanje Klijenta</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Informacije o Klijentu</div>
    <div class="content">
    <form action="" method="post">
        <div class="input long">
            <label for="fname">Ime:</label>
            <input type="text" name="fname" id="fname" />
        </div>                
        <div class="input long">
            <label for="lname">Prezime:</label>
            <input type="text" name="lname" id="lname" />
        </div>
        <div class="input long">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" />
        </div>        
        <div class="input">
            <label class="label">Pošalji Podake</label>
            <input type="radio" id="radio1" name="podatci" value="1"  checked="checked"/><label for="radio1" class="inline">Da</label> <br/>
            <input type="radio" id="radio2"  name="podatci" value="0" /> <label for="radio2" class="inline">Ne</label>
        </div>    
        <div class="submit">
            <input type="submit" name="dodaj_klijenta" value="Dodaj" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
