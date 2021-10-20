{if $message}
<div id="message" style="display:none;">{$message}</div>
{/if}
<div id="headerlogin"><a href="index.php"></a></div>
<center> Dobrodosli u KGB GPanel <br /> Kliknite <a href="#demo"><font color="red">ovdje</font> </a> da biste se ulogovali na Demo korisnika i isprobali panel!
<div id="login">
<form onsubmit="skloni();return false;">
<div id="email"><img src="template/images/email.png" border="0" /></div>
<div id="email_input"><input type="text" placeholder="demo" name="email" id="emaili" class="input" /></div>
<div id="password"><img src="template/images/pass.png" border="0" /></div>
<div id="password_input"><input type="password" placeholder="demo" name="password" id="passwordi" class="input" /></div>
<div id="remember_me"><input type="checkbox" name="remember_me" id="remember" value="1" checked="1" /> Zapamti me</div>
<div id="lost_pw"><a href="#" onClick="alert('Javite se podrsci na email your@email.com za novu lozinku..');">Zaboravili ste lozinku?</a></div>
</div>


<div id="main">
<div id="l">
<div id="login_btn"><input type="image" id="loginbtni" src="template/img/loginpage_loginbtn.jpg" name="submit" /></div>
</form>
</div>



</div>
