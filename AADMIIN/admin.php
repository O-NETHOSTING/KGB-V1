<?php
session_start();

error_reporting(0);

if(!$_SESSION["admin"]){
	header('location: index.php');	
} else {

	
ini_set('display_errors', 1);
	
// put full path to Smarty.class.php

define("GPANEL", "YES");
include "../config.php";
require('../includes/libs/Smarty.class.php');
include_once "../includes/function.php";
$smarty = new Smarty();

$smarty->setTemplateDir('template');
$smarty->setCompileDir('../cache/template_c');
$smarty->setCacheDir('../cache/other_c');
$smarty->setConfigDir('../includes/configs');

date_default_timezone_set("Europe/Belgrade");



$admin_id = $_SESSION["admin_id"];

$susp = mysql_query("SELECT * FROM admin WHERE id='".$admin_id."'");
$susp = mysql_fetch_assoc($susp);

if($susp['status']=="suspendovan"){
	exit("<center><h4>SUSPENDOVANI STE</h4><br />Javite se administratoru na forumu za razlog suspendovanja</center>");
}else{

mysql_query('UPDATE admin SET lastactivity = "'.$_SERVER['REQUEST_TIME'].'" WHERE id="'.$_SESSION["admin_id"].'"');

if($_POST["napomena"]){
$napomena = $_POST["napomena"];
mysql_query('UPDATE admin SET napomena="'.$napomena.'" WHERE id='.$admin_id.'');

$message = '<div class="notif success bloc">
    Napomena je uspesno sacuvana. 
    <a href="#" class="close"></a>
</div>';
$smarty->assign('napomena', $message);

}

$admin_info = mysql_fetch_array(mysql_query('SELECT * FROM admin WHERE id='.$admin_id.''));

$smarty->assign('admin', $admin_info);

$script = '<script type="text/javascript">
        var _0x2dc0=["\x7A\x6F\x6F\x6D\x62\x6F\x78","\x61\x2E\x7A\x6F\x6F\x6D\x62\x6F\x78","\x3C\x61\x20\x68\x72\x65\x66\x3D\x22\x23\x22\x20\x63\x6C\x61\x73\x73\x3D\x22\x74\x6F\x67\x67\x6C\x65\x22\x3E\x3C\x2F\x61\x3E","\x61\x70\x70\x65\x6E\x64","\x2E\x62\x6C\x6F\x63\x20\x2E\x74\x69\x74\x6C\x65","\x72\x65\x6D\x6F\x76\x65","\x2E\x74\x6F\x67\x67\x6C\x65","\x66\x69\x6E\x64","\x70\x61\x72\x65\x6E\x74","\x2E\x62\x6C\x6F\x63\x20\x2E\x74\x69\x74\x6C\x65\x20\x2E\x74\x61\x62\x73","\x73\x6C\x69\x64\x65\x54\x6F\x67\x67\x6C\x65","\x2E\x63\x6F\x6E\x74\x65\x6E\x74","\x68\x69\x64\x65","\x74\x6F\x67\x67\x6C\x65\x43\x6C\x61\x73\x73","\x63\x6C\x69\x63\x6B","\x2E\x62\x6C\x6F\x63\x20\x2E\x74\x69\x74\x6C\x65\x20\x2E\x74\x6F\x67\x67\x6C\x65","\x77\x79\x73\x69\x77\x79\x67","\x2E\x77\x79\x73\x69\x77\x79\x67","\x74\x6F\x6F\x6C\x74\x69\x70\x73\x79","\x61\x5B\x74\x69\x74\x6C\x65\x21\x3D\x22\x22\x5D","\x73\x70\x6C\x69\x74","\x63\x6C\x61\x73\x73","\x61\x74\x74\x72","\x33\x30\x30\x70\x78","\x77\x69\x64\x74\x68","\x23\x63\x32\x31\x63\x31\x63","\x23\x66\x31\x64\x63\x32\x62","\x23\x39\x63\x63\x63\x30\x61","\x23\x30\x61\x63\x63\x61\x61","\x23\x30\x61\x39\x33\x63\x63","\x23\x38\x37\x33\x34\x63\x38","\x23\x32\x36\x61\x34\x65\x64","\x23\x66\x34\x35\x61\x39\x30","\x23\x65\x39\x65\x37\x34\x34","\x74\x79\x70\x65","\x76\x69\x73\x75\x61\x6C\x69\x7A\x65","\x65\x61\x63\x68","\x74\x61\x62\x6C\x65\x2E\x67\x72\x61\x70\x68","\x68\x72\x65\x66","\x23","\x61\x5B\x68\x72\x65\x66\x5E\x3D\x22\x23\x22\x5D\x5B\x68\x72\x65\x66\x21\x3D\x22\x23\x22\x5D","\x6D\x73\x69\x65","\x62\x72\x6F\x77\x73\x65\x72","\x59\x45\x53","\x4E\x4F","\x69\x70\x68\x6F\x6E\x65\x53\x74\x79\x6C\x65","\x2E\x69\x70\x68\x6F\x6E\x65","\x75\x6E\x69\x66\x6F\x72\x6D","\x73\x65\x6C\x65\x63\x74\x2C\x2E\x69\x6E\x70\x75\x74\x20\x69\x6E\x70\x75\x74\x3A\x63\x68\x65\x63\x6B\x62\x6F\x78\x2C\x20\x69\x6E\x70\x75\x74\x3A\x72\x61\x64\x69\x6F\x2C\x20\x69\x6E\x70\x75\x74\x3A\x66\x69\x6C\x65","\x64\x61\x74\x65\x70\x69\x63\x6B\x65\x72","\x2E\x64\x61\x74\x65\x70\x69\x63\x6B\x65\x72","\x3C\x64\x69\x76\x20\x63\x6C\x61\x73\x73\x3D\x22\x75\x69\x72\x61\x6E\x67\x65\x22\x3E\x3C\x2F\x64\x69\x76\x3E","\x6D\x61\x78","\x6D\x69\x6E","\x73\x6C\x69\x64\x65","\x76\x61\x6C\x75\x65","\x65\x6D\x70\x74\x79","\x73\x70\x61\x6E\x3A\x66\x69\x72\x73\x74","\x76\x61\x6C","\x69\x6E\x70\x75\x74\x3A\x66\x69\x72\x73\x74","\x72\x61\x6E\x67\x65","\x73\x6C\x69\x64\x65\x72","\x2E\x75\x69\x72\x61\x6E\x67\x65","\x2E\x72\x61\x6E\x67\x65","\x65\x72\x72\x6F\x72","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x73\x6C\x69\x64\x65\x55\x70","\x66\x61\x64\x65\x54\x6F","\x2E\x65\x72\x72\x6F\x72\x2D\x6D\x65\x73\x73\x61\x67\x65","\x66\x6F\x63\x75\x73","\x75\x6E\x62\x69\x6E\x64","\x2E\x69\x6E\x70\x75\x74\x2E\x65\x72\x72\x6F\x72\x20\x69\x6E\x70\x75\x74","\x2E\x6E\x6F\x74\x69\x66\x20\x2E\x63\x6C\x6F\x73\x65","\x61\x63\x74\x69\x76\x65","\x61\x64\x64\x43\x6C\x61\x73\x73","\x61\x3A\x66\x69\x72\x73\x74","\x73\x68\x6F\x77","\x61","\x2E\x74\x61\x62\x73","\x63\x68\x65\x63\x6B\x65\x64","\x3A\x63\x68\x65\x63\x6B\x65\x64","\x69\x73","\x69\x6E\x70\x75\x74","\x74\x61\x62\x6C\x65\x3A\x66\x69\x72\x73\x74","\x70\x61\x72\x65\x6E\x74\x73","\x63\x68\x61\x6E\x67\x65","\x23\x63\x6F\x6E\x74\x65\x6E\x74\x20\x2E\x63\x68\x65\x63\x6B\x61\x6C\x6C","\x63\x75\x72\x72\x65\x6E\x74","\x68\x61\x73\x43\x6C\x61\x73\x73","\x75\x6C\x3A\x66\x69\x72\x73\x74","\x23\x73\x69\x64\x65\x62\x61\x72\x3E\x75\x6C\x3E\x6C\x69\x2E\x63\x75\x72\x72\x65\x6E\x74","\x74\x65\x78\x74","\x73\x6C\x69\x64\x65\x44\x6F\x77\x6E","\x23\x73\x69\x64\x65\x62\x61\x72\x3E\x75\x6C\x3E\x6C\x69\x5B\x63\x6C\x61\x73\x73\x21\x3D\x22\x6E\x6F\x73\x75\x62\x6D\x65\x6E\x75\x22\x5D\x3E\x61","\x6C\x61\x62\x65\x6C\x3A\x66\x69\x72\x73\x74","\x69\x6E\x70\x75\x74\x3A\x66\x69\x72\x73\x74\x2C\x74\x65\x78\x74\x61\x72\x65\x61\x3A\x66\x69\x72\x73\x74","","\x73\x74\x6F\x70","\x66\x61\x64\x65\x4F\x75\x74","\x62\x6C\x75\x72","\x6B\x65\x79\x70\x72\x65\x73\x73","\x6B\x65\x79\x75\x70","\x63\x75\x74\x20\x63\x6F\x70\x79\x20\x70\x61\x73\x74\x65","\x62\x69\x6E\x64","\x2E\x70\x6C\x61\x63\x65\x68\x6F\x6C\x64\x65\x72","\x2E\x63\x6C\x6F\x73\x65","\x64\x69\x73\x70\x6C\x61\x79","\x69\x6E\x6C\x69\x6E\x65","\x63\x73\x73","\x68\x65\x69\x67\x68\x74","\x61\x75\x74\x6F","\x62\x6C\x6F\x63\x6B","\x2E\x63\x65\x6E\x74\x65\x72","\x2E\x63\x61\x6C\x65\x6E\x64\x61\x72\x20\x74\x64\x5B\x63\x6C\x61\x73\x73\x21\x3D\x22\x70\x61\x64\x64\x69\x6E\x67\x22\x5D","\x2E\x63\x61\x6C\x65\x6E\x64\x61\x72\x20\x74\x64","\x72\x65\x73\x69\x7A\x65","\x74\x72\x69\x67\x67\x65\x72","\x6C\x65\x6E\x67\x74\x68","\x74\x6F\x70","\x6F\x66\x66\x73\x65\x74","\x61\x5B\x6E\x61\x6D\x65\x3D","\x73\x75\x62\x73\x74\x72","\x5D","\x65\x61\x73\x65\x4F\x75\x74\x51\x75\x69\x6E\x74","\x61\x6E\x69\x6D\x61\x74\x65","\x68\x74\x6D\x6C\x2C\x62\x6F\x64\x79","\x69\x6E\x6E\x65\x72\x48\x65\x69\x67\x68\x74","\x6A\x73\x77\x69\x6E\x67","\x65\x61\x73\x69\x6E\x67","\x73\x77\x69\x6E\x67","\x65\x61\x73\x65\x4F\x75\x74\x51\x75\x61\x64","\x64\x65\x66","\x50\x49","\x63\x6F\x73","\x73\x69\x6E","\x70\x6F\x77","\x73\x71\x72\x74","\x61\x62\x73","\x61\x73\x69\x6E","\x65\x61\x73\x65\x4F\x75\x74\x42\x6F\x75\x6E\x63\x65","\x65\x61\x73\x65\x49\x6E\x42\x6F\x75\x6E\x63\x65","\x65\x78\x74\x65\x6E\x64"];jQuery(function (_0xbe08x1){_0xbe08x1(_0x2dc0[1])[_0x2dc0[0]]();_0xbe08x1(_0x2dc0[4])[_0x2dc0[3]](_0x2dc0[2]);_0xbe08x1(_0x2dc0[9])[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[6])[_0x2dc0[5]]();_0xbe08x1(_0x2dc0[15])[_0x2dc0[14]](function (){_0xbe08x1(this)[_0x2dc0[13]](_0x2dc0[12])[_0x2dc0[8]]()[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[11])[_0x2dc0[10]](300);return false;} );_0xbe08x1(_0x2dc0[17])[_0x2dc0[16]]({autoGrow:true,maxHeight:600});_0xbe08x1(_0x2dc0[19])[_0x2dc0[18]]();_0xbe08x1(_0x2dc0[37])[_0x2dc0[36]](function (){var _0xbe08x2=_0xbe08x1(this)[_0x2dc0[22]](_0x2dc0[21])[_0x2dc0[20]](/type\-(area|bar|pie|line)/g);options={height:_0x2dc0[23],width:parseInt(_0xbe08x1(this)[_0x2dc0[24]]())-100,colors:[_0x2dc0[25],_0x2dc0[26],_0x2dc0[27],_0x2dc0[28],_0x2dc0[29],_0x2dc0[30],_0x2dc0[31],_0x2dc0[32],_0x2dc0[33]]};if(_0xbe08x2[1]!=undefined){options[_0x2dc0[34]]=_0xbe08x2[1];} ;_0xbe08x1(this)[_0x2dc0[12]]()[_0x2dc0[35]](options);} );_0xbe08x1(_0x2dc0[40])[_0x2dc0[14]](function (){cible=_0xbe08x1(this)[_0x2dc0[22]](_0x2dc0[38]);if(cible==_0x2dc0[39]){return false;} ;_0xbe08xe(cible);return false;} );if(!_0xbe08x1[_0x2dc0[42]][_0x2dc0[41]]){_0xbe08x1(_0x2dc0[46])[_0x2dc0[45]]({checkedLabel:_0x2dc0[43],uncheckedLabel:_0x2dc0[44]});} ;_0xbe08x1(_0x2dc0[48])[_0x2dc0[47]]();_0xbe08x1(_0x2dc0[50])[_0x2dc0[49]]();_0xbe08x1(_0x2dc0[63])[_0x2dc0[36]](function (){var _0xbe08x3=_0xbe08x1(this)[_0x2dc0[22]](_0x2dc0[21]);var _0xbe08x2=_0xbe08x3[_0x2dc0[20]](/([a-zA-Z]+)\-([0-9]+)/g);var _0xbe08x4={animate:true};var _0xbe08x5=_0xbe08x1(this)[_0x2dc0[8]]();_0xbe08x5[_0x2dc0[3]](_0x2dc0[51]);for(i in _0xbe08x2){i=i*1;if(_0xbe08x2[i]==_0x2dc0[52]){_0xbe08x4[_0x2dc0[52]]=_0xbe08x2[i+1]*1;} ;if(_0xbe08x2[i]==_0x2dc0[53]){_0xbe08x4[_0x2dc0[53]]=_0xbe08x2[i+1]*1;} ;} ;_0xbe08x4[_0x2dc0[54]]=function (_0xbe08x6,_0xbe08x7){_0xbe08x5[_0x2dc0[7]](_0x2dc0[57])[_0x2dc0[56]]()[_0x2dc0[3]](_0xbe08x7[_0x2dc0[55]]);_0xbe08x5[_0x2dc0[7]](_0x2dc0[59])[_0x2dc0[58]](_0xbe08x7[_0x2dc0[55]]);} ;_0xbe08x5[_0x2dc0[7]](_0x2dc0[57])[_0x2dc0[56]]()[_0x2dc0[3]](_0xbe08x5[_0x2dc0[7]](_0x2dc0[59])[_0x2dc0[58]]());_0xbe08x4[_0x2dc0[60]]=_0x2dc0[53];_0xbe08x4[_0x2dc0[55]]=_0xbe08x5[_0x2dc0[7]](_0x2dc0[59])[_0x2dc0[58]]();_0xbe08x5[_0x2dc0[7]](_0x2dc0[62])[_0x2dc0[61]](_0xbe08x4);_0xbe08x1(this)[_0x2dc0[12]]();} );_0xbe08x1(_0x2dc0[71])[_0x2dc0[69]](function (){_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[65]](_0x2dc0[64]);_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[68])[_0x2dc0[67]](500,0)[_0x2dc0[66]]();_0xbe08x1(this)[_0x2dc0[70]](_0x2dc0[69]);} );_0xbe08x1(_0x2dc0[72])[_0x2dc0[14]](function (){_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[67]](500,0)[_0x2dc0[66]]();return false;} );_0xbe08x1(_0x2dc0[78])[_0x2dc0[36]](function (){var _0xbe08x8=_0xbe08x1(this)[_0x2dc0[7]](_0x2dc0[75])[_0x2dc0[74]](_0x2dc0[73])[_0x2dc0[22]](_0x2dc0[38]);_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[11])[_0x2dc0[12]]();_0xbe08x1(_0xbe08x8)[_0x2dc0[76]]();_0xbe08x1(this)[_0x2dc0[7]](_0x2dc0[77])[_0x2dc0[70]](_0x2dc0[14])[_0x2dc0[14]](function (){_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[77])[_0x2dc0[65]](_0x2dc0[73]);_0xbe08x1(this)[_0x2dc0[74]](_0x2dc0[73]);if(_0xbe08x1(this)[_0x2dc0[22]](_0x2dc0[38])!=_0xbe08x8){_0xbe08x1(_0xbe08x8)[_0x2dc0[12]]();_0xbe08x8=_0xbe08x1(this)[_0x2dc0[22]](_0x2dc0[38]);_0xbe08x1(_0xbe08x8)[_0x2dc0[76]]();} ;return false;} );} );_0xbe08x1(_0x2dc0[86])[_0x2dc0[85]](function (){_0xbe08x1(this)[_0x2dc0[84]](_0x2dc0[83])[_0x2dc0[7]](_0x2dc0[82])[_0x2dc0[22]](_0x2dc0[79],_0xbe08x1(this)[_0x2dc0[81]](_0x2dc0[80]));} );var _0xbe08x9=null;_0xbe08x1(_0x2dc0[93])[_0x2dc0[36]](function (){if(!_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[88]](_0x2dc0[87])){_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[89])[_0x2dc0[12]]();} else {_0xbe08x9=_0xbe08x1(this);} ;_0xbe08x1(this)[_0x2dc0[14]](function (){_0xbe08x1(_0x2dc0[90])[_0x2dc0[65]](_0x2dc0[87]);if(_0xbe08x9!=null&&_0xbe08x9[_0x2dc0[91]]()!=_0xbe08x1(this)[_0x2dc0[91]]()){_0xbe08x9[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[89])[_0x2dc0[66]]();} ;if(_0xbe08x9!=null&&_0xbe08x9[_0x2dc0[91]]()==_0xbe08x1(this)[_0x2dc0[91]]()){_0xbe08x9[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[89])[_0x2dc0[66]]();_0xbe08x9=null;} else {_0xbe08x9=_0xbe08x1(this);_0xbe08x9[_0x2dc0[8]]()[_0x2dc0[74]](_0x2dc0[87]);_0xbe08x9[_0x2dc0[8]]()[_0x2dc0[7]](_0x2dc0[89])[_0x2dc0[92]]();} ;} );} );_0xbe08x1(_0x2dc0[104])[_0x2dc0[36]](function (){var _0xbe08xa=_0xbe08x1(this)[_0x2dc0[7]](_0x2dc0[94]);var _0xbe08xb=_0xbe08x1(this)[_0x2dc0[7]](_0x2dc0[95]);if(_0xbe08xb[_0x2dc0[58]]()!=_0x2dc0[96]){_0xbe08xa[_0x2dc0[97]]()[_0x2dc0[12]]();} ;_0xbe08xb[_0x2dc0[69]](function (){if(_0xbe08x1(this)[_0x2dc0[58]]()==_0x2dc0[96]){_0xbe08xa[_0x2dc0[97]]()[_0x2dc0[67]](500,0.5);} ;_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[65]](_0x2dc0[64])[_0x2dc0[7]](_0x2dc0[68])[_0x2dc0[98]]();} );_0xbe08xb[_0x2dc0[99]](function (){if(_0xbe08x1(this)[_0x2dc0[58]]()==_0x2dc0[96]){_0xbe08xa[_0x2dc0[97]]()[_0x2dc0[67]](500,1);} ;} );_0xbe08xb[_0x2dc0[100]](function (){_0xbe08xa[_0x2dc0[97]]()[_0x2dc0[12]]();} );_0xbe08xb[_0x2dc0[101]](function (){if(_0xbe08x1(this)[_0x2dc0[58]]()==_0x2dc0[96]){_0xbe08xa[_0x2dc0[97]]()[_0x2dc0[67]](500,0.5);} ;} );_0xbe08xb[_0x2dc0[103]](_0x2dc0[102],function (_0xbe08xc){_0xbe08xa[_0x2dc0[97]]()[_0x2dc0[12]]();} );} );_0xbe08x1(_0x2dc0[105])[_0x2dc0[14]](function (){_0xbe08x1(this)[_0x2dc0[8]]()[_0x2dc0[67]](500,0)[_0x2dc0[66]]();} );_0xbe08x1(window)[_0x2dc0[115]](function (){_0xbe08x1(_0x2dc0[112])[_0x2dc0[36]](function (){_0xbe08x1(this)[_0x2dc0[108]](_0x2dc0[106],_0x2dc0[107]);var _0xbe08xd=_0xbe08x1(this)[_0x2dc0[24]]();if(parseInt(_0xbe08x1(this)[_0x2dc0[109]]())<100){_0xbe08x1(this)[_0x2dc0[108]]({width:_0x2dc0[110]});} else {_0xbe08x1(this)[_0x2dc0[108]]({width:_0xbe08xd});} ;_0xbe08x1(this)[_0x2dc0[108]](_0x2dc0[106],_0x2dc0[111]);} );_0xbe08x1(_0x2dc0[114])[_0x2dc0[109]](_0xbe08x1(_0x2dc0[113])[_0x2dc0[24]]());} );_0xbe08x1(window)[_0x2dc0[116]](_0x2dc0[115]);function _0xbe08xe(_0xbe08xf){if(_0xbe08x1(_0xbe08xf)[_0x2dc0[117]]>=1){hauteur=_0xbe08x1(_0xbe08xf)[_0x2dc0[119]]()[_0x2dc0[118]];} else {hauteur=_0xbe08x1(_0x2dc0[120]+_0xbe08xf[_0x2dc0[121]](1,_0xbe08xf[_0x2dc0[117]]-1)+_0x2dc0[122])[_0x2dc0[119]]()[_0x2dc0[118]];} ;hauteur-=(_0xbe08x10()-_0xbe08x1(_0xbe08xf)[_0x2dc0[109]]())/2;_0xbe08x1(_0x2dc0[125])[_0x2dc0[124]]({scrollTop:hauteur},1000,_0x2dc0[123]);return false;} ;function _0xbe08x10(){if(window[_0x2dc0[126]]){return window[_0x2dc0[126]];} else {return _0xbe08x1(window)[_0x2dc0[109]]();} ;} ;} );jQuery[_0x2dc0[128]][_0x2dc0[127]]=jQuery[_0x2dc0[128]][_0x2dc0[129]];jQuery[_0x2dc0[141]](jQuery[_0x2dc0[128]],{def:_0x2dc0[130],swing:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return jQuery[_0x2dc0[128]][jQuery[_0x2dc0[128]][_0x2dc0[131]]](_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15);} ,easeInQuad:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*(_0xbe08x12/=_0xbe08x15)*_0xbe08x12+_0xbe08x13;} ,easeOutQuad:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return -_0xbe08x14*(_0xbe08x12/=_0xbe08x15)*(_0xbe08x12-2)+_0xbe08x13;} ,easeInOutQuad:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if((_0xbe08x12/=_0xbe08x15/2)<1){return _0xbe08x14/2*_0xbe08x12*_0xbe08x12+_0xbe08x13;} ;return -_0xbe08x14/2*((--_0xbe08x12)*(_0xbe08x12-2)-1)+_0xbe08x13;} ,easeInCubic:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*(_0xbe08x12/=_0xbe08x15)*_0xbe08x12*_0xbe08x12+_0xbe08x13;} ,easeOutCubic:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*((_0xbe08x12=_0xbe08x12/_0xbe08x15-1)*_0xbe08x12*_0xbe08x12+1)+_0xbe08x13;} ,easeInOutCubic:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if((_0xbe08x12/=_0xbe08x15/2)<1){return _0xbe08x14/2*_0xbe08x12*_0xbe08x12*_0xbe08x12+_0xbe08x13;} ;return _0xbe08x14/2*((_0xbe08x12-=2)*_0xbe08x12*_0xbe08x12+2)+_0xbe08x13;} ,easeInQuart:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*(_0xbe08x12/=_0xbe08x15)*_0xbe08x12*_0xbe08x12*_0xbe08x12+_0xbe08x13;} ,easeOutQuart:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return -_0xbe08x14*((_0xbe08x12=_0xbe08x12/_0xbe08x15-1)*_0xbe08x12*_0xbe08x12*_0xbe08x12-1)+_0xbe08x13;} ,easeInOutQuart:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if((_0xbe08x12/=_0xbe08x15/2)<1){return _0xbe08x14/2*_0xbe08x12*_0xbe08x12*_0xbe08x12*_0xbe08x12+_0xbe08x13;} ;return -_0xbe08x14/2*((_0xbe08x12-=2)*_0xbe08x12*_0xbe08x12*_0xbe08x12-2)+_0xbe08x13;} ,easeInQuint:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*(_0xbe08x12/=_0xbe08x15)*_0xbe08x12*_0xbe08x12*_0xbe08x12*_0xbe08x12+_0xbe08x13;} ,easeOutQuint:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*((_0xbe08x12=_0xbe08x12/_0xbe08x15-1)*_0xbe08x12*_0xbe08x12*_0xbe08x12*_0xbe08x12+1)+_0xbe08x13;} ,easeInOutQuint:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if((_0xbe08x12/=_0xbe08x15/2)<1){return _0xbe08x14/2*_0xbe08x12*_0xbe08x12*_0xbe08x12*_0xbe08x12*_0xbe08x12+_0xbe08x13;} ;return _0xbe08x14/2*((_0xbe08x12-=2)*_0xbe08x12*_0xbe08x12*_0xbe08x12*_0xbe08x12+2)+_0xbe08x13;} ,easeInSine:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return -_0xbe08x14*Math[_0x2dc0[133]](_0xbe08x12/_0xbe08x15*(Math[_0x2dc0[132]]/2))+_0xbe08x14+_0xbe08x13;} ,easeOutSine:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*Math[_0x2dc0[134]](_0xbe08x12/_0xbe08x15*(Math[_0x2dc0[132]]/2))+_0xbe08x13;} ,easeInOutSine:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return -_0xbe08x14/2*(Math[_0x2dc0[133]](Math[_0x2dc0[132]]*_0xbe08x12/_0xbe08x15)-1)+_0xbe08x13;} ,easeInExpo:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return (_0xbe08x12==0)?_0xbe08x13:_0xbe08x14*Math[_0x2dc0[135]](2,10*(_0xbe08x12/_0xbe08x15-1))+_0xbe08x13;} ,easeOutExpo:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return (_0xbe08x12==_0xbe08x15)?_0xbe08x13+_0xbe08x14:_0xbe08x14*(-Math[_0x2dc0[135]](2,-10*_0xbe08x12/_0xbe08x15)+1)+_0xbe08x13;} ,easeInOutExpo:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if(_0xbe08x12==0){return _0xbe08x13;} ;if(_0xbe08x12==_0xbe08x15){return _0xbe08x13+_0xbe08x14;} ;if((_0xbe08x12/=_0xbe08x15/2)<1){return _0xbe08x14/2*Math[_0x2dc0[135]](2,10*(_0xbe08x12-1))+_0xbe08x13;} ;return _0xbe08x14/2*(-Math[_0x2dc0[135]](2,-10*--_0xbe08x12)+2)+_0xbe08x13;} ,easeInCirc:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return -_0xbe08x14*(Math[_0x2dc0[136]](1-(_0xbe08x12/=_0xbe08x15)*_0xbe08x12)-1)+_0xbe08x13;} ,easeOutCirc:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14*Math[_0x2dc0[136]](1-(_0xbe08x12=_0xbe08x12/_0xbe08x15-1)*_0xbe08x12)+_0xbe08x13;} ,easeInOutCirc:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if((_0xbe08x12/=_0xbe08x15/2)<1){return -_0xbe08x14/2*(Math[_0x2dc0[136]](1-_0xbe08x12*_0xbe08x12)-1)+_0xbe08x13;} ;return _0xbe08x14/2*(Math[_0x2dc0[136]](1-(_0xbe08x12-=2)*_0xbe08x12)+1)+_0xbe08x13;} ,easeInElastic:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){var _0xbe08x16=1.70158;var _0xbe08x17=0;var _0xbe08x18=_0xbe08x14;if(_0xbe08x12==0){return _0xbe08x13;} ;if((_0xbe08x12/=_0xbe08x15)==1){return _0xbe08x13+_0xbe08x14;} ;if(!_0xbe08x17){_0xbe08x17=_0xbe08x15*0.3;} ;if(_0xbe08x18<Math[_0x2dc0[137]](_0xbe08x14)){_0xbe08x18=_0xbe08x14;var _0xbe08x16=_0xbe08x17/4;} else {var _0xbe08x16=_0xbe08x17/(2*Math[_0x2dc0[132]])*Math[_0x2dc0[138]](_0xbe08x14/_0xbe08x18);} ;return -(_0xbe08x18*Math[_0x2dc0[135]](2,10*(_0xbe08x12-=1))*Math[_0x2dc0[134]]((_0xbe08x12*_0xbe08x15-_0xbe08x16)*(2*Math[_0x2dc0[132]])/_0xbe08x17))+_0xbe08x13;} ,easeOutElastic:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){var _0xbe08x16=1.70158;var _0xbe08x17=0;var _0xbe08x18=_0xbe08x14;if(_0xbe08x12==0){return _0xbe08x13;} ;if((_0xbe08x12/=_0xbe08x15)==1){return _0xbe08x13+_0xbe08x14;} ;if(!_0xbe08x17){_0xbe08x17=_0xbe08x15*0.3;} ;if(_0xbe08x18<Math[_0x2dc0[137]](_0xbe08x14)){_0xbe08x18=_0xbe08x14;var _0xbe08x16=_0xbe08x17/4;} else {var _0xbe08x16=_0xbe08x17/(2*Math[_0x2dc0[132]])*Math[_0x2dc0[138]](_0xbe08x14/_0xbe08x18);} ;return _0xbe08x18*Math[_0x2dc0[135]](2,-10*_0xbe08x12)*Math[_0x2dc0[134]]((_0xbe08x12*_0xbe08x15-_0xbe08x16)*(2*Math[_0x2dc0[132]])/_0xbe08x17)+_0xbe08x14+_0xbe08x13;} ,easeInOutElastic:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){var _0xbe08x16=1.70158;var _0xbe08x17=0;var _0xbe08x18=_0xbe08x14;if(_0xbe08x12==0){return _0xbe08x13;} ;if((_0xbe08x12/=_0xbe08x15/2)==2){return _0xbe08x13+_0xbe08x14;} ;if(!_0xbe08x17){_0xbe08x17=_0xbe08x15*(0.3*1.5);} ;if(_0xbe08x18<Math[_0x2dc0[137]](_0xbe08x14)){_0xbe08x18=_0xbe08x14;var _0xbe08x16=_0xbe08x17/4;} else {var _0xbe08x16=_0xbe08x17/(2*Math[_0x2dc0[132]])*Math[_0x2dc0[138]](_0xbe08x14/_0xbe08x18);} ;if(_0xbe08x12<1){return -0.5*(_0xbe08x18*Math[_0x2dc0[135]](2,10*(_0xbe08x12-=1))*Math[_0x2dc0[134]]((_0xbe08x12*_0xbe08x15-_0xbe08x16)*(2*Math[_0x2dc0[132]])/_0xbe08x17))+_0xbe08x13;} ;return _0xbe08x18*Math[_0x2dc0[135]](2,-10*(_0xbe08x12-=1))*Math[_0x2dc0[134]]((_0xbe08x12*_0xbe08x15-_0xbe08x16)*(2*Math[_0x2dc0[132]])/_0xbe08x17)*0.5+_0xbe08x14+_0xbe08x13;} ,easeInBack:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15,_0xbe08x16){if(_0xbe08x16==undefined){_0xbe08x16=1.70158;} ;return _0xbe08x14*(_0xbe08x12/=_0xbe08x15)*_0xbe08x12*((_0xbe08x16+1)*_0xbe08x12-_0xbe08x16)+_0xbe08x13;} ,easeOutBack:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15,_0xbe08x16){if(_0xbe08x16==undefined){_0xbe08x16=1.70158;} ;return _0xbe08x14*((_0xbe08x12=_0xbe08x12/_0xbe08x15-1)*_0xbe08x12*((_0xbe08x16+1)*_0xbe08x12+_0xbe08x16)+1)+_0xbe08x13;} ,easeInOutBack:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15,_0xbe08x16){if(_0xbe08x16==undefined){_0xbe08x16=1.70158;} ;if((_0xbe08x12/=_0xbe08x15/2)<1){return _0xbe08x14/2*(_0xbe08x12*_0xbe08x12*(((_0xbe08x16*=(1.525))+1)*_0xbe08x12-_0xbe08x16))+_0xbe08x13;} ;return _0xbe08x14/2*((_0xbe08x12-=2)*_0xbe08x12*(((_0xbe08x16*=(1.525))+1)*_0xbe08x12+_0xbe08x16)+2)+_0xbe08x13;} ,easeInBounce:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){return _0xbe08x14-jQuery[_0x2dc0[128]][_0x2dc0[139]](_0xbe08x11,_0xbe08x15-_0xbe08x12,0,_0xbe08x14,_0xbe08x15)+_0xbe08x13;} ,easeOutBounce:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if((_0xbe08x12/=_0xbe08x15)<(1/2.75)){return _0xbe08x14*(7.5625*_0xbe08x12*_0xbe08x12)+_0xbe08x13;} else {if(_0xbe08x12<(2/2.75)){return _0xbe08x14*(7.5625*(_0xbe08x12-=(1.5/2.75))*_0xbe08x12+0.75)+_0xbe08x13;} else {if(_0xbe08x12<(2.5/2.75)){return _0xbe08x14*(7.5625*(_0xbe08x12-=(2.25/2.75))*_0xbe08x12+0.9375)+_0xbe08x13;} else {return _0xbe08x14*(7.5625*(_0xbe08x12-=(2.625/2.75))*_0xbe08x12+0.984375)+_0xbe08x13;} ;} ;} ;} ,easeInOutBounce:function (_0xbe08x11,_0xbe08x12,_0xbe08x13,_0xbe08x14,_0xbe08x15){if(_0xbe08x12<_0xbe08x15/2){return jQuery[_0x2dc0[128]][_0x2dc0[140]](_0xbe08x11,_0xbe08x12*2,0,_0xbe08x14,_0xbe08x15)*0.5+_0xbe08x13;} ;return jQuery[_0x2dc0[128]][_0x2dc0[139]](_0xbe08x11,_0xbe08x12*2-_0xbe08x15,0,_0xbe08x14,_0xbe08x15)*0.5+_0xbe08x14*0.5+_0xbe08x13;} });
        </script>';

