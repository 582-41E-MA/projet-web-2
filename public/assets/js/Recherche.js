export default class Recherche {

    constructor(el) {
        // Recuperer les champs du formulaire
        this._el = el;
        this._elRecherche = document.getElementById('recherche');
        
        this.init();
    }
    init() {
        
        this._elRecherche.addEventListener('change', function(){
            let recherche = this._elRecherche.value;
            console.log(recherche)
            // this.rechercheEnchere(recherche);

        }.bind(this));
    }

}