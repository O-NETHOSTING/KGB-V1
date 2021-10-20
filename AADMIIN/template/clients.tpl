<div id="content">
        
        
        
<h1>Klijenti</h1>
                
{if $message}
{$message}
{/if}
<div class="bloc">

    <div class="title">
        Lista Klijenata
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>

                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Broj Servera</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$klijenti item=klijent}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><a href="admin.php?page=klijenti&akcija=pregled&id={$klijent.id}">{$klijent.id}</a></td>
                    <td><a href="admin.php?page=klijenti&akcija=pregled&id={$klijent.id}">{$klijent.fname}</a></td>
                    <td><a href="admin.php?page=klijenti&akcija=pregled&id={$klijent.id}">{$klijent.lname}</a></td>
                    <td>{$klijent.serveri}</td>
                    <td class="actions"><a href="admin.php?page=klijenti&akcija=uredi&id={$klijent.id}" title="Uredi profil ovog klijenta"><img src="template/img/icons/edit.png" alt="" /></a><a href="admin.php?page=klijenti&akcija=lista&brisi={$klijent.id}" title="Izbriši ovog klijenta"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="6">Nema ni jednog klijenta</td>
             </tr>
             {/foreach}

            </tbody>

        </table>
        <div class="pagination">

            {$stranice}
           

        </div>
    </div>
</div>
                

       


</div>
        
        