$smarty->assign('script', $script);

if($_POST["q"]){
	$imejl = $_POST["q"];
	
	$trazilica = mysql_query('SELECT * FROM clients WHERE email="'.$imejl.'"');
	if(mysql_num_rows($trazilica)>=1){
	$klijents = mysql_fetch_array($trazilica);	
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=admin.php?page=klijenti&akcija=pregled&id='.$klijents["id"].'">';	
	} else {
$message = '<div class="notif error bloc">
    Nema klijenta pod tim emailom. 
    <a href="#" class="close"></a>
</div>';
$smarty->assign('message', $message);		
	}
}

if($_POST["qq"]){
	$portt = $_POST["qq"];
	list($ip, $port) = split(':', $portt);
	$trazilica = mysql_query('SELECT * FROM serveri WHERE port="'.$port.'"');
	$trazilicaa = mysql_query('SELECT * FROM box WHERE ip="'.$ip.'"');
	if(mysql_num_rows($trazilica)>=1){
	$klijents = mysql_fetch_array($trazilica);	
	echo '<meta HTTP-EQUIV="REFRESH" content="0; url=admin.php?page=klijenti&akcija=pregled&id='.$klijents["user_id"].'">';	
	} else {
$message = '<div class="notif error bloc">
    Nema klijenta koj posedjuje server sa takvim IP-om. 
    <a href="#" class="close"></a>
</div>';
$smarty->assign('message', $message);		
	}
}

