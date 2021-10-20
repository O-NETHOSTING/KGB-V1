<div id="content">
        
        
        
<h1>Obavijesti</h1>
                
{if $message}
{$message}
{/if}
<div class="bloc">

    <div class="title">
        Lista Obavijesti
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>

                    <th>Naslov</th>
                    <th>Datum</th>
                    <th>Skrivena</th>
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
                    <td>{$vijest.skrivena}</td>
                    <td class="actions"><a href="admin.php?page=news&akcija=uredi&id={$vijest.id}" title="Uredi ovu vijest"><img src="template/img/icons/edit.png" alt="" /></a><a href="admin.php?page=news&akcija=lista&brisi={$vijest.id}" title="Izbriši ovu vijest"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="6">Nema ni jedne obavijesti.</td>
             </tr>
             {/foreach}

            </tbody>

        </table>
    </div>
</div>
                

       


</div>
        
        
