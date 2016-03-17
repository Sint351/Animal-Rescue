class animal
{
    constructor(p_spritC, p_spritE, p_nom)
    {
        this.src_spritC = p_spritC;
        this.src_spritE = p_spritE;
        this.nom_an = p_nom;
    }
    
    saute()
    {
        $('#joueur').animate
        (
            {bottom: "750px"}, 400, 'swing', 
            function()
            {
                $('#joueur').animate
                ({bottom: "650px"}, 400);
            }
        );
    }
    
    esquive()
    {
        /* PROCEDURE qui charge le sprite ou le perso se baisse */
        $('#joueur').css('background-image', 'url(\''+this.src_spritE+'\')');
        $('#joueur').height(70);

        function baisse(p_src)
        {
            $('#joueur').css('background-image', 'url(\''+p_src+'\')');
            $('#joueur').height(100);
        }
        
        setTimeout(baisse, 300, this.src_spritC);
    }
    
    getNom()
    {
        /* FONCTION qui renvoie le nom de l'animal */
        return this.nom_an;
    }
}
