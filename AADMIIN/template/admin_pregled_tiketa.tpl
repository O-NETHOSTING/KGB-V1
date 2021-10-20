<div id="content">
        
        
        
<h1>Pregled Tiketa</h1>
{if $message}
{$message}
{/if}

  
       
<div class="bloc">
    <div class="title">
        Tiket
    </div>
    <div class="content">

         <table class="noalt">
            <tbody>
                {foreach from=$odgovori item=odgovor}
                <tr>
                    <td>
                        <p>

                            <strong>{$odgovor.korisnik}</strong><br/>
                            <em>{$odgovor.vrijeme_odgovora}</em><br/>
{$odgovor.odgovor}
                        </p>
                    </td>
                </tr>
                {/foreach}
                      
                                      
            </tbody>
        </table>       
        <form action="" method="post">
        <div class="input textarea">
            <label for="odgovor">Odgovor</label>
            <textarea name="odgovor" id="odgovor" rows="7" cols="4"></textarea>
        </div> 
        <div class="submit">
            <center>
            <input type="submit" name="spremi_izmjene" value="Odgovori" />
            <input type="reset" class="black" value="Zatvori" onclick="document.location = '{$link}admin.php?page=tiket&akcija=pregled&id={$id}&zatvori=yes';" />
            <input type="reset" class="black" value="Izbriši" onclick="document.location = '{$link}admin.php?page=podrska&status=Neodgovoren&brisi={$id}';" />
            </center>
        </div>            
        </form>
        </div>
    </div>
</div>
            
                     




</div>
        
        
