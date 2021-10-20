<!DOCTYPE html>
<html>
    <head>
        <title>{$config.host} - Game Panel Administracija</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

        <!-- Reset all CSS rule -->
        <link rel="stylesheet" href="template/css/reset.css" />
        
        <!-- Main stylesheed  (EDIT THIS ONE) -->
        <link rel="stylesheet" href="template/css/style.css" />

        
        <!-- jQuery AND jQueryUI -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="template/css/jqueryui/jqueryui.css" />
        
        <!-- jWysiwyg - https://github.com/akzhan/jwysiwyg/ --->
        <link rel="stylesheet" href="template/js/jwysiwyg/jquery.wysiwyg.old-school.css" />
        <script type="text/javascript" src="template/js/jwysiwyg/jquery.wysiwyg.js"></script>

        
        
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
        
        <script>
        
        function hidelabel(name){
        $('label[for='+name+']').css('display', 'none');
        }
        
        function showlabel(name){
        	if($('#'+name+'').val()==''){
        	$('label[for='+name+']').css('display', 'block');	
        	}
        }       
        
        </script>
    </head>

    <body>
                
            <div id="content" class="login">
                
                <h1><img src="img/icons/locked.png" alt="" />Game Panel Administracija</h1>
                
                {if $error}
                <div class="notif tip">
                    {$error}
                    <a href="#" class="close"></a>
                </div>
                {/if}
                <form action="" method="post">

                <div class="input placeholder">
                    <label for="login">Login</label>
                    <input type="text" onblur="showlabel('login');" onfocus="hidelabel('login');" id="login" name="login" />
                </div>
                <div class="input placeholder">
                    <label for="pass">Password</label>
                    <input type="password" onblur="showlabel('pass');" onfocus="hidelabel('pass');" id="pass" name="pass" value="" />
                </div>

                <div class="submit">
                    <input type="submit" value="Ulaz"/>
                </div>
                </form>

                
            </div>
        
        
    </body>
</html>
