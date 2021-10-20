<div id="content">
        
        
        
<h1>Akcija</h1>
                
{if $message}
{$message}
{/if}
<div class="bloc">

    <div class="title">
        Akcija
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>

                    <th>Naslov</th>
                    <th>Datum</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$vijesti item=vijest}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>{$vijest.id}</td>
                    <td>{$vijest.title}</td>
                    <td>{$vijest.date}</td>
                    <td class="actions"><a href="admin.php?page=akcija&akcija=uredi&id={$vijest.id}" title="Uredi ovu vijest"><img src="template/img/icons/edit.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="6">Nema nijedne akcije.</td>
             </tr>
             {/foreach}

            </tbody>

        </table>
    </div>
</div>
                

       


</div>
        
        
