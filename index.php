<!DOCTYPE>
<html>
	<head>
        <title>Accueil</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	</head>
    
    <body>
        
        <article id="Bandeau">
            <div id="header" class="heading">
                <h1>
                    <ul>
                        <li><a href="index.php" style="color:white">Accueil</a></li>
                        <li><a href="trailer.html" style="color:white">Trailer</a></li>
                        <li><a href="equipe.html" style="color:white">Notre équipe</a></li>
                    </ul>
                </h1>
            </div>
        </article>	

        <div id="centre">
            
            <img id="monde" src="carte_monde_vierge_frontiere_pays_continent.png"/>
            <a href="partie/index.php?cont=1"><div id="eur" class="ronds"></div></a>
            <a href="partie/index.php?cont=3"><div id="art" class="ronds"></div></a>
            <a href="partie/index.php?cont=2"><div id="ame" class="ronds"></div></a>
            <!--<a href="#"><div class="ronds"></div></a>
            <a href="#"><div class="ronds"></div></a>-->
            
            
            
            <script>
                var milieu_fenetre = $(window).width() / 2;
                var left_carte = milieu_fenetre - (parseInt($('#monde').css('width')) / 2);
                
                $('#eur').css({marginTop: '80px'});
                $('#eur').css({left: left_carte+430});
                
                $('#art').css({marginTop: '10px'});
                $('#art').css({left: left_carte+290});
                
                $('#ame').css({marginTop: '170px'});
                $('#ame').css({left: left_carte+90});
                
            </script>
            
            <br/>
            
            
        </div>
    </body>
</html>
