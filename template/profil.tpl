{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}

<div id="content">
<center>
<img src="template/images/profil_title.png" border="0" /><br />

Ovde mozete izmeniti vase informacije.<br /><br />


<div id="settingsbox2">
<form action="" method="post"><div class="space222"> </div>
Ime<br /><input type="text"  class="input" name="fname" value="{$profil_fname}" /> <div class="space222"> </div>
Prezime<br /><input type="text"  class="input" name="lname" value="{$profil_lname}" /><div class="space222"> </div>
E-Mail<br /><input type="text" " class="input" name="email" readonly value="{$profil_email}" /> <div class="space222"> </div>
Password<br /><input type="password" class="input" name="password" autocomplete="off" /> <div class="space222"> </div><div class="space222"> </div>
</div> <div id="settingsbox2dole"></div> 
<input type="image" id="loginbtni" src="template/img/settingspage_sacuvajbtn.jpg" name="submit" /></div>
</form>

</center>