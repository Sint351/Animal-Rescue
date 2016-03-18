<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
    </head>
    
    <body>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="animal.js"></script>
        <script src="continent.js"></script>
        
        <audio controls= "controls" autoplay loop > <source src="Miuzz.wav" type="audio/wav"> </audio>
        
        <div id="jeu">
            <div id="joueur"></div>
        </div>
        
        <script>
            
            var creation = initialisations(<?php echo($_GET['cont']); ?>);
            
            function initialisations(p_niveau)
            {
                switch (p_niveau)
                {
                    case 1:
                        var map = new continent('europe', 'europe/bg_europe.jpg');
                        var pers = new animal('europe/fox_c.png','europe/fox_e.png','renard');
                        break;
                    case 2:
                        var map = new continent('amerique', 'amerique/bg_amerique.jpg');
                        var pers = new animal('amerique/lama_c.png','amerique/lama_e.png','lama');
                        break;
                    case 3:
                        var map = new continent('antarctique', 'antarctique/bg_antarctique.jgp');
                        var pers = new animal('antarctique/ping_c.png','antarctique/ping_e.png','pingouin');
                        break;
                }
                return [map, pers];
            }
            
            

            /* C O L L I S I O N */

            function collision()
            {
                var l_perso = parseInt($('#joueur').css('left')); // stocke l'abssice du peso
                var w_perso = parseInt($('#joueur').css('width'))-4; // stocke la largeure du perso
                
                var t_perso = parseInt($('#joueur').css('top')); // stocke l'ordonée du perso
                var h_perso = parseInt($('#joueur').css('height')); // stocke la hauteur du perso

                for (n in liste_p) // pour autant de n qu'il y a d'aobstacles
                {
                    var l_obst = parseInt($('#obst'+n).css('left')); // stocke l'abssice de l'obstacle
                    var w_obst = parseInt($('#obst'+n).css('width')); // stocke la largeur de l'obstacle
                    
                    var t_obst = parseInt($('#obst'+n).css('top')); // stocke l'ordonée de l'obstacle
                    var h_obst = parseInt($('#obst'+n).css('height')); // stocke la hauteur de l'obstacle
                    
                    if ( ((l_perso+w_perso>l_obst) && (l_perso<l_obst)) || ((l_perso>l_obst) && (l_perso<l_obst+w_obst))) // si le perso arrive a l'abssice d'un obstacle
                    {
                        if ( ((t_perso+h_perso>t_obst) && (t_perso<t_obst)) || ((t_perso>t_obst) && (t_perso<t_obst+h_obst))) // si le perso arrive a l'ordonée d'un obstacle
                        {
                            gameOver(); // lance le "game over"
                            break;
                        }
                    }
                }
            }


            /* F I N    J E U */
            
            function win()
            {
                if (parseInt($('#fond').css('left')) === -3500)
                {
                    document.location.href="../";
                }
            }
            
            
            function gameOver()
            {
                document.location.href="../game_over/index.php?cont="+<?php echo($_GET['cont']); ?>;
            }
            
            

            
            
            /* M A P */
            
            var map = creation[0]; // initialise le contient
            
            var bg = map.getSrc(); // source du background
            $('#jeu').after('<img id="fond" src="'+ bg +'"/>'); // place le fond
            $('#fond').animate( {left: '-=4000'}, 15000, 'linear' ); // fait avancer le fond



            /* E C R A N S */
            
            var hauteur_fenetre = $(window).height(); // stocke la hauteur de la fenetre client
            var haut = (hauteur_fenetre / 2) - ($('#fond').height() / 2); // calcule la hauteur du centre
            
            $('#fond').css({top: haut}); // centre le background
            $('#joueur').css({bottom: haut+70}); // centre le joueur

            
            
            /* O B S T A C L E */
            
            map.generationObst([1000, 2000, 3000, 4000], [0,1,1,0]); // genere les obstacles
            var liste_p = map.getListePlaceObst(); // liste de l'abssice des obstacles
            var liste_t = map.getListeTypeObst(); // liste du type des obstacle (haut / bas)
            
            for (n in liste_p)
            {
                $('#jeu').after('<div class="obstacle" id="obst'+n+'"></div>'); // crée l'obstacle
                $('#obst'+n).css('left', liste_p[n]+'px'); // place l'obstacle en abssice
                $('#obst'+n).css({bottom: haut+70}); // place l'obstacle "bas" en ordonée
                                
                if (liste_t[n] === 1)
                {
                    $('#obst'+n).css({bottom: haut+70+70}); // place l'obstacle "haut" en ordonée
                }
            }

            $('.obstacle').animate( {left: '-=4000'}, 15000, 'linear'); // fait bouger les obstacles vers la gauche

            
            
            /* P E R S O */
            
            var perso = creation[1]; // initialise le personnage
            
            $('#joueur').css('background-image', 'url(\''+perso.getSrc_course()+'\')');
            
            $(document).keydown(function(touche) // quand une touche est préssée
            {
                if (touche.which == 38) // si c'est la touche du haut
                {
                    perso.saute(); // fait sauter le perso
                }
                if (touche.which == 40) // si c'est la touche du bas
                {
                    perso.esquive(); // le fais se baisser
                }
            });
            
            
            setInterval(collision, 40);
            setInterval(win, 1000);
            
        </script>
    </body>
</html>
