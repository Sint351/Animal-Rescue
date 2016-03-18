class continent
{
    constructor(p_nom, p_sprit)
    {
        this.nom_cont = p_nom;
        this.src_sprit = p_sprit;
        this.listePlaceObst = [];
        this.listeTypeObst = [];
    }
    
    generationObst(p_place, p_type)
    {
        /* genere le listes stockant les obstacles */
        this.listePlaceObst = p_place;
        this.listeTypeObst = p_type;
    }

    getListePlaceObst()
    {
        /* renvoie la liste stockant les emplacement des obstacles */
        return this.listePlaceObst;
    }
    
    getListeTypeObst()
    {
        /* renvoie la liste stockant le type des obstacles */
        return this.listeTypeObst;
    }
        
    getSrc()
    {
        /* renvoie la source du background */
        return this.src_sprit;
    }
    
    getNom()
    {
        /* renvoie le nom du contient */
        return this.nom_cont;
    }
}
