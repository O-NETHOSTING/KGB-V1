<div id="content">
        
        
        
<h1>Dodavanje Servera</h1>
{if $message}
{$message}
{/if}

<div class="bloc">
    <div class="title">Informacije o Serveru</div>
    <div class="content">
   

{if $korak eq 1} 
        <form action="" method="get">
            <input type="hidden" name="page" value="serveri" /> 
            <input type="hidden" name="akcija" value="dodaj" /> 
            <input type="hidden" name="korak" value="2" />    
        <div class="input">
            <label for="klijent">Odaberi Klijenta</label>
            <select name="klijent" id="klijent">
                {foreach from=$klijenti item=klijent}
                <option value="{$klijent.id}">{$klijent.fname} {$klijent.lname}</option>
                {foreachelse}
                    <option value="0">Nema klijenata</option>
                {/foreach}
            </select>
        </div>  
        <div class="submit">
            <input type="submit" value="Dalje" />
        </div>  
       </form>             
 {/if}
     
 
 {if $korak eq 2}
 
       <form action="" method="get">
            <input type="hidden" name="page" value="serveri" /> 
            <input type="hidden" name="akcija" value="dodaj" />
            <input type="hidden" name="klijent" value="{$klijent}" />
            <input type="hidden" name="korak" value="3" />    
        <div class="input">
            <label for="masina">Odaberi Mašinu</label>
            <select name="masina" id="masina">
                {foreach from=$masine item=masina}
                <option value="{$masina.id}">{$masina.name}</option>
                {foreachelse}
                    <option value="0">Nema mašina</option>
                {/foreach}
            </select>
        </div>  
        <div class="submit">
            <input type="submit" value="Dalje" />
        </div>  
       </form>
     
 {/if}   
 
 
  {if $korak eq 3}
 
       <form action="" method="get">
            <input type="hidden" name="page" value="serveri" /> 
            <input type="hidden" name="akcija" value="dodaj" />
            <input type="hidden" name="klijent" value="{$klijent}" />
            <input type="hidden" name="masina" value="{$masina}" /> 
            <input type="hidden" name="korak" value="4" />  
        <div class="input">
            <label for="ip">Odaberi IP</label>
            <select name="ip" id="ip">
                {foreach from=$ip_adrese item=ip}
                <option value="{$ip.id}">{$ip.ip}</option>
                {foreachelse}
                    <option value="0">Nema ip adresa</option>
                {/foreach}
            </select>
        </div>  
        <div class="submit">
            <input type="submit" value="Dalje" />
        </div>  
       </form>
     
 {/if}
 
 
 
  {if $korak eq 4}
 
       <form action="" method="get">
            <input type="hidden" name="page" value="serveri" /> 
            <input type="hidden" name="akcija" value="dodaj" />
            <input type="hidden" name="klijent" value="{$klijent}" />
            <input type="hidden" name="masina" value="{$masina}" /> 
            <input type="hidden" name="ip" value="{$ip}" />
            <input type="hidden" name="korak" value="7" />  
        <div class="input">
            <label for="mod">Odaberi Mod</label>
            <select name="mod" id="mod">
                {foreach from=$modovi item=mod}
                <option value="{$mod.id}">{$mod.ime}</option>
                {foreachelse}
                    <option value="0">Nema modova</option>
                {/foreach}
            </select>
        </div>  
        <div class="submit">
            <input type="submit" value="Dalje" />
        </div>  
       </form>
     
 {/if} 
 
   {if $korak eq 7}
 
       <form action="" method="get">
            <input type="hidden" name="page" value="serveri" /> 
            <input type="hidden" name="akcija" value="dodaj" />
            <input type="hidden" name="klijent" value="{$klijent}" />
            <input type="hidden" name="masina" value="{$masina}" /> 
            <input type="hidden" name="ip" value="{$ip}" />	
			<input type="hidden" name="mod" value="{$mod}" /> 			
            <input type="hidden" name="korak" value="8" />  
        <div class="input">
            <label for="vrsta">Vrsta servera</label>
            <select name="vrsta" id="vrsta">
                <option value="1">Plaćen server</option>
				<option value="2">Free server</option>
            </select>
        </div> 
        <div class="submit">
            <input type="submit" value="Dalje" />
        </div>  
       </form>
     
 {/if} 
 
