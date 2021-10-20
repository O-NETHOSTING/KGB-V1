<div id="content">
        
        
        
<h1>Pregled Klijenta</h1>
{if $message}
{$message}
{/if}

  
       
<div class="bloc left">
    <div class="title">
        Informacije
    </div>
    <div class="content">
            <table class="noalt">
                <thead>
                    <tr>
                        <th colspan="2"><em>Klijent</em></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h4>Ime:</h4></td>
                        <td>{$ime}</td>
                    </tr>
                    <tr>

                        <td><h4>Prezime:</h4></td>
                        <td>{$prezime}</td>
                    </tr>
                    <tr>
                        <td><h4>Email:</h4></td>
                        <td>{$email}</td>
                    </tr>
                    <tr>
                        <td><h4>Broj Slotova:</h4></td>
                        <td>{$slotovi}</td>
                    </tr>                    
                    
                </tbody>
            </table>
                    <br />
                    <center>
        <div class="submit" style="float:left;">
            <form action="admin.php" method="get" >
            <input type="hidden" name="page" value="klijenti" />    
            <input type="hidden" name="akcija" value="lista" /> 
            <input type="hidden" name="brisi" value="{$id}" /> 
            <input type="submit" value="Izbriši Klijenta" />
            </form>
        </div>
        
      <div style="float:right;">
         <div class="submit" style="float:left; margin-right:10px;">
            <form action="admin.php" method="get">
            <input type="hidden" name="page" value="klijenti" />    
            <input type="hidden" name="akcija" value="uredi" /> 
            <input type="hidden" name="id" value="{$id}" /> 
            <input type="submit" value="Uredi Klijenta" />
            </form>
        </div>     
        
        <div class="submit" style="float:right;">
            <input type="reset" class="black" value="Logiraj se kao klijent" onclick="window.open('{$link}index.php?support={$id}');" />
        </div> 
      </div>        
                    </center>
                    <div style="clear:both"></div>
    </div>
   
</div>
            
            
<div class="bloc right">

    <div class="title">
        Lista Servera
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>
                    <th>Ime</th>
                    <th>IP</th>
                    <th>Broj Slotova</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$serveri item=server}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><a href="admin.php?page=serveri&akcija=uredi&id={$server.id}">{$server.id}</a></td>
                    <td>{$server.ime}</td>
                    <td>{$server.ip}:{$server.port}</td>
                    <td>{$server.slotovi}</td>
                    <td>{$server.status}</td>
                    <td class="actions"><a href="admin.php?page=serveri&akcija=lista&brisi={$server.id}" title="Izbriši ovaj server"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="7">Nema ni jednog servera</td>
             </tr>
             {/foreach}
	      <tr> <td colspan="7">
        <div class="submit" style="float:left;">
	    <input type="submit" value="Dodaj server" onclick="window.open('{$link}/pro/admin.php?page=serveri&akcija=dodaj&korak=2&klijent={$id}');" />
        </div> </td>
	      </tr>
            </tbody>
        </table>

    </div>
</div>            


<div class="cb"></div>

</div>
        
        