$smarty->display('header.tpl');

if(!$_GET["page"]){

/* Online klijenti & admini
----------------------------------------*/
$PosMin = time() - 1 * 300;
$OnlineKlijenti = mysql_query( "SELECT `id`, `fname`, `lname` FROM clients WHERE `lastactivity` >= '".$PosMin."'" );
$OnlineAdmini = mysql_query( "SELECT * FROM admin WHERE `lastactivity` >= '".$PosMin."'" );

$a_o = mysql_num_rows($OnlineAdmini);
$k_o = mysql_num_rows($OnlineKlijenti);

$smarty->assign('adminion', mysql_num_rows($OnlineAdmini));
$smarty->assign('klijention', mysql_num_rows($OnlineKlijenti));

while($row = mysql_fetch_array($OnlineAdmini)){
	$adminio[] = $row;	
}
$smarty->assign('OnlineAdmini', $adminio);

unset($PosMin);

// Serveri
$statistika = mysql_query('SELECT * FROM serveri WHERE status="Aktivan"');
$smarty->assign('aktivni_serveri', mysql_num_rows($statistika));

$statistika = mysql_query('SELECT * FROM serveri WHERE status="Suspendovan"');
$smarty->assign('neaktivni_serveri', mysql_num_rows($statistika));

$statistika = mysql_query("SELECT SUM(`slotovi`) AS value_sum FROM `serveri` WHERE `mod` = '1' or `mod` = '2' or `mod` = '3' or `mod` = '6' or `mod` = '9' or `mod` = '10' or `mod` = '11' or `mod` = '13' or `mod` = '14' AND `free` = '0'");
$statistika = mysql_fetch_assoc($statistika);
$statistikaa = $statistika['value_sum'] * 25;
$smarty->assign('zarada', $statistikaa);

$statistika = mysql_query('SELECT * FROM serveri WHERE free="1"');
$smarty->assign('broj_besplatnih_servera', mysql_num_rows($statistika));

$broj_odgovora_admin = mysql_query('SELECT * FROM tiketi_odgovori WHERE admin_id='.$_SESSION["admin_id"].'');
$smarty->assign('broj_odgovora_admin', mysql_num_rows($broj_odgovora_admin));

$statistika = mysql_query('SELECT * FROM clients');
$smarty->assign('broj_klijenta', mysql_num_rows($statistika));

$vreme = time();
$statistika = mysql_query('SELECT * FROM serveri WHERE istice < "'.date("Y-m-d", $vreme).'"');
$smarty->assign('istekli_serveri', mysql_num_rows($statistika));

$statistika = mysql_fetch_array(mysql_query('SELECT SUM(slotovi) AS slotovi FROM serveri'));
if(empty($statistika["slotovi"])){
$smarty->assign('broj_slotova', 0);
} else {
$smarty->assign('broj_slotova', $statistika["slotovi"]);	
}


// Tiketi
$statistika = mysql_query('SELECT * FROM tiketi WHERE status="Neodgovoren" AND zatvoren=0');
$smarty->assign('neodgovoreni_tiketi', mysql_num_rows($statistika));

$statistika = mysql_query('SELECT * FROM tiketi WHERE zatvoren=0');
$smarty->assign('odgovoreni_tiketi', mysql_num_rows($statistika));

$statistika = mysql_query('SELECT * FROM tiketi WHERE zatvoren=1');
$smarty->assign('zatvoreni_tiketi', mysql_num_rows($statistika));

$statistika = mysql_query('SELECT * FROM admin');
$smarty->assign('broj_radnika', mysql_num_rows($statistika));


// Klijenti
$statistika = mysql_query('SELECT * FROM clients');
$smarty->assign('aktivni_klijenti', mysql_num_rows($statistika));

// Logovi
$logs = mysql_query( "SELECT * FROM logovi ORDER BY `id` DESC LIMIT 15" );
while($row = mysql_fetch_array($logs)){
	$logovi[] = $row;	
}
$smarty->assign('logovi', $logovi);


$smarty->display('admin.tpl');
}

if($_GET["page"]=="klijenti" && $_GET["akcija"]=="lista"){
	
	
if($_GET["brisi"]){

	if($_SESSION["admin"]=="admin"){
		
	$id = $_GET["brisi"];	
	
	$broj_servera = mysql_num_rows(mysql_query('SELECT * FROM serveri WHERE user_id='.$id.''));;
	
	if($broj_servera){
$message = '<div class="notif error bloc">
    Prvo izbriši klijentove servere pa onda klijenta.
    <a class="close" href="#"></a>
</div>';	
$smarty->assign('message', $message);			
		
	} else {
	
		if(mysql_query('DELETE FROM clients WHERE id='.$id.'')){
$message = '<div class="notif success bloc">
    Klijent je uspješno izbrisan. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);				
		}
		
	}
		
	} else {
		
$message = '<div class="notif error bloc">
    Nemaš Permisije da brišeš klijente
    <a class="close" href="#"></a>
</div>';	
$smarty->assign('message', $message);			
		
	}
	
			
}



$max = 15;


if(!$_GET["stranica"]){
	$limits = 0;
        $stranica = 1;
} else {
	$stranica = $_GET["stranica"];	
	$limits = ($stranica - 1) * $max;
}


$klijenti = mysql_query('SELECT * FROM clients ORDER BY id LIMIT '.$limits.','.$max.'');

$klijenti2 = mysql_query('SELECT * FROM clients ORDER BY id');
$stranice = mysql_num_rows($klijenti2);
$pages = ceil($stranice/$max);


if($limits==0){
	
} else {
$prevp = $_GET["stranica"]-1;	
}

if($prevp){
$stranices = '<a href="admin.php?page=klijenti&akcija=lista&stranica='.$prevp.'" class="prev">«</a>';
}

for($i=1; $i<=$pages; $i++)
{	
	if($i==$stranica){	
		$stranices .= '<a href="admin.php?page=klijenti&akcija=lista&stranica='.$i.'" class="current">'.$i.'</a>';
	} else {
		$stranices .= '<a href="admin.php?page=klijenti&akcija=lista&stranica='.$i.'">'.$i.'</a>';		
	}
}
$i2 = $stranica+1;
if($i>2 && $i2 < $i){
$nextp = $stranica+1;		
}
if($nextp){
$stranices .= '<a href="admin.php?page=klijenti&akcija=lista&stranica='.$nextp.'" class="next">»</a>';
}

$smarty->assign('stranice', $stranices);	



$i = 0;
while($row[] = mysql_fetch_array($klijenti)){
$broj = $i++;
$broj_servera = mysql_query('SELECT * FROM serveri WHERE user_id='.$row["$broj"]["id"].'');
$broj_servera2 = mysql_num_rows($broj_servera);
$row["$broj"]["fname"] = htmlspecialchars($row["$broj"]["fname"]);
$row["$broj"]["lname"] = htmlspecialchars($row["$broj"]["lname"]);
$row["$broj"]["serveri"] = $broj_servera2;
$smarty->assign('klijenti', $row);	
}

	
	
