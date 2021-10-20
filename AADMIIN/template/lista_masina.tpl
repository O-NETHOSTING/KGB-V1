<div id="content">
        
        
        
<h1>Mašine</h1>
                
{if $message}
{$message}
{/if}
<div class="bloc">

    <div class="title">
        Lista Mašina
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>

                    <th>Ime</th>
                    <th>IP</th>
                    <th>Location</th>
                    <th>Slobodna</th>
					<th>Serveri</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$masine item=masina}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><a href="admin.php?page=box&akcija=uredi&id={$masina.id}">{$masina.id}</a></td>
                    <td>{$masina.name}</td>
                    <td>{$masina.ip}</td>
                    <td>{$masina.location}</td>
                    <td>{$masina.slobodan}</td>
					<td><a href="admin.php?page=serveri&akcija=lista&boxid={$masina.id}">{$masina.serverii} servera</a></td>
                    <td class="actions"><a href="admin.php?page=box&akcija=uredi&id={$masina.id}" title="Uredi ovu mašinu"><img src="template/img/icons/edit.png" alt="" /></a><a href="admin.php?page=box&akcija=lista&brisi={$masina.id}" title="Briši ovu mašinu i servere na mašini"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="7">Nema ni jedne mašine.</td>
             </tr>
             {/foreach}

            </tbody>

        </table>
    </div>
</div>
                

       


</div>
        
        
