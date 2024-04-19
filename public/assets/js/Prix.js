export default class Marque {

    constructor(el) {
        // Recuperer les champs du formulaire
        this._el = el;
        this._elValeurPrixPaye = document.querySelector('[data-js-input="prix_paye"]');
        this._elValeurPrixVente = this._el.querySelector('[data-js-input="prix_vente"]');
        

        // Si le formulaire a déjà été soumis mais n'a pas été accepté lors de la validation, il inclura automatiquement le prix s'il a été défini précédemment
        if (this._elValeurPrixPaye.value !== '') {
            this._elValeurPrixVente.value = (this._elValeurPrixPaye.value * 1.25).toFixed(2);
        }

        // Appeler le comportement initiale
        this.init();
    }

    /**
     * Initialiser les comportements
     */
    init() {
        this._elValeurPrixPaye.addEventListener('input', function() {
            // Si le privilège de l'utilisateur n'est pas administrateur, le bouton sera désactivé
            this.disableInput();

            let prixPaye = this._elValeurPrixPaye.value;

            // Caluculer le prix de vente
            this._elValeurPrixVente.value = (prixPaye * 1.25).toFixed(2);
        
        }.bind(this));
    }
    
    /**
     * Désactiver changement de prix de vente si le privilège de la personne n'est pas administrateur
     */ 
    disableInput() {
        if (privilegeLevel !== 3) {
            this._elValeurPrixVente.readOnly = true;
        } else {
            this._elValeurPrixVente.readOnly = false;
        }
    }
}   