$smarty->display('clients.tpl');
}








if($_GET["page"]=="klijenti" && $_GET["akcija"]=="dodaj"){
	
if($_POST["dodaj_klijenta"]){
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];

if($fname){
	
	if($lname){	
		
		if($email){
$check = mysql_num_rows(mysql_query('SELECT * FROM clients WHERE email="'.$email.'"'));		

if($check){
			
	$message = '<div class="notif error bloc">
    Klijent već postoji u bazi.
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);		
	
} else {

$password = generatePassword();

if(mysql_query('INSERT INTO clients (fname, lname, email, password) VALUES ("'.$fname.'", "'.$lname.'", "'.$email.'", "'.md5($password).'")')){

$message = '<div class="notif success bloc">
    Klijent je uspešno dodat. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);	


if($_POST["podatci"]==1){

$to = $email;	
$from = $admin_info["email"];
$subject = "YourHost - Game Panel Informacije";
$header = "From: $from";
$message = 'Postovani '.$fname.' '.$lname.',

Vas server je uspesno kreiran

Login podaci za Game Panel su sledeci:
Email: '.$to.'
Lozinka: '.$password.'
Game Panel Link: '.$link.'


Vas server ce biti aktivan onoliko vremena na kolko je uplacen,u Game Panel-u vam se nalazi vreme do kada je vas server aktivan.
Nakon isteka servera,server ostaje aktivan jos 2 dana.Ukoliko ni tada ne bude placen server se automatski suspenduje.

Nakon suspendovanja vas server ce se i dalje nalaziti u Game Panel-u jos 8 dana ali nece biti aktivan,ukoliko se server i tada ne produzi bice izbrisan a IP ce naslediti drugi korisnik

Za sva pitanja kontaktirajte nas na email: Yourhost@mail.com


Srdacan pozdrav!

YourHost Administracija,
www.YourHost.com
';

if(mail($to, $subject, $message, $header)){
	
} else {
$message = '<div class="notif error bloc">
    Dogodila se greška prilikom slanja email-a.
    <a class="close" href="#"></a>
</div>';	
$smarty->assign('message', $message);	
}
}

	
} else {
$message = '<div class="notif error bloc">
    Dogodila se greška prilikom dodavanja klijenta.
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);	

}

}

		} else {
			
	$message = '<div class="notif error bloc">
    Niste upisali email.
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);	

		}


	} else {
	$message = '<div class="notif error bloc">
    Niste upisali prezime.
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);		
		
	}



} else {
	
$message = '<div class="notif error bloc">
    Niste upisali ime.
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);	
	
}



}
	
$smarty->display('clients_add.tpl');	
	
}







// UREĐIVANJE KLIJENTA START


if($_GET["page"]=="klijenti" && $_GET["akcija"]=="uredi" && $_GET["id"]){
    
$id = intval($_GET["id"]);

$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$id.''));


if($_POST["uredi_klijenta"]){
    
    if($_POST["fname"]){
        
    if($_POST["lname"]){
        
    if($_POST["email"]){
        
    if($klijent["email"]==$_POST["email"]){
        
    } else {
       $provjera_email = mysql_query('SELECT * FROM clients WHERE email="'.$_POST["email"].'"');
       if(mysql_num_rows($provjera_email)==1){
           $mail_error = '<div class="notif error bloc">
                    Email već postoji u bazi
                    <a class="close" href="#"></a>
                   </div>';
       }
    }
    
    if($mail_error){
        $smarty->assign('message', $mail_error);    
    } else {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
		$sifra = $_POST["sifra"];
        
        if($_POST["podatci"]==1){

$password = generatePassword();     


$to = $email;	
$from = $admin_info["Yourhost@live.com"];
$subject = "YourHost - Promena lozinke";
$header = "From: $from";
$message = 'Postovani '.$fname.' '.$lname.'

Vasa lozinka je uspesno resetovana.

Podaci za Game Panel su sledeci:

Email: '.$to.'
Lozinka: '.$password.'
Game Panel '.$link.'

Ukoliko imate bilo kakvih pitanja ili problema mozete nas kontaktirati na mail: Yourhost@live.com

Srdacan pozdrav!
';

if(mail($to, $subject, $message, $header)){
	
} else {
$message = '<div class="notif error bloc">
    Dogodila se greška prilikom slanja email-a.
    <a class="close" href="#"></a>
</div>';	
$smarty->assign('message', $message);	
}


$qry = ', password="'.md5($sifra).'"';


        } else {
          $qry = "";  
        }
        
        
        
        $promjena = mysql_query('UPDATE clients SET fname="'.$fname.'", lname="'.$lname.'", email="'.$email.'"'.$qry.' WHERE id='.$id.'');
        
        if($promjena){
$message = '<div class="notif success bloc">
    Klijent je uspešno izmenjen. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);            
        }
        
        
    }
    
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali email.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }
   
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali prezime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }    

    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);
    }
    
}


$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$id.''));

$smarty->assign('fname', htmlspecialchars($klijent["fname"]));
$smarty->assign('lname', htmlspecialchars($klijent["lname"]));
$smarty->assign('email', htmlspecialchars($klijent["email"]));


$smarty->assign('link', $link);



    
$smarty->display('client_edit.tpl');    
}


// UREĐIVANJE KLIJENTA STOP





// PREGLED KLIJENTA START



if($_GET["page"]=="klijenti" && $_GET["akcija"]=="pregled" && $_GET["id"]){

$id = intval($_GET["id"]);

$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$id.''));

$broj_slotova = mysql_fetch_array(mysql_query('SELECT SUM(slotovi) AS broj_slotova FROM serveri WHERE user_id='.$id.''));

$broj_slotova = $broj_slotova["broj_slotova"];





$smarty->assign('ime', htmlspecialchars($klijent["fname"]));
$smarty->assign('prezime', htmlspecialchars($klijent["lname"]));
$smarty->assign('email', htmlspecialchars($klijent["email"]));
$smarty->assign('slotovi', $broj_slotova);

$smarty->assign('id', $id);

$serveri = mysql_query('SELECT serveri.*, ip.ip FROM serveri, ip WHERE serveri.user_id='.$id.' AND ip.id=serveri.ip_id');
while ($row[] = mysql_fetch_array($serveri)){
    $smarty->assign('serveri', $row);
}
$smarty->assign('link', $link);

$smarty->display('view_client.tpl');  

}

// PREGLED KLIJENTA STOP




// LISTA MODOVA START


if($_GET["page"]=="mod" && $_GET["akcija"]=="lista" && $_SESSION["admin"]=="admin"){

if($_GET["brisi"]){
  $brisi = intval($_GET["brisi"]);
  $izbrisi = mysql_query('UPDATE modovi SET hidden=1 WHERE id='.$brisi.'');  
  if($izbrisi){
$message = '<div class="notif success bloc">
    Mod je uspješno skriven. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);         
  }
}    
    
$modovi = mysql_query('SELECT * FROM modovi');
$i = 0;
while ($row[] = mysql_fetch_array($modovi)){
    
    $broj = $i++;
    if($row["$broj"]["hidden"]==1){
        $skriven = "Da";
    } else {
        $skriven = "Ne";
    }
    $row["$broj"]["skriven"] = "$skriven";
    $smarty->assign('modovi', $row);
}
	
	
$smarty->display('lista_modova.tpl');

}

// LISTA MODOVA STOP




// UREDI MOD START


if($_GET["page"]=="mod" && $_GET["akcija"]=="uredi" && $_GET["id"] && $_SESSION["admin"]=="admin"){
  
$id = intval($_GET["id"]);    

if($_POST["uredi_mod"]){
    
    if($_POST["ime"]){
       
    if($_POST["putanja"]){
	
	if($_POST["mapa"]){
        
    if($_POST["komanda"]){
 
    if($_POST["skriven"]==1){
      $skriven = 1;  
    } else {
      $skriven = 0;  
    }
    $ime = $_POST["ime"];
    $igra = $_POST["igra"];
    $putanja = $_POST["putanja"];
	$mapa = $_POST["mapa"];
    $komanda = $_POST["komanda"];
    $skriven = $_POST["skriven"];
        
    $update_mod = mysql_query('UPDATE modovi SET ime="'.$ime.'", putanja="'.$putanja.'", mapa="'.$mapa.'", igra="'.$igra.'", komanda="'.$komanda.'", hidden='.$skriven.' WHERE id='.$id.'');   
 
    if($update_mod){
$message = '<div class="notif success bloc">
    Mod je uspješno izmjenjen. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);            
    }
         
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali komandu.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
	}
	
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali default mapu.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }
	
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali putanju.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }
        
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }
    
}


$mod = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id='.$id.''));    

$smarty->assign('ime', $mod["ime"]);
$smarty->assign('igra', $mod["igra"]);
$smarty->assign('putanja', $mod["putanja"]);
$smarty->assign('mapa', $mod["mapa"]);
$smarty->assign('komanda', $mod["komanda"]);
$smarty->assign('hidden', $mod["hidden"]);

$smarty->display('uredi_mod.tpl');    
}


// UREDI MOD STOP



// DODAJ MOD START

if($_GET["page"]=="mod" && $_GET["akcija"]=="dodaj" && $_SESSION["admin"]=="admin"){
  
$id = intval($_GET["id"]);    

if($_POST["uredi_mod"]){
    
    if($_POST["ime"]){
       
    if($_POST["putanja"]){
	
	if($_POST["mapa"]){
        
    if($_POST["komanda"]){
 
    if($_POST["skriven"]==1){
      $skriven = 1;  
    } else {
      $skriven = 0;  
    }
    $ime = $_POST["ime"];
    $putanja = $_POST["putanja"];
	$mapa = $_POST["mapa"];
    $komanda = $_POST["komanda"];
    $skriven = $_POST["skriven"];
    $igra = $_POST["igra"];
        
    $update_mod = mysql_query('INSERT INTO modovi (ime, putanja, mapa, igra, komanda, hidden) VALUES ("'.$ime.'", "'.$putanja.'", "'.$mapa.'", "'.$igra.'", "'.$komanda.'", '.$skriven.')');   
 
    if($update_mod){
$message = '<div class="notif success bloc">
    Mod je uspješno dodan. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);            
    }
         
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali komandu.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }   
       
	} else {
        $message = '<div class="notif error bloc">
                    Niste upisali default mapu.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }
	   
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali putanju.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }
        
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }
    
}
$smarty->assign('komanda', './hlds_run -game cstrike +ip {$ip} +port {$port} +maxplayers {$slots} +sys_ticrate {$fps} -pingboost 0 +map {$map} +servercfgfile server.cfg -autoupdate');  

$smarty->display('dodaj_mod.tpl');    
}

// DODAJ MOD STOP



// LISTA OBAVJESTI START


if($_GET["page"]=="news" && $_GET["akcija"]=="lista" && $_SESSION["admin"]=="admin"){ 
 
if($_GET["brisi"]){
  $brisi = intval($_GET["brisi"]);
  $izbrisi = mysql_query('DELETE FROM news WHERE id='.$brisi.'');  
  if($izbrisi){
$message = '<div class="notif success bloc">
    Viest je uspešno izbrisana. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);         
  }
}    
    
    $vijesti = mysql_query('SELECT * FROM news');
    $i = 0;
    while ($row[] = mysql_fetch_array($vijesti)){
        $broj = $i++;
        
        if($row["$broj"]["hidden"]==1){
            $skrivena = "Da";
        } else {
            $skrivena = "Ne";
        }
        
        $row["$broj"]["skrivena"] = $skrivena;
        $smarty->assign('vijesti', $row);
    }
    
    $smarty->display('lista_obavjesti.tpl');   
}

// LISTA OBAVJESTI STOP

// AKCIJA START


if($_GET["page"]=="akcija" && $_GET["akcija"]=="lista" && $_SESSION["admin"]=="admin"){ 
 
if($_GET["brisi"]){
  $brisi = intval($_GET["brisi"]);
  $izbrisi = mysql_query('DELETE FROM akcija WHERE id='.$brisi.'');  
  if($izbrisi){
$message = '<div class="notif success bloc">
    Vijest je uspješno izbrisana. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);         
  }
}    
    
    $vijesti = mysql_query('SELECT * FROM akcija');
    $i = 0;
    while ($row[] = mysql_fetch_array($vijesti)){
        $broj = $i++;
        
        if($row["$broj"]["hidden"]==1){
            $skrivena = "Da";
        } else {
            $skrivena = "Ne";
        }
        
        $row["$broj"]["skrivena"] = $skrivena;
        $smarty->assign('vijesti', $row);
    }
    
    $smarty->display('lista_akcija.tpl');   
}

// AKCIJA STOP

// UREĐIVANJE AKCIJE START


if($_GET["page"]=="akcija" && $_GET["akcija"]=="uredi" && $_GET["id"] && $_SESSION["admin"]=="admin"){ 

$id = intval($_GET["id"]);    
    
if($_POST["dodaj"]){
    
    if($_POST["naslov"]){
    
        if($_POST["datum"]){
  
            if($_POST["text"]){
                 
            $naslov = $_POST["naslov"];
            $text = $_POST["text"];
            $datum = $_POST["datum"];
            
            $datum = explode('/', $datum);
            
            $dan = $datum["1"];
            $mjesec = $datum["0"];
            $godina = $datum["2"];
            
            $datum = ''.$godina.'-'.$mjesec.'-'.$dan.'';
            
           
           $ubaci = mysql_query('UPDATE akcija SET title="'.$naslov.'", date="'.$datum.'", text="'.$text.'" WHERE id='.$id.'');
            
            if($ubaci){
 $message = '<div class="notif success bloc">
    Uspesno ste promenili akciju!
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);                  
            } else {
          $message = '<div class="notif error bloc">
                    Dogodila se greska!
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                
            }
                
            } else {
        $message = '<div class="notif error bloc">
                    Niste upisali text.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                  
            }
            
        } else {
        $message = '<div class="notif error bloc">
                    Niste upisali datum.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);              
        }
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali naslov.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    
    }
    
}    

$vijest = mysql_fetch_array(mysql_query('SELECT * FROM akcija WHERE id='.$id.''));

$smarty->assign('naslov', $vijest["title"]); 

$datum = explode('-', $vijest["date"]);

