function ajaxzahtjev() { 
	var xmlHttp; 
		if(window.XMLHttpRequest){ 
		xmlHttp = new XMLHttpRequest(); 
		} else if(window.ActiveXObject) { 
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); 
		} else { 
		alert('Problem creating the XMLHttpRequest object'); 
		} 
	return xmlHttp; 
} 

var xmlHttp = ajaxzahtjev(); 

function skloni() {

ajaxLogin();
	
}

function ajaxLogin() {

	xmlHttp.onreadystatechange=function() {
		if(xmlHttp.readyState==4) {
			globalReturn = xmlHttp.responseText;
			if (globalReturn==""){
			$.alerts.dialogClass = 'style_1';	
			jAlert('Podatci za prijavu su netačni.', 'Bad Login');
			} else {
			loadiraj(); 
			}
		} 
	}
	var email= (document.getElementById("emaili").value);
	var password =(document.getElementById("passwordi").value);
	var checked;
	if (document.getElementById("remember").checked) checked=1;
	else checked=0;
	
	var url="ajax_login.php?email="+email+"&password="+password+"&remember="+checked;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}


function loadiraj() {

  $('#loginbtni').fadeOut('slow', function() {
  	$('#login').html('<div id="loginloader"><img src="template/images/loading.gif" border="0" /></div>'); 		  
  });

	
	 setTimeout(function() {

			window.location.href=globalReturn;
	}, 3000);

}





