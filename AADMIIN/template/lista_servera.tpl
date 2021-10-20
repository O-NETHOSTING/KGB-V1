<div id="content">
        
        
        
<h1>Serveri</h1>
                
{if $message}
{$message}
{/if}
<div class="bloc">

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
                    <th>Klijent</th>
                    <th>Broj Slotova</th>
                    <th>Ističe</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$serveri item=server}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><a href="admin.php?page=serveri&akcija=uredi&id={$server.id}">{$server.id}</a></td>
                    <td>{$server.name}</td>
                    <td>{$server.klijent}</td>
                    <td>{$server.slotovi}</td>
                    <td>{$server.istice}</td>
                    <td>{$server.status}</td>
                    <td class="actions"><a href="admin.php?page=serveri&akcija=uredi&id={$server.id}" title="Uredi ovaj server"><img src="template/img/icons/edit.png" alt="" /></a><a href="admin.php?page=serveri&akcija=lista{$isticemi}&brisi={$server.id}" onclick="return confirm('Dali ste sigurni da želite izbrisati server?')" title="Izbriši ovaj server"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="8">Nema ni jednog servera</td>
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
        
        
