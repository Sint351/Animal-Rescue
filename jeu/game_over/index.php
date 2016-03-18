<!DOCTYPE html>

<html>
    <head>
        <title>GAME OVER</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    </head>
    
    <body>
        <h1>G A M E - O V E R</h1>
        <p>press space bar to retry</p>
        
        <script>
            $(document).keydown(function(touche)
            {
                if (touche.which == 32) 
                {
                    document.location.href="../partie/index.php?cont="+<?php echo($_GET['cont']); ?>;
                }
            });
        </script>
        
    </body>
</html>