<br />
<div id="content">
<div id="boxp3">
<div id="infoo"><br>
	<div id="infoi"><img src="template/images/novosti.png"/></div>
	<p><pl></pl><br /><br /><br />Obavjesti u vezi hostinga i servera.</p>
</div>
<div id="boxp">
	
	{foreach from=$news item=nws}
	<div id="naslov">
		<p>{$nws.title}</p>
	</div>
	<div id="datum">
		<p>{$nws.date|date_format:"%d.%m.%Y"}</p>
	</div><br /><br />
	<div id="textobavestenje">
		{$nws.text}
	</div>
	{foreachelse}
	
	{/foreach}

</div>
<div id="boxp2">
	
	<div id="naslovst">
		<p>{$profil_fname} {$profil_lname}</p>
	</div>
	<div id="textobavestenje"><br /><br /><br />
		 Dobrodosao  {$profil_fname} {$profil_lname} !!<br />
		 Vasi Trenutni Email: {$profil_email} <br />
		 <br /><br />
		 
		
	</div>	
</div>

</div>