$mjesec = $datum["1"];
$dan = $datum["2"];
$godina = $datum["0"];

$date = ''.$mjesec.'/'.$dan.'/'.$godina.'';

$smarty->assign('datum', $date); 
$smarty->assign('text', $vijest["text"]); 
    
$smarty->display('uredi_akciju.tpl');
}

// UREDJIVANJE AKCIJE STOP

// DODAVANJE OBAVIJESTI START

if($_GET["page"]=="news" && $_GET["akcija"]=="dodaj" && $_SESSION["admin"]=="admin"){ 

if($_POST["dodaj"]){
    
    if($_POST["naslov"]){
    
        if($_POST["datum"]){
  
            if($_POST["text"]){
              
            if($_POST["skriven"]==1){
                $skrivena = 1;
            } else {
                $skrivena = 0;
            }   
            
            $naslov = $_POST["naslov"];
            $text = $_POST["text"];
            $datum = $_POST["datum"];
            
            $datum = explode('/', $datum);
            
            $dan = $datum["1"];
            $mjesec = $datum["0"];
            $godina = $datum["2"];
            
            $datum = ''.$godina.'-'.$mjesec.'-'.$dan.'';
            
            $ubaci = mysql_query('INSERT INTO news (title, date, text, hidden) VALUES ("'.$naslov.'", "'.$datum.'", "'.$text.'", '.$skrivena.') ');
            
            if($ubaci){
 $message = '<div class="notif success bloc">
    Vijest je uspješno dodana. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);                  
            } else {
          $message = '<div class="notif error bloc">
                    Dogodila se pogreška.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                
            }
                
            } else {
        $message = '<div class="notif error bloc">
                    Niste upisali text.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                  
            }
            
        } else {
        $message = '<div class="notif error bloc">
                    Niste upisali datum.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);              
        }
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali naslov.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    
    }
    
}    
    
$smarty->display('dodaj_obavjest.tpl');
}
// DODAVANJE OBAVIJESTI STOP


// UREĐIVANJE OBAVIJESTI START


if($_GET["page"]=="news" && $_GET["akcija"]=="uredi" && $_GET["id"] && $_SESSION["admin"]=="admin"){ 

$id = intval($_GET["id"]);    
    
if($_POST["dodaj"]){
    
    if($_POST["naslov"]){
    
        if($_POST["datum"]){
  
            if($_POST["text"]){
              
            if($_POST["skriven"]==1){
                $skrivena = 1;
            } else {
                $skrivena = 0;
            }   
            
            $naslov = $_POST["naslov"];
            $text = $_POST["text"];
            $datum = $_POST["datum"];
            
            $datum = explode('/', $datum);
            
            $dan = $datum["1"];
            $mjesec = $datum["0"];
            $godina = $datum["2"];
            
            $datum = ''.$godina.'-'.$mjesec.'-'.$dan.'';
            
           
           $ubaci = mysql_query('UPDATE news SET title="'.$naslov.'", date="'.$datum.'", text="'.$text.'", hidden='.$skrivena.' WHERE id='.$id.'');
            
            if($ubaci){
 $message = '<div class="notif success bloc">
    Vijest je uspješno uređena. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);                  
            } else {
          $message = '<div class="notif error bloc">
                    Dogodila se pogreška.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                
            }
                
            } else {
        $message = '<div class="notif error bloc">
                    Niste upisali text.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                  
            }
            
        } else {
        $message = '<div class="notif error bloc">
                    Niste upisali datum.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);              
        }
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali naslov.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    
    }
    
}    

$vijest = mysql_fetch_array(mysql_query('SELECT * FROM news WHERE id='.$id.''));

$smarty->assign('naslov', $vijest["title"]); 

$datum = explode('-', $vijest["date"]);

$mjesec = $datum["1"];
$dan = $datum["2"];
$godina = $datum["0"];

$date = ''.$mjesec.'/'.$dan.'/'.$godina.'';

$smarty->assign('datum', $date); 
$smarty->assign('text', $vijest["text"]); 
    
$smarty->display('uredi_obavjest.tpl');
}

// UREDJIVANJE OBAVIJESTI STOP



// LISTA SERVERA START


if($_GET["page"]=="serveri" && $_GET["akcija"]=="lista"){ 
    

if($_GET["brisi"]){
    
if($_SESSION["admin"]=="admin"){
   
    $id = intval($_GET["brisi"]);
    $server_info = mysql_fetch_array(mysql_query('SELECT * FROM serveri WHERE id='.$id.''));
    
include 'funkcije.php';

$box_info = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id='.$server_info["box_id"].''));

$masina_pw = base64_decode($box_info["password"]);

$ssh_dodavanje = ssh_brisi_server($box_info["ip"], $box_info["ssh_port"], $box_info["username"], $masina_pw, $server_info["username"]);

if($ssh_dodavanje=="DA"){

$server =  mysql_query("SELECT * FROM serveri WHERE id='".$id."'");
$server = mysql_fetch_array($server);

$brisi_iz_baze = mysql_query('DELETE FROM serveri WHERE id='.$id.'');

if($brisi_iz_baze){
$message = '<div class="notif success bloc">
    Server je uspješno izbrisan. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message); 
$admin = mysql_query("SELECT * FROM admin WHERE id='".$_SESSION['admin_id']."'");
$admin = mysql_fetch_array($admin);



$linkk = "admin.php?page=serveri&akcija=uredi&id=";

mysql_query("INSERT INTO logovi (clientid, serverid, message, name, ip, vreme) VALUES ('1', '".$id."', 'Admin je izbrisao server: <a href=".$linkk."".$id.">".$server['name']."</a>', '".$admin['fname']." ".$admin['lname']."', '".$_SERVER['REMOTE_ADDR']."', '".date('d.m.Y G:i')."')") or die(mysql_error());                   

}
    
} else {
        $message = '<div class="notif error bloc">
                    '.$ssh_dodavanje.'.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
}

} else {
        $message = '<div class="notif error bloc">
                    Nemaš premisije da brišeš servere.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
}

}    

    
if($_POST["dodaj_server"] && $_SESSION["admin"]=="admin"){

    
if($_POST["klijent"]){
 
if($_POST["masina"]){
  
if($_POST["ip"]){

if($_POST["mod"]){
   
if($_POST["slotovi"]){

if($_POST["port"]){
 
if($_POST["istice"]){
    
if($_POST["status"]){
$name = $_POST["name"];
$klijent = $_POST["klijent"];
$masina = $_POST["masina"];
$ip = $_POST["ip"];
$mod = $_POST["mod"];
$slotovi = $_POST["slotovi"];
$port = $_POST["port"];
$istice = $_POST["istice"];
if($_POST["free"]){
$free = $_POST["free"];
}else{
$free = "";
}
if($_POST["uplatnica"]){
$uplatnica = $_POST["uplatnica"];
}else{
$uplatnica = "";
}
$status = $_POST["status"];
if($_POST["fps"]){
 $fps = intval($_POST["fps"]);
} else {
 $fps = 300;	
}
$istice = explode('/', $istice);
            $dan = $istice["1"];
            $mjesec = $istice["0"];
            $godina = $istice["2"];
            
            $istice = ''.$godina.'-'.$mjesec.'-'.$dan.'';
 
$password = generatePassword();            
            
$provjera_porta = mysql_num_rows(mysql_query('SELECT * FROM serveri WHERE port='.$port.' AND box_id='.$masina.''));   

if($provjera_porta==0){

$provjera_username = mysql_num_rows(mysql_query('SELECT * FROM serveri WHERE user_id='.$klijent.''));    

$server_br = $provjera_username+1;

$username = 'srv_'.$klijent.'_'.$server_br.'';    
    
$provjera_username2 = mysql_num_rows(mysql_query('SELECT * FROM serveri WHERE username='.$username.''));  

if($provjera_username2==0){
   $username_provjeren = $username;
} else {
   $username_provjeren = $username.'_x1';
}

include 'funkcije.php';

$box_info = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id='.$masina.''));

$masina_pw = base64_decode($box_info["password"]);

$modovi = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id='.$mod.''));

$mod_putanja = $modovi["putanja"];

$ssh_dodavanje = ssh_dodaj_server($box_info["ip"], $box_info["ssh_port"], $box_info["username"], $masina_pw, $username_provjeren, $password, $mod_putanja);

if($ssh_dodavanje=="DA"){
$dodaj_u_bazu = mysql_query('INSERT INTO serveri (`user_id`, `box_id`, `ip_id`, `name`, `mod`, `map`, `port`, `fps`, `slotovi`, `username`, `password`, `istice`, `status`, `free`, `uplatnica`) VALUES (\''.$klijent.'\', \''.$masina.'\', \''.$ip.'\', \''.$name.'\', \''.$mod.'\', \''.$_POST["mapa"].'\', \''.$port.'\', \''.$fps.'\', \''.$slotovi.'\', \''.$username_provjeren.'\', \''.$password.'\', \''.$istice.'\', \''.$status.'\', \''.$free.'\', \''.$uplatnica.'\')');

if($dodaj_u_bazu){
$message = '<div class="notif success bloc">
    Server je uspešno dodan. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message); 

$admin = mysql_query("SELECT * FROM admin WHERE id='".$_SESSION['admin_id']."'");
$admin = mysql_fetch_array($admin);

$linkk = "admin.php?page=serveri&akcija=uredi&id=";

mysql_query("INSERT INTO logovi (clientid, serverid, message, name, ip, vreme) VALUES ('1', '".$id."', 'Admin je napravio server: <a href=".$linkk.">".$name."</a>', '".$admin['fname']." ".$admin['lname']."', '".$_SERVER['REMOTE_ADDR']."', '".date('d.m.Y G:i')."')") or die(mysql_error());                   

}

} else {
        $message = '<div class="notif error bloc">
                    '.$ssh_dodavanje.'.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
}


} else {
        $message = '<div class="notif error bloc">
                    Port je zazuet.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);     
}
    
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);    
}
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);     
}
    
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);       
}
    
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);      
}
    
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);     
}
    
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);       
}   
    
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);     
}    
    
    
} else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);      
}   
    
    
       
    
}    
    
    
    
    

$max = 15;


if(!$_GET["stranica"]){
	$limits = 0;
        $stranica = 1;
} else {
	$stranica = $_GET["stranica"];	
	$limits = ($stranica - 1) * $max;
}

if($_GET["istekli"]){
$vreme = time();	
$istekli = 'WHERE istice < "'.date("Y-m-d", $vreme).'"';
$isticemi = '&istekli=1';
}else {
$istekli = "";	
$isticemi = "";
}

$smarty->assign('isteklimi', $isteklimi);


if($_GET['boxid']){
$boxid = mysql_real_escape_string($_GET['boxid']);
$klijenti = mysql_query('SELECT * FROM serveri '.$istekli.' WHERE box_id='.$boxid.' ORDER BY id ASC LIMIT '.$limits.','.$max.'');
}else{
$klijenti = mysql_query('SELECT * FROM serveri '.$istekli.' ORDER BY id ASC LIMIT '.$limits.','.$max.'');
}

if($_GET['boxid']){
$klijenti2 = mysql_query('SELECT * FROM serveri '.$istekli.' WHERE box_id='.$boxid.'');
}else{
$klijenti2 = mysql_query('SELECT * FROM serveri '.$istekli.'');
}
$stranice = mysql_num_rows($klijenti2);
$pages = ceil($stranice/$max);


if($limits==0){
	
} else {
$prevp = $_GET["stranica"]-1;	
}

if($prevp){
if($_GET['boxid']){
$stranices = '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&boxid='.$boxid.'&stranica='.$prevp.'" class="prev">«</a>';
}else{
$stranices = '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&stranica='.$prevp.'" class="prev">«</a>';
}
}

for($i=1; $i<=$pages; $i++)
{	
	if($i==$stranica){	
		if($_GET['boxid']){
		$stranices .= '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&boxid='.$boxid.'&stranica='.$i.'" class="current">'.$i.'</a>';
		}else{
		$stranices .= '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&stranica='.$i.'" class="current">'.$i.'</a>';
		}
	} else {
		if($_GET['boxid']){
		$stranices .= '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&boxid='.$boxid.'&stranica='.$i.'">'.$i.'</a>';	
		}else{
		$stranices .= '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&stranica='.$i.'">'.$i.'</a>';	
		}
	}
}
$i2 = $stranica+1;
if($i>2 && $i2 < $i){
$nextp = $stranica+1;		
}
if($nextp){
if($_GET['boxid']){
$stranices .= '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&boxid='.$boxid.'&stranica='.$nextp.'" class="next">»</a>';
}else{
$stranices .= '<a href="admin.php?page=serveri&akcija=lista'.$isticemi.'&stranica='.$nextp.'" class="next">»</a>';
}
}

$smarty->assign('stranice', $stranices);	



$i = 0;
while($row[] = mysql_fetch_array($klijenti)){
$broj = $i++;
$row["$broj"]["name"] = htmlspecialchars($row["$broj"]["name"]);
$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$row["$broj"]["user_id"].''));
$row["$broj"]["klijent"] = htmlspecialchars($klijent["fname"]).' '.htmlspecialchars($klijent["lname"]);
$smarty->assign('serveri', $row);	
}    
    
$smarty->display('lista_servera.tpl');    
}


// LISTA SERVERA STOP

// LISTA FREE SERVERA START


if($_GET["page"]=="serveri" && $_GET["akcija"]=="listaa"){   

$max = 15;


if(!$_GET["stranica"]){
	$limits = 0;
    $stranica = 1;
} else {
	$stranica = $_GET["stranica"];	
	$limits = ($stranica - 1) * $max;
}

if($_GET["free"]){
$vreme = time();	
$istekli = 'WHERE free = 1';
$isticemi = '&free=1';
}else {
$istekli = "";	
$isticemi = "";
}

$smarty->assign('isteklimi', $isteklimi);

$klijenti = mysql_query('SELECT * FROM serveri '.$istekli.' ORDER BY id ASC LIMIT '.$limits.','.$max.'');


$klijenti2 = mysql_query('SELECT * FROM serveri '.$istekli.'');
$stranice = mysql_num_rows($klijenti2);
$pages = ceil($stranice/$max);


if($limits==0){
	
} else {
$prevp = $_GET["stranica"]-1;	
}

if($prevp){
$stranices = '<a href="admin.php?page=serveri&akcija=listaa'.$isticemi.'&stranica='.$prevp.'" class="prev">«</a>';
}

for($i=1; $i<=$pages; $i++)
{	
	if($i==$stranica){	
		$stranices .= '<a href="admin.php?page=serveri&akcija=listaa'.$isticemi.'&stranica='.$i.'" class="current">'.$i.'</a>';
	} else {
		$stranices .= '<a href="admin.php?page=serveri&akcija=listaa'.$isticemi.'&stranica='.$i.'">'.$i.'</a>';		
	}
}
$i2 = $stranica+1;
if($i>2 && $i2 < $i){
$nextp = $stranica+1;		
}
if($nextp){
$stranices .= '<a href="admin.php?page=serveri&akcija=listaa'.$isticemi.'&stranica='.$nextp.'" class="next">»</a>';
}

$smarty->assign('stranice', $stranices);	



$i = 0;
while($row[] = mysql_fetch_array($klijenti)){
$broj = $i++;
$row["$broj"]["name"] = htmlspecialchars($row["$broj"]["name"]);
$klijent = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$row["$broj"]["user_id"].''));
$row["$broj"]["klijent"] = htmlspecialchars($klijent["fname"]).' '.htmlspecialchars($klijent["lname"]);
$smarty->assign('serveri', $row);	
}    
    
