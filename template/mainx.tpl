<div class="obv1">Dobrodosao u GamePanel
<br /><br />

<img src='template/images/logoonet.png'>

</div>



<div class="novosti_morph">

{foreach from=$news item=nws}
<div class="obavjest">
<div class="obavjest_top">
<div class="obavjest_title">{$nws.title}</div> <div class="obavjest_datum">{$nws.date|date_format:"%d.%m.%Y"}  {if $nws.date|date_format:"%d.%m.%Y" eq $smarty.now|date_format:"%d.%m.%Y"}<span class='blink_me' style='color:green;font-size:12px;font-weight:bold;margin-left:20px;'>NOVA PORUKA!</span>{else}{/if}</div>
<div class="clear"></div>
</div>
<div class="obavjest_text">
<div class="obavjest_top_text"></div>
<div class="obavjest_normal_text">
{$nws.text}
</div>
<div class="obavjest_bottom_text"></div>
</div>
</div>
<br />
{foreachelse}
<div class="obavjest">
<div class="obavjest_top">
<div class="obavjest_title">Nema Obavijestenja</div> <div class="obavjest_datum">{$smarty.now|date_format:"%d.%m.%Y"}</div>
<div class="clear"></div>
</div>
<div class="obavjest_text">
<div class="obavjest_top_text"></div>
<div class="obavjest_normal_text">
Trenutno nema vijesti ni obavijestenja.
</div>
<div class="obavjest_bottom_text"></div>
</div>
</div>
{/foreach}

</div>

</div>

</div>
