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
        /* realise le saut du perso */
        
        $('#joueur').animate // fais monter le perso
        (
            {bottom: "+=100px"}, 1000, 'swing', 
            function() // fais redessendre le perso
            {
                $('#joueur').animate
                ({bottom: "-=100px"}, 1000);
            }
        );
    }

    esquive()
    {
        /* realise le mouvement d'esquive du perso */

        $('#joueur').css('background-image', 'url(\''+this.src_spritE+'\')'); // charge la source du sprite d'esquive
        $('#joueur').height(70); // baisse la hauteur du perso

        function releve(p_src) // permet au perso de se relever
        {
            $('#joueur').css('background-image', 'url(\''+p_src+'\')');
            $('#joueur').height(100);
        }
        setTimeout(releve, 1000, this.src_spritC); // appel la fonction de releve apres 400ms
    }
    
    getSrc_course()
    {
        return this.src_spritC;
    }

    getNom()
    {
        /* renvoie le nom de l'animal */
        return this.nom_an;
    }
}