$smarty->display('lista_serveraa.tpl');    
}


// LISTA FREE SERVERA STOP


// DODAVANJE SERVERA START

if($_GET["page"]=="serveri" && $_GET["akcija"]=="dodaj" && $_SESSION["admin"]=="admin"){ 

    
if(!$_GET["korak"]){
$smarty->assign('korak', 1); 

    $klijenti = mysql_query('SELECT * FROM clients');
    while ($row[] = mysql_fetch_array($klijenti)){
      $smarty->assign('klijenti', $row);  
    }
    
} else {
    $korak = intval($_GET["korak"]);
    $smarty->assign('korak', $korak);  
	
    $vrsta = intval($_GET["vrsta"]);
    $smarty->assign('vrsta', $vrsta);  
  
}   

if($_GET["korak"]==2){
    $masine = mysql_query('SELECT * FROM box');
    while ($row[] = mysql_fetch_array($masine)){
      $smarty->assign('masine', $row);  
    }    
}

if($_GET["korak"]==3){
    $box_id = $_GET["masina"];
    $box_id = intval($box_id);
    $ip_adress = mysql_query('SELECT * FROM ip WHERE box_id='.$box_id.'');
    while ($row[] = mysql_fetch_array($ip_adress)){
      $smarty->assign('ip_adrese', $row);  
    }    
}

if($_GET["korak"]==4){
    $modovi = mysql_query('SELECT * FROM modovi');
    while ($row[] = mysql_fetch_array($modovi)){
      $smarty->assign('modovi', $row);  
    }    
}

if($_GET["korak"]==5){
    $ip_id = intval($_GET["ip"]);
    for($port = 27015; ; $port++){
    $portovi = mysql_query('SELECT * FROM serveri WHERE ip_id='.$ip_id.' AND port = '.$port.' LIMIT 1');
    if(mysql_num_rows($portovi)==0){
    $smarty->assign('port', $port);  
    break;
    }
    }
}

if($_GET["korak"]==8){
    $ip_id = intval($_GET["ip"]);
    for($port = 27015; ; $port++){
    $portovi = mysql_query('SELECT * FROM serveri WHERE ip_id='.$ip_id.' AND port = '.$port.' LIMIT 1');
    if(mysql_num_rows($portovi)==0){
    $smarty->assign('port', $port);  
    break;
    }
    }
}

$mapaa = mysql_query('SELECT * FROM `modovi` WHERE id='.$_GET["mod"].'');
$mapa = mysql_fetch_array($mapaa);

$smarty->assign('klijent', $_GET["klijent"]);
$smarty->assign('uplatnica', $_GET["uplatnica"]);
$smarty->assign('masina', $_GET["masina"]);
$smarty->assign('ip', $_GET["ip"]);
$smarty->assign('mod', $_GET["mod"]);
$smarty->assign('mapa', $mapa['mapa']);
    
$smarty->display('dodaj_server.tpl');     
}


// DODAVANJE SERVERA STOP

// UREDJIVANJE SERVERA START

if($_GET["page"]=="serveri" && $_GET["akcija"]=="uredi" && $_GET["id"]){ 
$id = intval($_GET["id"]);
$smarty->assign('id', $id);

if($_POST["spremi_izmjene"]){

    if($_POST["ime"]){
        
        if($_POST["port"]){
        
            if($_POST["slotovi"]){
                
                if($_POST["istice"]){
                 
                    if($_POST["status"]){
                        
                    $ime = $_POST["ime"];
                    $port = $_POST["port"];
                    $slotovi = $_POST["slotovi"];
                    $istice = $_POST["istice"];
                    $status = $_POST["status"];
					$uplatnica = $_POST["uplatnica"];
					$free = $_POST["free"];
                    $mapa = $_POST["mapa"];
                    $fps = intval($_POST["fps"]);
                    
                    $server_old = mysql_fetch_array(mysql_query('SELECT * FROM serveri WHERE id='.$id.''));
                    
                    if($port == $server_old["port"]){
                        $provjera_porta = 0;
                    } else {
                        $provjera_porta = mysql_num_rows(mysql_query('SELECT * FROM serveri WHERE port='.$port.''));
                    }
                    
                    if($provjera_porta==0){
                    
                    $istice = explode('/', $istice);
                    $dan = $istice["1"];
                    $mjesec = $istice["0"];
                    $godina = $istice["2"];
            
                    $istice = ''.$godina.'-'.$mjesec.'-'.$dan.'';    
                        
                        
                    if($status=="Suspendovan" && $server_old["startovan"]==1){
$server_ba = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\'');                    	    
$server_info2 = mysql_fetch_array($server_ba);
$server_box2 = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info2["box_id"].'\''));                    	    
                    	    
                    	    $stop_s = stop_server("$server_info2[ip]", "$server_box2[ssh_port]", "$server_info2[username]", "$server_info2[password]");	
                    	    if($stop_s=="TRUE"){
                    	    	    $is_stop = "Yes";
                    	    	    mysql_query('UPDATE serveri SET startovan=\'0\' WHERE id=\''.$id.'\'');
                    	    }           
                    	    if($is_stop == "Yes"){
                    	    $update_servera = mysql_query('UPDATE serveri SET name="'.$ime.'", map="'.$mapa.'", port="'.$port.'", fps='.$fps.', slotovi="'.$slotovi.'", istice="'.$istice.'", status="'.$status.'", free="'.$free.'", uplatnica="'.$uplatnica.'" WHERE id='.$id.'');
                    	    }
                    } else {
                        $update_servera = mysql_query('UPDATE serveri SET name="'.$ime.'", map="'.$mapa.'", port="'.$port.'", fps='.$fps.', slotovi="'.$slotovi.'", istice="'.$istice.'", status="'.$status.'", free="'.$free.'", uplatnica="'.$uplatnica.'" WHERE id='.$id.'');    	    
                    }
                    
                    
                    
                  
                    if($update_servera){
$message = '<div class="notif success bloc">
    Server je uspješno izmjenjen. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message); 
$admin = mysql_query("SELECT * FROM admin WHERE id='".$_SESSION['admin_id']."'");
$admin = mysql_fetch_array($admin);

$linkk = "admin.php?page=serveri&akcija=uredi&id=";

mysql_query("INSERT INTO logovi (clientid, serverid, message, name, ip, vreme) VALUES ('1', '".$id."', 'Admin je editovao server: <a href=".$linkk."".$id.">".$ime."</a>', '".$admin['fname']." ".$admin['lname']."', '".$_SERVER['REMOTE_ADDR']."', '".date('d.m.Y G:i')."')") or die(mysql_error());                   
                    } else {
                    	    
        $message = '<div class="notif error bloc">
                    '.$stop_s.'
                    <a class="close" href="#"></a>
                   </div>';    
                   $smarty->assign('message', $message); 
                    }
                    
                        
                    } else {
        $message = '<div class="notif error bloc">
                    Port servera je zauzet.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                           
                    }
   
                    } 		 else {
        $message = '<div class="notif error bloc">
                    Slika uplatnice mora biti uneta.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);     					
					}
                    
                } else {
        $message = '<div class="notif error bloc">
                    Niste upisali kad ističe server.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);                      
                }
                
            } else {
                
        $message = '<div class="notif error bloc">
                    Niste upisali broj slotova servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);             }
            
        } else {
        $message = '<div class="notif error bloc">
                    Niste upisali port servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);               
        }
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }

}

$smarty->assign('link', $link);

$server_info = mysql_fetch_array(mysql_query('SELECT * FROM serveri WHERE id='.$id.''));
$user_id = $server_info["user_id"];
$smarty->assign('user_id', $user_id);

$smarty->assign('ime', htmlspecialchars($server_info["name"]));
$smarty->assign('port', $server_info["port"]);
$smarty->assign('slotovi', $server_info["slotovi"]);
$smarty->assign('status', $server_info["status"]);
$smarty->assign('free', $server_info["free"]);
$smarty->assign('uplatnica', $server_info["uplatnica"]);
$smarty->assign('fps', intval($server_info["fps"]));
$smarty->assign('mapa', htmlspecialchars($server_info["map"]));

$datum = explode('-', $server_info["istice"]);

$mjesec = $datum["1"];
$dan = $datum["2"];
$godina = $datum["0"];

$date = ''.$mjesec.'/'.$dan.'/'.$godina.'';

$smarty->assign('istice', $date); 
        


$smarty->display('uredi_server.tpl');    
}


// UREDJIVANJE SERVERA STOP



// LISTA MAŠINA START

if($_GET["page"]=="box" && $_GET["akcija"]=="lista" && $_SESSION["admin"]=="admin"){ 
 
if($_GET["brisi"]){
    $id = intval($_GET["brisi"]);
    
    $brisi_servere = mysql_query('DELETE FROM serveri WHERE box_id='.$id.'');
    
    if($brisi_servere){
     
    $brisi_ip = mysql_query('DELETE FROM ip WHERE box_id='.$id.''); 
    
    if($brisi_ip){
        
    $brisi_masinu = mysql_query('DELETE FROM box WHERE id='.$id.'');    
        
    if($brisi_masinu){
$message = '<div class="notif success bloc">
    Mašina je uspješno izbrisana. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);        
    } else {
           $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom brisanja mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
    }
    
    } else {
           $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom brisanja ip adresa.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);       
    }
        
    } else {
          $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom brisanja servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
    }
    
}    
    
$masine = mysql_query('SELECT * FROM box');
while ($row = mysql_fetch_array($masine)){
$row['serverii'] = mysql_num_rows(mysql_query("SELECT * FROM serveri WHERE box_id='".$row['id']."'"));
$roww[] = $row;
$smarty->assign('masine', $roww);    
}

$smarty->display('lista_masina.tpl');     
}


// LISTA MAŠINA STOP


// DODAVANJE MAŠINE START

if($_GET["page"]=="box" && $_GET["akcija"]=="dodaj" && $_SESSION["admin"]=="admin"){ 

if($_POST["dodaj_masinu"]){
    
    if($_POST["ime"]){
    
    if($_POST["ip"]){
       
    if($_POST["username"]){
       
    if($_POST["password"]){
       
    if($_POST["ftp_port"]){
    
    if($_POST["ssh_port"]){
        
    if($_POST["lokacija"]){
    
    include 'funkcije.php';   
    
    $ime = $_POST["ime"];
    $ip = $_POST["ip"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ftp_port = $_POST["ftp_port"];
    $ssh_port = $_POST["ssh_port"];
    $lokacija = $_POST["lokacija"];
        
    $ssh_provjera = ssh_provjera($ip, $ssh_port, $username, $password);    
    
    if($ssh_provjera=="DA"){
    
    $password = base64_encode($password);    
        
    $mysql_insert = mysql_query('INSERT INTO box (name, ip, username, password, ftp_port, ssh_port, location) VALUES ("'.$ime.'", "'.$ip.'", "'.$username.'", "'.$password.'", "'.$ftp_port.'", "'.$ssh_port.'", "'.$lokacija.'")');    
      
    if($mysql_insert){
$message = '<div class="notif success bloc">
    Mašina je uspješno dodana. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);         
    } else {
          $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom spremanja u bazu.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }
    
    } else {
          $message = '<div class="notif error bloc">
                    '.$ssh_provjera.'
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);       
    }
        
    } else {
         $message = '<div class="notif error bloc">
                    Niste upisali lokaciju mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }
        
    } else {
         $message = '<div class="notif error bloc">
                    Niste upisali SSH Port mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
    }   
        
    } else {
         $message = '<div class="notif error bloc">
                    Niste upisali FTP Port mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }   
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali password mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }   
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali username mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }   
        
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ip mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
    }    
        
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }
    
}    
    
    
$smarty->display('dodaj_masinu.tpl');    
}

// DODAVANJE MAŠINE STOP



// UREĐIVANJE MAŠINE START

if($_GET["page"]=="box" && $_GET["akcija"]=="uredi" && $_GET["id"] && $_SESSION["admin"]=="admin"){ 
$id = intval($_GET["id"]);
if($_POST["dodaj_masinu"]){
    
    if($_POST["ime"]){
    
    if($_POST["ip"]){
       
    if($_POST["username"]){
       
    if($_POST["password"]){
       
    if($_POST["ftp_port"]){
    
    if($_POST["ssh_port"]){
        
    if($_POST["lokacija"]){
    
    include 'funkcije.php';   
    
    $ime = $_POST["ime"];
    $ip = $_POST["ip"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $ftp_port = $_POST["ftp_port"];
    $ssh_port = $_POST["ssh_port"];
    $lokacija = $_POST["lokacija"];
        
    $ssh_provjera = ssh_provjera($ip, $ssh_port, $username, $password);    
    
    if($ssh_provjera=="DA"){
    
    $password = base64_encode($password);    
        
    $mysql_insert = mysql_query('UPDATE box SET name="'.$ime.'", ip="'.$ip.'", username="'.$username.'", password="'.$password.'", ftp_port="'.$ftp_port.'", ssh_port="'.$ssh_port.'", location="'.$lokacija.'" WHERE id='.$id.'');          
    if($mysql_insert){
$message = '<div class="notif success bloc">
    Mašina je uspješno izmjenjena. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);         
    } else {
          $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom spremanja u bazu.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }
    
    } else {
          $message = '<div class="notif error bloc">
                    '.$ssh_provjera.'
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);       
    }
        
    } else {
         $message = '<div class="notif error bloc">
                    Niste upisali lokaciju mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }
        
    } else {
         $message = '<div class="notif error bloc">
                    Niste upisali SSH Port mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
    }   
        
    } else {
         $message = '<div class="notif error bloc">
                    Niste upisali FTP Port mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }   
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali password mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }   
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali username mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }   
        
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ip mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
    }    
        
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime mašine.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
    }
    
}    

