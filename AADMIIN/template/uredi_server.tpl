<div id="content">
        
        
        
<h1>Uređivanje Servera</h1>
{if $message}
{$message}
{/if}

  
       
<div class="bloc">
    <div class="title">
        Informacije
    </div>
    <div class="content">
       <form action="" method="post">
        <div class="input long">
            <label for="ime">Ime Servera</label>
            <input type="text" name="ime" id="ime" value="{$ime}" />
        </div>    
        
        <div class="input">
            <label for="mapa">Mapa</label>
            <input type="text" name="mapa" id="mapa" value="{$mapa}" />
        </div>        

        <div class="input">
            <label for="port">Port</label>
            <input type="text" name="port" id="port" value="{$port}" />
        </div>
        
        <div class="input">
            <label for="fps">FPS</label>
            <input type="text" name="fps" id="fps" value="{$fps}" />
        </div>      
		
        {if $admin.status eq "support"}        
        <div class="input">
            <label for="slotovi">Slotovi</label>
            <input type="text" name="slotovi" readonly="readonly" id="slotovi" value="{$slotovi}" />
        </div>  
		{/if}
        {if $admin.status eq "admin"}        
        <div class="input">
            <label for="slotovi">Slotovi</label>
            <input type="text" name="slotovi" id="slotovi" value="{$slotovi}" />
        </div>  
		{/if}
		{if $admin.status eq "support"}
        <div class="input">
            <label for="istice">Ističe</label>
            <input type="text" class="datepickerr" readonly="readonly" name="istice" value="{$istice}" id="istice"/>Radnicima onemogućena opcija
        </div> 		
		{/if}
		{if $admin.status eq "admin"}
        <div class="input">
            <label for="istice">Ističe</label>
            <input type="text" class="datepicker" readonly="readonly" name="istice" value="{$istice}" id="istice"/>
        </div> 
        {/if}      
        <div class="input">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Aktivan">Aktivan</option>
                <option value="Suspendovan" {if $status eq "Suspendovan"} selected="1" {/if}>Suspendovan</option>
            </select>
        </div>
		{if $admin.status eq "admin"}
        <div class="input">
            <label for="free">Free</label>
            <select name="free" id="free">
                <option value="0">Ne</option>
                <option value="1" {if $free eq "1"} selected="1" {/if}>Da</option>
            </select>
        </div>
		{/if}
		{if $admin.status eq "support"}
        <div class="input">
            <label for="free">Free</label>
            <input type="text" readonly="readonly" name="free" value="{if $free eq '1'}Da{else}Ne{/if}" id="free" />
        </div>		
		{/if}
        <div class="input">
            <label for="uplatnica">Uplatnica</label>
            <input type="text" {if $admin.status eq "support"}readonly="readonly" {/if}name="uplatnica" id="uplatnica" value="{$uplatnica}" />Radnicima onemogućena opcija
        </div>
                
        <div class="submit">
            <center>
            <input type="submit" name="spremi_izmjene" value="Spremi Izmjene" />
            <input type="reset" value="Izbriši" onclick="document.location = 'admin.php?page=serveri&akcija=lista&brisi={$id}';" />
            <input type="reset" class="black" value="Logiraj se kao klijent" onclick="window.open('{$link}index.php?support={$user_id}');" />
            <input type="reset" class="black" value="Profil Klijenta" onclick="document.location = '{$link}admin/admin.php?page=klijenti&akcija=pregled&id={$user_id}';" />
            </center>
        </div>    
        </form>
        </div>
    </div>
</div>
            
                     




</div>
        
        
