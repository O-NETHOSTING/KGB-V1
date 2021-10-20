<div id="content">
        
        

    
<h1><img src="template/img/icons/dashboard.png" alt="" />Početna</h1>
                
{if $message}
{$message}
{/if}

<div class="bloc left">
    <div class="title">
        Napomena
    </div>
    <div class="content">
    {if $napomena}
    {$napomena}
    {/if}
    <form action="" method="post">
        <div class="input textarea">
             <textarea name="napomena" id="textarea1" rows="7" cols="4">{$admin.napomena}</textarea>
        </div>
        <div class="submit">
            <input type="submit" value="Spremi" />
        </div>
    </form>    
    </div>    
</div>

<div class="bloc right">
    <div class="title">
        Statistika
    </div>
    <div class="content">
        <div class="left">
            <table class="noalt">
                <thead>
                    <tr>
                        <th colspan="2"><em>Serveri</em></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h4>{$aktivni_serveri}</h4></td>
                        <td>Aktivni</td>
                    </tr>
                    <tr>

                        <td><h4>{$neaktivni_serveri}</h4></td>
                        <td>Neaktivni</td>
                    </tr>
                    <tr>
                        <td><h4>{$istekli_serveri}</h4></td>
                        <td>Istekli</td>
                    </tr>
					<!--
                     <tr>
                        <td><h4>{$broj_slotova}</h4></td>
                        <td>Ukupan Broj Slotova</td>
                    </tr> 
					-->
                     <tr>
                        <td><h4>{$broj_besplatnih_servera}</h4></td>
                        <td>Broj Besplatnih Servera</td>
                    </tr> 
					<tr>
						<td><h4>{$broj_odgovora_admin}</h4></td>
						<td>Broj vasih odgovora u tiketima</td>
					</tr>
                </tbody>
            </table>
        </div>
        <div class="right">

            <table class="noalt">
                <thead>
                    <tr>
                        <th colspan="2"><em>Tiketi</em></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><h4>{$neodgovoreni_tiketi}</h4></td>
                        <td class="bad">Neodgovoreni</td>
                    </tr>
                    <tr>
                        <td><h4>{$odgovoreni_tiketi}</h4></td>
                        <td class="neutral">Otvoreni</td>
                    </tr>

                    <tr>
                        <td><h4>{$zatvoreni_tiketi}</h4></td>
                        <td class="good">Zatvoreni</td>
                    </tr>
                     <tr>
                        <td><h4>{$zarada}</h4></td>
                        <td>dinara ( Zarada )</td>
                    </tr> 
                     <tr>
                        <td><h4>{$broj_klijenta}</h4></td>
                        <td>Ukupan Broj Klijenata</td>
                    </tr> 					
                </tbody>
            </table>
        </div>
        <div class="cb"></div>

    </div>
</div>

<div class="bloc" style="float: left; width:100%;">
                 <div class="title">
                    Chat <input type="text" placeholder="Zabranjen spam i vredjanje..." style="margin-left: 20px; margin-top: 3px;" id="chat_text" /> <div class="submit" style="margin-top: -40px; margin-left: 4px; margin-right: -4px;"><input class="btn btn-primary" type="button" value="Posalji" style="margin-top: 3px; float: right; margin-right: 40%;" onclick="Chat_Send()" /></div>
                </div> 
                <div id="chat_main" class="content" style="float: left; padding: 0; margin: 0; width: 100%;">
                    <div id="chat_messages">
						<div id="atest">Brisanje u toku...</div>
						<div id="rtest">Refresh u toku...</div>
                        <ul></ul>
                    </div>
                    {if $admin.status eq "admin"}
					<div class="submit" style="float: left;">
                        <input class="btn btn-primary" type="button" value="Izbriši sve poruke" style="margin: 5px 10px 5px 10px;" onclick="Chat_IzbrisiSve()" />
                    </div>
					{/if}
					<div class="submit" style="float: left;">
                        <input class="btn btn-primary" type="button" value="Refresh" style="margin: 5px 10px 5px 10px;" onclick="Refresh()" />
                    </div>
				
<div class="bloc right" style="margin-left: 5px; margin-top: -205px; margin-bottom: 10px; margin-right: 5px; width:20%;">
                 <div class="title">
				Aktivni klijenti
				</div> 
                <div id="chat_main" class="content" style="float: left; padding: 0; margin: 0; width: 100%;">
					<div id="clanovi">
						<div id="vtest">Refresh u toku...</div>
                        <ul></ul>
					</div>
					<div class="submit" id="klijenti">
                        <input class="btn btn-primary" type="button" value="Online: {$klijention}" style="margin: 5px 10px 5px 10px;" />
                    </div>
				</div>
</div>
<div class="bloc right" style="margin-top: -205px; width:20%;">
                 <div class="title">
				Aktivni radnici
				</div> 
                <div id="chat_main" class="content" style="float: left; padding: 0; margin: 0; width: 100%;">
					<div id="onlinea">
						<div id="btest">Refresh u toku...</div>
                        <ul></ul>
					</div>
					<div class="submit" id="admini">
						<input class="btn btn-primary" type="button" value="Online: {$adminion}" style="margin: 5px 10px 5px 10px;" />
                    </div>
				</div>
</div>	</div>			
</div>
<div class="bloc" style="float: left; width: 100%;">
    <div class="title">
        Lista logova
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" class="checkall"/></th>
                    <th>Id</th>
                    <th>Poruka</th>
                    <th>Ime</th>
                    <th>Ip</th>
                    <th style="width: 110px;">Vreme</th>
                </tr>
            </thead>

            <tbody>
            {foreach from=$logovi item=log}
                <tr>
                    <td><input type="checkbox" /></td>
                    <td>{$log.id}</td>
                    <td>{$log.message}</td>
                    <td><a href="admin.php?page=klijenti&akcija=pregled&id={$log.clientid}">{$log.name}</a></td>
                    <td>{$log.ip}</td>
                    <td class="actions">{$log.vreme}</td>
                </tr>
             {foreachelse}
             <tr>
             <td colspan="6">Nema ni jednog klijenta</td>
             </tr>
             {/foreach}

            </tbody>

        </table>

    </div>
</div> 


<div class="cb"></div>

                    


</div>
        
        