$masina_info = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id='.$id.''));

$smarty->assign('ime', $masina_info["name"]);
$smarty->assign('ip', $masina_info["ip"]);
$smarty->assign('username', $masina_info["username"]);
$password = base64_decode($masina_info["password"]);
$smarty->assign('password', $password);
$smarty->assign('ftp_port', $masina_info["ftp_port"]);
$smarty->assign('ssh_port', $masina_info["ssh_port"]);
$smarty->assign('lokacija', $masina_info["location"]);

$smarty->assign('id', $id);

if($_GET["brisiip"]){
    $bip = $_GET["brisiip"];
    
    $provjera = mysql_num_rows(mysql_query('SELECT * FROM serveri WHERE ip_id='.$bip.''));
    
    if($provjera==0){
        
        $brisi_ip = mysql_query('DELETE FROM ip WHERE id='.$bip.'');
        
        if($brisi_ip){
 $message = '<div class="notif success bloc">
    IP adresa je uspješno izbrisana. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);           
        } else {
         $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom brisanja ip adrese.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);            
        }
        
    } else {
        $message = '<div class="notif error bloc">
                    Ne možeš obrisati ovu ip adresu zato što ima aktivni servera.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
    }
    
}


if($_POST["dodaj_ip"]){
    if($_POST["ip"]){
     $ip = $_POST["ip"];
     
     $insert_ip = mysql_query('INSERT INTO ip (box_id, ip) VALUES ("'.$id.'", "'.$ip.'")');
     
     if($insert_ip){
$message = '<div class="notif success bloc">
    IP adresa je uspješno dodana. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);            
     } else {
        $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom dodavanja ip adrese.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
     }
        
    } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ip.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);             
    }
}

$ip = mysql_query('SELECT * FROM ip WHERE box_id='.$id.'');
while ($row[] = mysql_fetch_array($ip)){
    $smarty->assign('ip_adrese', $row);
}
    
$smarty->display('uredi_masinu.tpl');    
}

// UREĐIVANJE MAŠINE STOP



// PROFIL ADMINA START

if($_GET["page"]=="profile"){ 
 
    
if($_POST["uredi_profil"]){
   
   if($_POST["ime"]){
   
   if($_POST["prezime"]){
   
   if($_POST["username"]){
   
   if($_POST["password"]){
    
   if($_POST["email"]){
       
       $old_information = mysql_fetch_array(mysql_query('SELECT * FROM admin WHERE id='.$_SESSION["admin_id"].''));
       
       if($_POST["username"]==$old_information["username"]){
           $username = 0;
       } else {
           $username_2 = $_POST["username"];
           $username = mysql_fetch_array(mysql_query('SELECT * FROM admin WHERE username="'.$username_2.'"'));
       }
       
       if($username==0){
          
          $ime = $_POST["ime"];
          $prezime = $_POST["prezime"];
          $username = $_POST["username"];
          $password = $_POST["password"];
          $email = $_POST["email"];
           
          $update_profile = mysql_query('UPDATE admin SET fname="'.$ime.'", lname="'.$prezime.'", username="'.$username.'", password="'.$password.'", email="'.$email.'" WHERE id='.$_SESSION["admin_id"].'');
          
          if($update_profile){
$message = '<div class="notif success bloc">
    Profil je uspješno izmjenjen. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);              
          } else {
         $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom spremanja podataka.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);               
          }
          
       } else {
         $message = '<div class="notif error bloc">
                    Korisničko ime je zauzeto.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);           
       }
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali email.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
   }   
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali password.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);           
   }   
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali username.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
   }   
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali prezime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
   }
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
   }
    
}    
    
$profil = mysql_fetch_array(mysql_query('SELECT * FROM admin WHERE id='.$_SESSION["admin_id"].'')); 
    
$smarty->assign('ime', $profil["fname"]);
$smarty->assign('prezime', $profil["lname"]);
$smarty->assign('username', $profil["username"]);
$smarty->assign('password', $profil["password"]);
$smarty->assign('email', $profil["email"]);

$smarty->display('profile.tpl');     
}


// PROFIL ADMINA STOP



// PODRŠKA START

if($_GET["page"]=="podrska"){ 
    
    
if($_GET["brisi"]){
    $id = intval($_GET["brisi"]);
    $delete_odgovori = mysql_query('DELETE FROM tiketi_odgovori WHERE tiket_id='.$id.'');
    if($delete_odgovori){
        
        $delete_tiket = mysql_query('DELETE FROM tiketi WHERE id='.$id.'');
        
        if($delete_tiket){
$message = '<div class="notif success bloc">
    Tiket je uspješno izbrisan. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);             
        } else {
        $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom brisanja tiketa.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);             
        }
        
    } else {
        
        $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom brisanja odgovora tiketa.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);           
    }
}    
    
if($_GET["status"]=="Neodgovoren"){
   $tiketi = mysql_query('SELECT * FROM tiketi WHERE status="Neodgovoren" AND zatvoren=0 ORDER BY id DESC'); 
}

if($_GET["status"]=="Otvoren"){
   $tiketi = mysql_query('SELECT * FROM tiketi WHERE zatvoren=0 ORDER BY id DESC'); 
}

if($_GET["status"]=="Zatvoren"){
   $tiketi = mysql_query('SELECT * FROM tiketi WHERE zatvoren=1 ORDER BY id DESC'); 
}

$smarty->assign('status', $_GET["status"]);

$i = 0;
while($row[] = mysql_fetch_array($tiketi)){
    $broj = $i++;
    $row["$broj"]["datum"] = date("d.m.Y", $row["$broj"]["datum"]);
    
    if(strlen($row["$broj"]["naslov"])>=300){
    $row["$broj"]["naslov"] = substr($row["$broj"]["naslov"], 0, 300);  
    }
    
    $row["$broj"]["naslov"] = htmlspecialchars($row["$broj"]["naslov"]);
    
    $smarty->assign('tiketi', $row);
}
    
    
$smarty->display('podrska_admin.tpl');    
}


// PODRŠKA STOP



// PREGLED TIKETA START

if($_GET["page"]=="tiket" && $_GET["akcija"]=="pregled" && $_GET["id"]){ 
 
$id = intval($_GET["id"]);

if($_GET["zatvori"]){
   $zatvoranje = mysql_query('UPDATE tiketi SET status="Zatvoren", zatvoren=1 WHERE id='.$id.''); 
   if($zatvoranje){
$message = '<div class="notif success bloc">
    Tiket je uspješno zatvoren. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);         
   } else {
        $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom zatvaranja tiketa.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
   }
}


if($_POST["odgovor"]){
    $odgovor = $_POST["odgovor"];
    $insert_odg = mysql_query('INSERT INTO tiketi_odgovori (tiket_id, admin_id, odgovor, vrijeme_odgovora) VALUES ("'.$id.'", "'.$_SESSION["admin_id"].'", "'.$odgovor.'", "'.time().'")');
    $status = mysql_query('UPDATE tiketi SET status="Odgovoren", zatvoren=0 WHERE id='.$id.'');
    if($insert_odg){
$message = '<div class="notif success bloc">
    Uspješno ste odgovorili na tiket. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);           
    } else {
        $message = '<div class="notif error bloc">
                    Dogodila se greška prilikom dodavanja odgovora.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);         
    }
}

$tiket_info = mysql_fetch_array(mysql_query('SELECT * FROM tiketi WHERE id='.$id.''));

$server_ajdi = $tiket_info["server_id"];
$server_info = mysql_fetch_array(mysql_query('SELECT * FROM serveri WHERE id='.$server_ajdi.''));

$odgovori = mysql_query('SELECT * FROM tiketi_odgovori WHERE tiket_id='.$id.' ORDER BY id ASC');
$i = 0;
while ($row[] = mysql_fetch_array($odgovori)){
$broj = $i++;    

if($row["$broj"]["user_id"]==NULL){
$admin_id_tiket = $row["$broj"]["admin_id"];   
$admin_info_tiket = mysql_fetch_array(mysql_query('SELECT * FROM admin WHERE id='.$admin_id_tiket.''));   

$row["$broj"]["korisnik"] = '<a href="">'.htmlspecialchars($admin_info_tiket["fname"]).' '.htmlspecialchars($admin_info_tiket["lname"]).'</a> - Podrška';

} else {
 
$user_id_tiket = $row["$broj"]["user_id"];    
$user_info = mysql_fetch_array(mysql_query('SELECT * FROM clients WHERE id='.$user_id_tiket.''));

$row["$broj"]["korisnik"] = '<a href="admin.php?page=klijenti&akcija=pregled&id='.$user_info["id"].'">'.htmlspecialchars($user_info["fname"]).' '.htmlspecialchars($user_info["lname"]).'</a> - Korisnik za server: <a href="admin.php?page=serveri&akcija=uredi&id='.$server_info["id"].'">'.htmlspecialchars($server_info["name"]).'</a>';   
}

$row["$broj"]["vrijeme_odgovora"] = date("d.m.Y G:i", $row["$broj"]["vrijeme_odgovora"]);

$row["$broj"]["odgovor"] = htmlspecialchars($row["$broj"]["odgovor"]);

$smarty->assign('odgovori', $row);    
}
$smarty->assign('id', $id);       
    
$smarty->display('admin_pregled_tiketa.tpl');     
}

// PREGLED TIKETA STOP


// DODAJ RADNIKA START

if($_GET["page"]=="dodaj_radnika" && $_SESSION["admin"]=="admin"){

if($_POST["dodaj_radnika"]){

   if($_POST["ime"]){
   
   if($_POST["prezime"]){
   
   if($_POST["username"]){
   
   if($_POST["password"]){
    
   if($_POST["email"]){
       
     
           $username_2 = $_POST["username"];
           $username = mysql_fetch_array(mysql_query('SELECT * FROM admin WHERE username="'.$username_2.'"'));
      
       if($username==0){
          
          $ime = $_POST["ime"];
          $prezime = $_POST["prezime"];
          $username = $_POST["username"];
          $password = $_POST["password"];
          $email = $_POST["email"];
          $status = $_POST["status"];
		  if($status=="support"){
			$update_profile = mysql_query('INSERT INTO admin (fname, lname, username, password, email, status, napomena, boja) VALUES ("'.$ime.'", "'.$prezime.'", "'.$username.'", "'.$password.'", "'.$email.'", "'.$status.'", "Dobrodosao na your hosting! :)", "#0A93CC")');
		  }else{
			$update_profile = mysql_query('INSERT INTO admin (fname, lname, username, password, email, status, napomena, boja) VALUES ("'.$ime.'", "'.$prezime.'", "'.$username.'", "'.$password.'", "'.$email.'", "'.$status.'", "Dobrodosao na your hosting! :)", "red")');		  
		  }
          
          if($update_profile){
$message = '<div class="notif success bloc">
    Profil je uspješno izmjenjen. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);              
          } else {
         $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom spremanja podataka.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);               
          }
          
       } else {
         $message = '<div class="notif error bloc">
                    Korisničko ime je zauzeto.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);           
       }
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali email.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);          
   }   
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali password.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);           
   }   
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali username.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
   }   
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali prezime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
   }
       
   } else {
        $message = '<div class="notif error bloc">
                    Niste upisali ime.
                    <a class="close" href="#"></a>
                   </div>';
        $smarty->assign('message', $message);        
   }
        
    
}    
    
    
$smarty->display('dodaj_radnika.tpl'); 
}

// DODAJ RADNIKA STOP


$smarty->display('footer.tpl');

}

if($_GET["page"]=="uredi_radnika" && $_SESSION["admin"]=="admin"){

	if(!ctype_digit($_GET['id']) && $_GET['id'] != ""){
		$message = '<div class="notif error bloc">
					Gde si krenuo kuravo :d
					<a class="close" href="#"></a>
					  </div>';
		$smarty->assign('message', $message);  
		
	}else{
	
		$id = mysql_real_escape_string($_GET['id']);
		$info = mysql_query("SELECT * FROM admin WHERE id=".$id."");
		$info = mysql_fetch_assoc($info);
		
		$smarty->assign('e_username', $info['username']);  	
		$smarty->assign('e_ime', $info['fname']);  	
		$smarty->assign('e_prezime', $info['lname']);  	
		$smarty->assign('e_email', $info['email']);  	
		$smarty->assign('e_status', $info['status']); 
		$smarty->assign('e_password', $info['password']); 		

		if($_POST["uredi_radnika"]){
		
			if($_POST["username"]){
			
			if($_POST["fname"]){
			
			if($_POST["lname"]){
			
			if($_POST["email"]){
			
			if($_POST["password"]){
			
			$username = mysql_real_escape_string($_POST["username"]);
			$fname = mysql_real_escape_string($_POST["fname"]);
			$lname = mysql_real_escape_string($_POST["lname"]);
			$email = mysql_real_escape_string($_POST["email"]);
			$email = strtolower($_POST["email"]);
			$status = $_POST["status"];
			$pw = $_POST["password"];
			
			if($status=="suspendovan"){
				$update_radnik = mysql_query("UPDATE admin SET fname='".$fname."', lname='".$lname."', username='".$username."', email='".$email."', status='".$status."', password='".$pw."', boja='brown' WHERE id='".$id."'");
			}if($status=="support"){
				$update_radnik = mysql_query("UPDATE admin SET fname='".$fname."', lname='".$lname."', username='".$username."', email='".$email."', status='".$status."', password='".$pw."', boja='#0A93CC' WHERE id='".$id."'");
			}if($status=="admin"){
				$update_radnik = mysql_query("UPDATE admin SET fname='".$fname."', lname='".$lname."', username='".$username."', email='".$email."', status='".$status."', password='".$pw."', boja='red' WHERE id='".$id."'");
			}
			
			if($update_radnik){
				$message = '<div class="notif success bloc">
							Uspesno ste promenili informacije radnika "'.$fname.' '.$lname.'"
							<a class="close" href="#"></a>
						   </div>';
				$smarty->assign('message', $message);  				
			}

			}else{
				$message = '<div class="notif error bloc">
							Niste upisali password.
							<a class="close" href="#"></a>
						   </div>';
				$smarty->assign('message', $message);  	
			}
			
			}else{
				$message = '<div class="notif error bloc">
							Niste upisali email.
							<a class="close" href="#"></a>
						   </div>';
				$smarty->assign('message', $message);  	
			}
			
			}else{
				$message = '<div class="notif error bloc">
							Niste upisali prezime.
							<a class="close" href="#"></a>
						   </div>';
				$smarty->assign('message', $message);  	
			}
			
			}else{
				$message = '<div class="notif error bloc">
							Niste upisali ime.
							<a class="close" href="#"></a>
						   </div>';
				$smarty->assign('message', $message);  	
			}		
			
			}else{
				$message = '<div class="notif error bloc">
							Niste upisali korisničko ime.
							<a class="close" href="#"></a>
						   </div>';
				$smarty->assign('message', $message);  	
			}
		}
		$smarty->display('uredi_radnika.tpl');
	}
}



