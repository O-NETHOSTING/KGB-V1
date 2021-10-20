<div id="content">
<br />
<div id="boxp3">
{if $error}

<div id="error" style="display:none;">{$error}</div>

{else}

{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}

<div class="morph_fdl">
<h3>{$tiket_naslov}</h3>

<div id="ticket">
<a href="./main.php?page=podrska"><img src="template/images/vrati_se_na_tikete.png" border="0" /></a> <br /><br />
<a href="./main.php?page=tiket&id={$tiket_id}&zatvori=yes"><img src="template/images/zatvori.png" border="0" /></a>
</div>
</div>

<div id="lista_odgovora">

{foreach from=$odgovori item=odgovor}
<div class="obavjest">
<div class="obavjest_top tiket_odgovor_top">
<div class="obavjest_title">{$odgovor.user} {$odgovor.user1}</div> <div class="obavjest_datum">{$odgovor.vrijeme_odgovora|date_format:"%d.%m.%Y   %H:%M:%S"}</div>
<div class="clear"></div>
</div>
<div class="obavjest_text">
<div class="obavjest_top_text"></div>
<div class="obavjest_normal_text tiket_text">
{$odgovor.odgovor}

<div class="space123"></div>

{if $odgovor.napomena eq ''}{else}<div class="line_morph"></div> <div class="space123"></div>{/if}
{$odgovor.napomena}
</div>
</div>
</div>

<br />
{/foreach}

{if $tiket_zatvoren eq 1}

{else}
<form action="" method="post">
<textarea placeholder="Odgovori" class="input" style="width:660px;height:100px;max-width:660px;max-height:100px;" name="odgovor">
</textarea>
<input type="image" src="template/images/odgovori.png" border="0" class="odgovori_dugme" />
</form>
{/if}

</div>


<div class="clear"></div>
</div>
<br />



{/if}
</div>
