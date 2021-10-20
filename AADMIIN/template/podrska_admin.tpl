<div id="content">
        
        
        
<h1>Podrška Klijentima</h1>
                
{if $message}
{$message}
{/if}
<div class="bloc">

    <div class="title">
        Lista Tiketa
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>

                    <th>Naslov</th>
                    <th>Datum</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$tiketi item=tiket}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><a href="admin.php?page=tiket&akcija=pregled&id={$tiket.id}">{$tiket.id}</a></td>
                    <td>{$tiket.naslov}</td>
                    <td>{$tiket.datum}</td>
                    <td>{$tiket.status}</td>
                    <td class="actions"><a href="admin.php?page=podrska&status={$status}&brisi={$tiket.id}" title="Brisi ovaj tiket"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="6">Nema ni jednog tiketa</td>
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
        
        
