<!DOCTYPE html>
<html>
    <head>
        <title>Game Panel Administracija</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Reset all CSS rule -->
        <link rel="stylesheet" href="template/css/reset.css" />
        
        <!-- Main stylesheed  (EDIT THIS ONE) -->
        <link rel="stylesheet" href="template/css/style.css" />

        
        <!-- jQuery AND jQueryUI -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="template/css/jqueryui/jqueryui.css" />
        
        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ -->
        <link rel="stylesheet" href="template/js/jwysiwyg/jquery.wysiwyg.old-school.css" />
        <script type="text/javascript" src="template/js/jwysiwyg/jquery.wysiwyg.js"></script>
		
		<script type="text/javascript" src="template/js/your.js"></script>

        
        
        <!-- Tooltipsy - http://tooltipsy.com/ -->
        <script type="text/javascript" src="template/js/tooltipsy.min.js"></script>
        
        <!-- iPhone checkboxes - http://awardwinningfjords.com/2009/06/16/iphone-style-checkboxes.html -->
        <script type="text/javascript" src="template/js/iphone-style-checkboxes.js"></script>
        <script type="text/javascript" src="template/js/excanvas.js"></script>
        
        <!-- Load zoombox (lightbox effect) - http://www.grafikart.fr/zoombox -->
        <script type="text/javascript" src="template/js/zoombox/zoombox.js"></script>

        <link rel="stylesheet" href="template/js/zoombox/zoombox.css" />
        
        <!-- Charts - http://www.filamentgroup.com/lab/update_to_jquery_visualize_accessible_charts_with_html5_from_designing_with/ -->
        <script type="text/javascript" src="template/js/visualize.jQuery.js"></script>
        
        <!-- Uniform - http://uniformjs.com/ -->
        <script type="text/javascript" src="template/js/jquery.uniform.min.js"></script>
        {$script}
    </head>

    <body class="white" onload="Refresh()">
    
        
        
        <!--              
                HEAD
                        --> 
        <div id="head">
            <div class="left">
                <a href="admin.php?page=profile" class="button profile"><img src="template/img/icons/huser.png" alt="" /></a>
                Zdravo, 
                <a href="admin.php?page=profile">{$admin.fname} {$admin.lname}</a>
                |
                <a href="../logout.php?admin=yes">Logout</a>

            </div>
            <div style="float:right; margin-right: 250px;">
                <form action="" id="search" method="post" class="search placeholder">
                    <label>IP servera ?</label>
                    <input type="text" value="" name="qq" class="text"/>
                    <input type="submit" value="rechercher" class="submit"/>
                </form>
            </div>			
            <div class="right">
                <form action="" id="search" method="post" class="search placeholder">
                    <label>Email Klijenta ?</label>
                    <input type="text" value="" name="q" class="text"/>
                    <input type="submit" value="rechercher" class="submit"/>
                </form>
            </div>
        </div>
                
                
        <!--            
                SIDEBAR
                         --> 
        <div id="sidebar">
            <ul>
                <li class="nosubmenu">
                    <a href="admin.php">
                        <img src="template/img/icons/menu/home.png" alt="" />
                        Početna
                    </a>
                </li>
                 <li><a href="#"><img src="template/img/icons/menu/client.png" alt="" /> Klijenti</a>
                    <ul>                                         
                                                <li><a href="admin.php?page=klijenti&akcija=lista">Lista Klijenata</a></li>
                                                <li><a href="admin.php?page=klijenti&akcija=dodaj">Dodaj Klijenta</a></li>
                    </ul>
                </li>               

 
<li><a href="#"><img src="template/img/icons/menu/server.png" alt="" /> Serveri</a>
                    <ul>                                         
                                                <li><a href="admin.php?page=serveri&akcija=lista">Lista Servera</a></li>
                                                <li><a href="admin.php?page=serveri&akcija=lista&istekli=1">Istekli Serveri</a></li> 
												<li><a href="admin.php?page=serveri&akcija=listaa&free=1">Free serveri</a></li> 
                                                {if $admin.status eq "admin"}<li><a href="admin.php?page=serveri&akcija=dodaj">Dodaj Server</a></li>{/if} 
                    </ul>
                </li>
 {if $admin.status eq "admin"}
                <li><a href="#"><img src="template/img/icons/menu/server.png" alt="" /> Mašine</a>
                    <ul>                                         
                                                <li><a href="admin.php?page=box&akcija=lista">Lista Mašina</a></li>
                                                <li><a href="admin.php?page=box&akcija=dodaj">Dodaj Mašinu</a></li>
                    </ul>
                </li> 
                <li><a href="#"><img src="template/img/icons/menu/mod.png" alt="" /> Modovi</a>
                    <ul>                                         
                                                <li><a href="admin.php?page=mod&akcija=lista">Lista Modova</a></li>
                                                <li><a href="admin.php?page=mod&akcija=dodaj">Dodaj Mod</a></li>
                    </ul>
                </li>   
                <li><a href="#"><img src="template/img/icons/menu/news.png" alt="" /> Obavijesti</a>
                    <ul>                                         
                                                <li><a href="admin.php?page=news&akcija=lista">Lista Obavijesti</a></li>
                                                <li><a href="admin.php?page=news&akcija=dodaj">Dodaj Obavijest</a></li>
                    </ul>
                </li>  
{/if}                 
                <li><a href="#"><img src="template/img/icons/menu/support.png" alt="" /> Podrška</a>

                    <ul>
                    	<li><a href="admin.php?page=podrska&status=Neodgovoren"><span>Neodgovoreni Tiketi</span></a></li>
                        <li><a href="admin.php?page=podrska&status=Otvoren"><span>Otvoreni Tiketi</span></a></li>
                        <li><a href="admin.php?page=podrska&status=Zatvoren"><span>Zatvoreni Tiketi</span></a></li>
                        {if $admin.status eq "admin"}
                        <li><a href="admin.php?page=dodaj_radnika"><span>Dodaj Radnika</span></a></li>
                        <li><a href="admin.php?page=lista_radnika"><span>Lista Radnika</span></a></li>
                        {/if}
                    </ul>
                </li>
            </ul>


        </div>
<div id="content" style="padding: 0; margin: 28px 40px -40px 280px;">
<br />
<div class="notiff success bloc">
	Od danas se vodi kontrola radnika, tako da ne zabušavajte i aktivirajte se u tiketima.
	<a class="close" href="#"></a>
</div>
</div>