$(document).ready( function() {
				
				
if($('#message').length != 0){
  $.alerts.dialogClass = 'style_1'; // set custom style class
      jAlert($('#message').html(), 'Poruka', function() {
	$.alerts.dialogClass = null; // reset to default
  });
}

if($('#error').length != 0){
  $.alerts.dialogClass = 'style_1'; // set custom style class
      jAlert($('#error').html(), 'Poruka', function(r) {
if(r==true){
window.location = 'main.php'
}		      
	$.alerts.dialogClass = null; // reset to default
  });
}
	

$('.delete_folder').click(function() {
var r2 = $(this).attr("informacije").split(",");			
$.alerts.dialogClass = 'style_1'; // set custom style class
jConfirm('Da li želite izbrisati folder "' + r2[2] + '"', 'Potvrda brisanja', function(r) {
if(r==true){
window.location = 'main.php?page=ftp&id=' + r2[0] + '&path=' + r2[1] + '&folder=' + r2[2] + '&delete=folder'
}
});
});  





$('.delete_file').click(function() {
var ftp_id = $(this).attr("ftp_id");
var ftp_path = $(this).attr("ftp_path");
var ftp_fname = $(this).attr("ftp_fname");

$.alerts.dialogClass = 'style_1';
jConfirm('Da li želite izbrisati fajl "' + ftp_fname + '"', 'Potvrda brisanja', function(r) {
if(r==true){
window.location = 'main.php?page=ftp&id=' + ftp_id + '&path=' + ftp_path + '&file=' + ftp_fname + '&delete=file'
}
});

});   


$('#default_mapa').click(function(ev) {
var srv_id = $(this).attr("srv_id");
var srv_map = $(this).attr("srv_map");

$.alerts.dialogClass = 'style_1';
jConfirm('<input type="text" id="srv_map" name="srv_map" value="'+ srv_map +'" />  <div id="popup_panel"><input type="button" id="popup_ok" value="&nbsp;OK&nbsp;"> <input type="button" id="popup_cancel" value="&nbsp;Cancel&nbsp;"></div> <br /> <p>Posle restartovanja uvek ce vam biti navedena mapa prva. <br /> Ukoliko stavite ime nepostojece mape server nece raditi.</p>', 'Izmeni mapu', function(r) {

		

});


$("#popup_panel").remove();

$('#popup_cancel').click(function(ev) {
$("#popup_container").remove();
$("#popup_overlay").remove();
});


$('#popup_ok').click(function(ev) {
		  var srv_map = $('#srv_map').val();
                  $('#popup_panel').html('<img src="template/images/loading2.gif" border="0" />');

			$.ajax({
			   type: "POST",
			   url: "map.php",
			   data: "srv_id_p=" + srv_id + "&srv_map=" + srv_map,
			   dataType: "html",
			   success: function(responseText){
        			addmin_added(responseText);
			   }
			});
});


});		



$('#promeni_ime').click(function(ev) {
var srv_id = $(this).attr("srv_id");
var srv_name = $(this).attr("srv_name");

$.alerts.dialogClass = 'style_1';
jConfirm('<input type="text" id="srv_name" name="srv_name" value="'+ srv_name +'" />  <div id="popup_panel"><input type="button" id="popup_ok" value="&nbsp;OK&nbsp;"> <input type="button" id="popup_cancel" value="&nbsp;Cancel&nbsp;"></div> <br /> <p>Ovo ce promeniti ime samo u panelu! <br /> Promena nece biti aktivna na serveru!</p>', 'Izmeni ime', function(r) {

		

});


$("#popup_panel").remove();

$('#popup_cancel').click(function(ev) {
$("#popup_container").remove();
$("#popup_overlay").remove();
});


$('#popup_ok').click(function(ev) {
		  var srv_name = $('#srv_name').val();
                  $('#popup_panel').html('<img src="template/images/loading2.gif" border="0" />');

			$.ajax({
			   type: "POST",
			   url: "izmeni_ime.php",
			   data: "srv_id_p=" + srv_id + "&srv_name=" + srv_name,
			   dataType: "html",
			   success: function(responseText){
        			addmin_added(responseText);
			   }
			});
});


});		





$('.promeni_ftp_sifru').click(function() {
var srv_id = $(this).attr("srv_id");


$.alerts.dialogClass = 'style_1';
jConfirm('Da li želite promjeniti ftp lozinku?', 'Promjena FTP Lozinke', function(r) {

if(r==true){
window.location = 'main.php?page=server&id=' + srv_id + '&change_ftp_pw=yes'
}

});		
		
		
});






$('#dodaj_admina_dugme').click(function(ev) {
var srv_id = $(this).attr("srv_id");

$.alerts.dialogClass = 'style_1';
jConfirm('Vrsta: <br /> <select name="vrsta" id="vrsta_admina" onchange="vrsta_admina();"><option value="1">Nick + Password</option><option value="2">SteamID</option><option value="3">IP</option></select> <br /> <span id="vrsta_label">Nick admina:</span> <br /> <input type="text" id="anick" name="nick" /> <br /> Sifra: <br /> <input type="password" id="asifra" name="sifra" /> <br /> Privilegije: <br /> <select name="privilegije" id="privilegije" onchange="privilegija();"><option value="abcdefghijklmnopqrstu">Head Admin</option><option value="abcdefghijkmnopqrstu">Obican Admin</option><option value="ab">Slot + Imunitet</option><option value="b">Slot</option><option value="5">Custom</option></select> <div id="mjesto_za_flagove"></div> <br /> Komentar <br /> <input type="text" id="akomentar" name="komentar" /> <div id="popup_panel"><input type="button" id="popup_ok" value="&nbsp;OK&nbsp;"> <input type="button" id="popup_cancel" value="&nbsp;Cancel&nbsp;"></div>', 'Dodavanje Admina', function(r) {

		

});


$("#popup_panel").remove();

$('#popup_cancel').click(function(ev) {
$("#popup_container").remove();
$("#popup_overlay").remove();
});


$('#popup_ok').click(function(ev) {
		  var vrsta_admina = $('#vrsta_admina').val();
		  var nick = $('#anick').val();
		  var sifra = $('#asifra').val();
		  var privilegije = $('#privilegije').val();
		  var custom_flags = $('#flaged').val();
		  var komentar = $('#akomentar').val();
                  $('#popup_panel').html('<img src="template/images/loading2.gif" border="0" />');

			$.ajax({
			   type: "POST",
			   url: "dodaj_admina.php",
			   data: "srv_id_p=" + srv_id + "&vrsta_admina=" + vrsta_admina + "&nick=" + nick + "&sifra=" + sifra + "&privilegije=" + privilegije + "&custom_flags=" + custom_flags + "&komentar=" + komentar,
			   dataType: "html",
			   success: function(responseText){
        			addmin_added(responseText);
			   }
			});
});


});

		
		
		
$('#promeni_mod_dugme').click(function(ev) {
var srv_id = $(this).attr("srv_id");
$.alerts.dialogClass = 'style_1';

			$.ajax({
			   type: "POST",
			   url: "promeni_mod.php",
			   data: "srv_id=" + srv_id + "&akcija=gethtml",
			   dataType: "html",
			   success: function(responseText){
			   	   jConfirm(responseText + '<div id="popup_panel"><input type="button" id="popup_ok" value="&nbsp;OK&nbsp;"> <input type="button" id="popup_cancel" value="&nbsp;Cancel&nbsp;"></div>', 'Promena Moda', function(r) { 

			   	   });
			   	   
$("#popup_panel").remove();

$('#popup_cancel').click(function(ev) {
$("#popup_container").remove();
$("#popup_overlay").remove();
});


$('#popup_ok').click(function(ev) {
		        $('#popup_panel').html('<img src="template/images/loading2.gif" border="0" />');
		        var mod_id = $('#modovi').val();
			$.ajax({
			   type: "POST",
			   url: "promeni_mod.php",
			   data: "srv_id=" + srv_id + "&mod_id=" + mod_id,
			   dataType: "html",
			   success: function(responseText){
        			mod_added(responseText);
			   }
			});
		 
});			   	   
			   	   
			   	   
			   	   
			   }
			});


});




$('#lost_pw a').click(function(){
   $('#login_btn').remove();
   $('#login').html('<form onsubmit="skloni();return false;"><div id="email"><img border="0" src="template/images/email.png" /></div> <div id="email_input"><input type="text" class="input" id="emaili" name="email_pw" /></div> <div id="login_btn"><input type="image" name="submit" src="template/images/posalji_pw.png" id="loginbtni" /></div> </form>');
   
});






});	



