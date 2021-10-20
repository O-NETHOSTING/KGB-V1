<div id="content">
        
        
        
<h1>Dodavanje Obavijesti</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Sadržaj</div>
    <div class="content">
    <form action="" method="post">
        <div class="input long">
            <label for="naslov">Naslov:</label>
            <input type="text" name="naslov" id="naslov" />
        </div>                
        <div class="input">
            <label for="input4">Datum</label>
            <input type="text" name="datum" class="datepicker" id="input4"/>
        </div>
        <div class="input textarea">
            <label for="text">Text</label>
            <textarea name="text" id="text" rows="7" class="wysiwyg" cols="4">
            </textarea>
        </div>  
        <div class="input">
            <label class="label">Skrivena</label>
            <input type="radio" id="radio1" name="skriven" value="1" checked="checked" /><label for="radio1" class="inline">Da</label> <br/>
            <input type="radio" id="radio2"  name="skriven" value="0" /> <label for="radio2" class="inline">Ne</label>
        </div>    
        <div class="submit">
            <input type="submit" name="dodaj" value="Dodaj" />
        </div>  
    </form>    
    </div>
</div>    
       


</div>
        
        