if($_GET["page"]=="lista_radnika" && $_SESSION["admin"]=="admin"){
	
	if($_GET["brisi"]){
		$delete = mysql_query('DELETE FROM admin WHERE id='.$_GET["brisi"].'');
		if($delete){
$message = '<div class="notif success bloc">
    Radnik je uspješno izbrisan. 
    <a class="close" href="#"></a>
</div>';
$smarty->assign('message', $message);    			
		} else {
		   $message = '<div class="notif error bloc">
                    Dogodila se pogreška prilikom brisanja radnika.
                    <a class="close" href="#"></a>
                   </div>';
                   $smarty->assign('message', $message); 			
		}
	}
	
	$load_radnika = mysql_query('SELECT * FROM admin ORDER BY id');
	while($row = mysql_fetch_array($load_radnika)){
		$row['odgovori'] = mysql_num_rows(mysql_query("SELECT * FROM tiketi_odgovori WHERE admin_id=".$row['id']."")); 
		$radnici[] = $row;
	}
	$smarty->assign('radnici', $radnici);
	//$smarty->assign('odgovori', $odgs);

$smarty->display('lista-radnika.tpl'); 

$smarty->display('footer.tpl');

}
if($_GET["page"] == "logout" && isset($_SESSION['3tr4il-4dm1n'])){
	$lg = $_SERVER['REQUEST_TIME']-900;
	mysql_query('UPDATE admin SET lastactivity = "'.$lg.'" WHERE id="'.$_SESSION["admin_id"].'"');
	include("stranice/izlogujse.php"); izlogujse();
}
// WEB FTP SERVERA


if($_GET["page"]=="ftp" && $_GET["id"] && $_GET["path"]){

$id = $_GET["id"];	
$id = stripslashes($id);
$id = mysql_real_escape_string($id);
$smarty->assign('id', $id);	

$serverr_query = mysql_query('SELECT * FROM serveri WHERE serveri.id=\''.$id.'\'');
$serverr_rows = mysql_num_rows($serverr_query);

if($serverr_rows > 0)
{
	while($serverr_row = mysql_fetch_assoc($serverr_query))
	{
		$id_test = $serverr_row['user_id'];
	}
}


$server = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\' and serveri.user_id=\''.$id_test.'\'');
$provjera=mysql_num_rows($server);

if($provjera=="1"){
	
$server_info = mysql_fetch_array($server);
	
$server_mod = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info["mod"].'\''));

$server_box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info["box_id"].'\''));



$smarty->assign('server_info', $server_info); 		




$ftp_server = "$server_info[ip]";
$ftp_port = "$server_box[ftp_port]";

$path = "$_GET[path]";

$conn_id = ftp_connect($ftp_server, $ftp_port) or $smarty->assign('error', "Ne mogu se konektovati na ftp"); 	

$ftp_path = substr("$path", 1);
$breadcrumbs = split('/', $ftp_path);
if(($bsize = sizeof($breadcrumbs))>0) {
  	$sofar = '';
  	for($bi=0;$bi<$bsize;$bi++) {
	$sofar = $sofar . $breadcrumbs[$bi] . '/';

$ftp_pth .= '
<div class="ftp_arrow" style="margin-left: 0px; margin-top: 4px;">
<img src="template/images/ftp_arrow.png" border="0" />
</div>

<div class="ftp_path_folder" style="margin-top: -4px;">
<a href="main.php?page=ftp&id='.$id.'&path=/'.$sofar.'">'.$breadcrumbs[$bi].'</a>
</div> ';
	}
}

$smarty->assign('ftp_path', $ftp_pth);





if (ftp_login($conn_id, $server_info["username"], $server_info["password"]))
{
	
        ftp_chdir($conn_id, $path);
        
        
        
if($_POST["upload_file"]){   
	
	
$fajl = $_FILES["file"]["tmp_name"];	
$ime_fajla = $_FILES["file"]["name"];
$putanja_na_serveru = ''.$path.'/'.$ime_fajla.'';


if (ftp_put($conn_id, $putanja_na_serveru, $fajl, FTP_BINARY)) {
$smarty->assign('message', "Fajl je uspješno uploadovan.");
} else {
$smarty->assign('message', "Dogodio se problem prilikom uploada fajla.");
}     
	
	
}

if($_POST["folder_name"]){
$dir = $_POST["folder_name"];
if (ftp_mkdir($conn_id, $dir)) {
 $smarty->assign('message', "Folder je uspješno kreiran.");
} else {
 $smarty->assign('message', "Dogodio se problem prilikom kreiranja foldera.");
}	

}

if($_GET["delete"]=="file"){
$file = ''.$_GET["path"].''.$_GET["file"].'';	
if (ftp_delete($conn_id, $file)) {
 $smarty->assign('message', "Fajl uspješno izbrisan.");

} else {
 $smarty->assign('message', "Ne mogu izbrisati fajl.");
}	
}

function ftp_delAll($conn_id,$dst_dir){
  $ar_files = ftp_nlist($conn_id, $dst_dir);
  if (is_array($ar_files)){ 
      for ($i=0;$i<sizeof($ar_files);$i++){ 
          $st_file = basename($ar_files[$i]);
          if($st_file == '.' || $st_file == '..') continue;
          if (ftp_size($conn_id, $dst_dir.'/'.$st_file) == -1){ 
              ftp_delAll($conn_id,  $dst_dir.'/'.$st_file); 
          } else {
              ftp_delete($conn_id,  $dst_dir.'/'.$st_file);
          }
      }
      sleep(1);
      ob_flush() ;
  }
  if(ftp_rmdir($conn_id, $dst_dir)){
  return "true";
  }
}


if($_GET["delete"]=="folder"){
$dirf =	''.$_GET["path"].''.$_GET["folder"].'';	
if(ftp_delAll($conn_id,$dirf)){
$smarty->assign('message', "Folder je uspješno izbrisan");
} else {
$smarty->assign('message', "Ne mogu izbrisati folder.");
}	
}
        
        

        $ftp_contents = ftp_rawlist($conn_id, $path);
        $i = "0";
        foreach ($ftp_contents as $folder)
        {
        $broj = $i++;	
        $current = preg_split("/[\s]+/",$folder,9);

        $isdir = ftp_size($conn_id, $current[8]);
        if($isdir=='-1'){
        $ftp_dir[]=$current;
        } else {
        	
        $ext = explode(".", $current[8]);
        if($ext[1]=="txt" || $ext[1]=="log" || $ext[1]=="cfg" || $ext[1]=="ini"){
           $current[9] = $ext[1];     	
        }
        
        $ftp_fajl[]=$current;
        
	
        }
        
        
        
        }
                
        
        $smarty->assign('ftp_fajlovi', $ftp_fajl);
        $smarty->assign('ftp_folderi', $ftp_dir);
        

        $old_path = ''.$_GET["path"].'/';
        $old_path = str_replace('//', '/', $old_path);
        
        $smarty->assign('old_path', $old_path);
             
        

        
        
        
        
}else {
$smarty->assign('error', "Netačni username i lozinka"); 		
}




} else {
$smarty->assign('error', "NPS"); 
};

	
$smarty->display('ftpp.tpl');	
}





// WEB FTP FILE

if($_GET["page"]=="ftp_file" && $_GET["id"] && $_GET["path"]){

$id = $_GET["id"];	
$id = stripslashes($id);
$id = mysql_real_escape_string($id);
$smarty->assign('id', $id);	

$serverr_query = mysql_query('SELECT * FROM serveri WHERE serveri.id=\''.$id.'\'');
$serverr_rows = mysql_num_rows($serverr_query);

if($serverr_rows > 0)
{
	while($serverr_row = mysql_fetch_assoc($serverr_query))
	{
		$id_test = $serverr_row['user_id'];
	}
}


$server = mysql_query('SELECT * FROM serveri, ip WHERE ip.id=serveri.ip_id AND serveri.id=\''.$id.'\' and serveri.user_id=\''.$id_test.'\'');
$provjera=mysql_num_rows($server);

if($provjera=="1"){

$server_info = mysql_fetch_array($server);
	
$server_mod = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info["mod"].'\''));

$server_igra = mysql_fetch_array(mysql_query('SELECT * FROM modovi WHERE id=\''.$server_info["mod"].'\''));

$server_box = mysql_fetch_array(mysql_query('SELECT * FROM box WHERE id=\''.$server_info["box_id"].'\''));



$smarty->assign('server_info', $server_info); 		




$ftp_server = "$server_info[ip]";
$ftp_port = "$server_box[ftp_port]";

$path = "$_GET[path]";

$conn_id = ftp_connect($ftp_server, $ftp_port) or $smarty->assign('error', "Ne mogu se konektovati na ftp"); 	

$ftp_path = substr("$path", 1);
$breadcrumbs = split('/', $ftp_path);
if(($bsize = sizeof($breadcrumbs))>0) {
  	$sofar = '';
  	for($bi=0;$bi<$bsize;$bi++) {
	$sofar = $sofar . $breadcrumbs[$bi] . '/';

$ftp_pth .= '
<div class="ftp_arrow">
<img src="template/images/ftp_arrow.png" border="0" />
</div>

<div class="ftp_path_folder">
<a href="main.php?page=ftp&id='.$id.'&path=/'.$sofar.'">'.$breadcrumbs[$bi].'</a>
</div> ';
	}
}

$smarty->assign('ftpp_path', $ftp_pth);	
	
if (ftp_login($conn_id, $server_info["username"], $server_info["password"]))
{
	
        ftp_chdir($conn_id, $path);

/* FTP FILE START */



if ($_POST["new_file"]) {
	
$newdata = $_POST['new_file'];
$fajov = $_GET["file"];
$folder = 'cache/other_c/ftp/ftp_papy_gpanel_'.$server_info["username"].'_'.$fajov.'';

$fw = fopen(''.$folder.'', 'w+') or $smarty->assign('message', "Ne mogu otvoriti fajl");
$fb = fwrite($fw,stripslashes($newdata)) or $smarty->assign('message', "Ne mogu spremiti fajl");
$file = "$fajov";
$remote_file = ''.$_GET["path"].'/'.$fajov.'';
if (ftp_put($conn_id, $remote_file, $folder, FTP_BINARY)) {
 $smarty->assign('message', "Fajl je uspješno spremljen.");
} else {
 $smarty->assign('message', "Dogodila se greška prilikom spremanja fajla.");
}

unlink($folder);

} 


/*$filename = "ftp://$server_info[username]:$server_info[password]@$ftp_server:$ftp_port.$_GET[path]/$_GET[file]";
$handle = fopen($filename, "r") or $smarty->assign('message', "Ne mogu otvoriti fajl");
$contents = fread($handle, filesize($filename)) or $smarty->assign('message', "Ne mogu pročitati fajl");
$smarty->assign('ftp_contents', $contents);	
fclose($handle);*/

//$filename = "ftp://srv_4_1:vupuvagyj@188.40.52.207/cstrike/server.cfg";
$filename = "ftp://$server_info[username]:$server_info[password]@$ftp_server:$ftp_port".$_GET[path]."/$_GET[file]";
$contents = file_get_contents($filename);
$smarty->assign('ftpp_contents', $contents);




/* FTP FILE STOP */        
        
        $old_path = ''.$_GET["path"].'/';
        $old_path = str_replace('//', '/', $old_path);
        
        $smarty->assign('old_path', $old_path);     
        $smarty->assign('file', $_GET["file"]);        


}else {
$smarty->assign('error', "Netačni username i lozinka"); 		
}	
	
} else {
$smarty->assign('error', "Nemam pristup serveru"); 	
};	
$smarty->display('ftpp_file.tpl');	
}

// MASS EMAIL


if($_GET["page"]=="email" && $_GET["akcija"]=="napisi" && $_SESSION["admin"]=="admin"){    
    
if($_POST["mass_email"]){
    
    if($_POST["korisnici"]){
    
        if($_POST["naslov"]){
  
            if($_POST["text"]){
                 
            $korisnici = htmlspecialchars($_POST["korisnici"]);
			$naslov = htmlspecialchars($_POST["naslov"]);
            $text = htmlspecialchars($_POST["text"]);
            
			// MAIL
			$to = ''. $korisnici. '';
			$subject = ''. $naslov. '';
			$message = ''. $text. '';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: serveri@your.net your Hosting' . "\r\n";

			$mail = mail($to,$subject,$message,$headers);

			if($mail) {			
 			$message = '<div class="notif success bloc">
						Uspesno ste poslali e-mail!
						<a class="close" href="#"></a>
						</div>';
			$smarty->assign('message', $message);  
			                
            } else {
          	$message = '<div class="notif error bloc">
						Dogodila se greska!
                    	<a class="close" href="#"></a>
                   		</div>';
        	$smarty->assign('message', $message);                
            }
                
            } else {
        	$message = '<div class="notif error bloc">
						Niste upisali text.
						<a class="close" href="#"></a>
						</div>';
        	$smarty->assign('message', $message);                  
            }
            
        	} else {
        	$message = '<div class="notif error bloc">
						Unesite naslov poruke!
						<a class="close" href="#"></a>
						</div>';
        	$smarty->assign('message', $message);              
        	}
        
    		} else {
        	$message = '<div class="notif error bloc">
						Morate upisati e-mail nekog korisnika kome cete slati e-mail!
						<a class="close" href="#"></a>
					   </div>';
        	$smarty->assign('message', $message);          
    
    }
}
$massemail = mysql_query("SELECT * FROM clients");	
while($row = mysql_fetch_row($massemail))
{
	$row['email'] = $emails;
} 
$smarty->assign('korisnici', $emails); 
 
$smarty->display('mass_email.tpl');
}

}
// MASS EMAIL

?>