function addmin_added(responseText){
jAlert(responseText, 'Dodavanje Admina');
}

function mod_added(responseText){
jAlert(responseText, 'Promena Moda');
}


function vrsta_admina(){
var vrsta = $('#vrsta_admina').val();	
if(vrsta=="1"){
$('#vrsta_label').html("Nick admina:");
}else if(vrsta=="2"){
$('#vrsta_label').html("SteamID admina:");	
}else if(vrsta=="3"){
$('#vrsta_label').html("IP adresa:");		
}else {
$('#vrsta_label').html("Nick admina:");	
}

}

function privilegija(){
var privilegija_tip = $('#privilegije').val();	

if(privilegija_tip=="5"){
	$('#mjesto_za_flagove').html('Custom flegovi: <br /> <input type="checkbox" id="a_custom_admin" onchange="dodajSlovo(this.value,this.checked);" value="a"> "a" Imunitet <br /><input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="b_custom_admin" value="b"> "b" Slot <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="c_custom_admin" value="c"> "c" amx_kick <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="d_custom_admin" value="d"> "d" amx_ban i amx_unban <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="e_custom_admin" value="e"> "e" amx_slay i amx_slap <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="f_custom_admin" value="f"> "f" amx_map <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="g_custom_admin" value="g"> "g" amx_cvar <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="h_custom_admin" value="h"> "h" amx_cfg <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="i_custom_admin" value="i"> "i" amx_chat i bela slova <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="j_custom_admin" value="j"> "j" amx_vote i amx_votemap <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="k_custom_admin" value="k"> "k" amx_cvar sv_password <br /> <input type="checkbox" onchange="dodajSlovo(this.value,this.checked);" id="l_custom_admin" value="l"> "l" head admin <br /> Trenutni Flagovi: <br /><input type="text" name="flaged" readonly="1" style="width:149px; height:15px;" id="flaged" value="">');
} else {
$('#mjesto_za_flagove').html('');	
}

}


function dodajSlovo(flag,bul) {
	//var 
	if (bul) {
		document.getElementById("flaged").value+=flag;
		
	} else {
		temp=document.getElementById("flaged").value.split(flag);
		document.getElementById("flaged").value=(temp[0]+temp[1]);
		
		
	}
	
}
	

