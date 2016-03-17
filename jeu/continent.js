class continent
{
    constructor(p_nom, p_sprit)
    {
        this.nom_cont = p_nom;
        this.src_sprit = p_sprit;
        this.listObst = [];
        this.listHaut = [];
    }
    
    decore()
    {
        /* PROCEDURE qui gere le déplacement du background */
        
    }
    
    generationObst()
    {
        /* FONCTION qui gere la création des obstacles */
        this.listObst = [1000, 2000, 3000];
        this.listHaut = [0, 1, 0];
        
        return this.listObst;
    }
    
    getSrc()
    {
        /* FONCTION qui renvoie la source du background */
        return this.src_sprit;
    }
    
    getNom()
    {
        /* FONCTION qui renvoie le nom du contient */
        return this.nom_cont;
    }
}
