<div id="content">
        
        
        
<h1>Modovi</h1>
                
{if $message}
{$message}
{/if}
<div class="bloc">

    <div class="title">
        Lista Modova
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>

                    <th>Ime</th>
                    <th>Putanja</th>
					<th>Default mapa</th>
                    <th>Skriven</th>
                    <th>Akcija</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$modovi item=mod}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>{$mod.id}</td>
                    <td>{$mod.ime}</td>
                    <td>{$mod.putanja}</td>
					<td>{$mod.mapa}</td>
                    <td>{$mod.skriven}</td>
                    <td class="actions"><a href="admin.php?page=mod&akcija=uredi&id={$mod.id}" title="Uredi profil ovaj mod"><img src="template/img/icons/edit.png" alt="" /></a><a href="admin.php?page=mod&akcija=lista&brisi={$mod.id}" title="Sakrij ovaj mod"><img src="template/img/icons/delete.png" alt="" /></a></td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="6">Nema ni jednog mod-a.</td>
             </tr>
             {/foreach}

            </tbody>

        </table>
    </div>
</div>
                

       


</div>
        
        