{if $korak eq 8}
	{if $vrsta eq 1}
       <form action="" method="get">
            <input type="hidden" name="page" value="serveri" /> 
            <input type="hidden" name="akcija" value="dodaj" />
            <input type="hidden" name="klijent" value="{$klijent}" />
            <input type="hidden" name="masina" value="{$masina}" /> 
            <input type="hidden" name="ip" value="{$ip}" />	
			<input type="hidden" name="mod" value="{$mod}" /> 
			<input type="hidden" name="vrsta" value="{$vrsta}" />				
            <input type="hidden" name="korak" value="5" />  
        <div class="input long">
            <label for="uplatnica">Slika uplatnice</label>
            <input type="text" name="uplatnica" id="uplatnica" />
        </div>    
        <div class="submit">
            <input type="submit" value="Dalje" />
        </div>  
       </form>	
	{/if}
	
	{if $vrsta eq 2}
       <form action="admin.php?page=serveri&akcija=lista" method="post">
             <input type="hidden" name="klijent" value="{$klijent}" />
            <input type="hidden" name="masina" value="{$masina}" /> 
            <input type="hidden" name="ip" value="{$ip}" />	
			<input type="hidden" name="mod" value="{$mod}" /> 
			<input type="hidden" name="vrsta" value="{$vrsta}" />
			<input type="hidden" name="free" value="1" /> 
			<input type="hidden" name="uplatnica" value="" /> 

       <div class="input long">
            <label for="name">Ime Servera</label>
            <input type="text" name="name" id="name" />
        </div>  

        <div class="input long">
            <label for="name">Username servera</label>
            <input type="text" name="username_servera" id="username_servera" />
        </div>		
            
        <div class="input long">
            <label for="slotovi">Broj slotova</label>
            <input type="text" name="slotovi" id="slotovi" />
        </div>  
        
        <div class="input long">
            <label for="mapa">Mapa</label>
            <input type="text" name="mapa" id="mapa" value="{$mapa}" />
        </div>         
            
        <div class="input long">
            <label for="port">Port</label>
            <input type="text" name="port" id="port" value="{$port}" />
        </div> 

        <div class="input long">
            <label for="fps">FPS</label>
            <input type="text" name="fps" id="fps" value="300" />
        </div>         
 
       <div class="input">
            <label for="istice">Ističe</label>
            <input type="text" class="datepicker" name="istice" id="istice"/>
        </div>            
 
         <div class="input">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Aktivan">Aktivan</option>
                <option value="Aktivan">Neaktivan</option>
            </select>
        </div>             
            
        <div class="submit">
            <input type="submit" name="dodaj_server" value="Dodaj" />
        </div>  
       </form>	
	{/if}  
 {/if} 
 
   {if $korak eq 5}
 
       <form action="admin.php?page=serveri&akcija=lista" method="post">
            <input type="hidden" name="klijent" value="{$klijent}" />
            <input type="hidden" name="masina" value="{$masina}" /> 
            <input type="hidden" name="ip" value="{$ip}" />	
			<input type="hidden" name="mod" value="{$mod}" /> 
			<input type="hidden" name="vrsta" value="{$vrsta}" />
			<input type="hidden" name="uplatnica" value="{$uplatnica}" /> 
			<input type="hidden" name="free" value="0" /> 

       <div class="input long">
            <label for="name">Ime Servera</label>
            <input type="text" name="name" id="name" />
        </div>             
            
        <div class="input long">
            <label for="slotovi">Broj slotova</label>
            <input type="text" name="slotovi" id="slotovi" />
        </div>  
        
        <div class="input long">
            <label for="mapa">Mapa</label>
            <input type="text" name="mapa" id="mapa" value="de_dust2" />
        </div>         
            
        <div class="input long">
            <label for="port">Port</label>
            <input type="text" name="port" id="port" value="{$port}" />
        </div> 

        <div class="input long">
            <label for="fps">FPS</label>
            <input type="text" name="fps" id="fps" value="300" />
        </div>         
 
       <div class="input">
            <label for="istice">Ističe</label>
            <input type="text" class="datepicker" name="istice" id="istice"/>
        </div>            
 
         <div class="input">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="Aktivan">Aktivan</option>
                <option value="Aktivan">Neaktivan</option>
            </select>
        </div>             
            
        <div class="submit">
            <input type="submit" name="dodaj_server" value="Dodaj" />
        </div>  
       </form>
     
 {/if}
 
     
    </div>
</div>    
       


</div>
        
        
