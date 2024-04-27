export default class Expedition {
    #_el;
    #_elChampSelect;
    #_elChampSelectionne;
    #_elPrixTotal;
    #_elExpeditionTax;

    constructor(el) {
        // Recuperer les champs du formulaire
        this.#_el = el;
        this.#_elChampSelect = this.#_el.querySelector('[data-js-select]');
        this.#_elChampSelectionne = this.#_elChampSelect.options[this.#_elChampSelect.selectedIndex];
        this.#_elPrixTotal = document.querySelector('[data-js-input="prix"]');
        this.#_elExpeditionTax = document.querySelector('[data-js-input="expedition_tax"]');
        this._elUserId = user_id;

        // Appeler le comportement initiale
        this.#init();
    }

    /**
     * Initialiser les comportements
     */
    #init() {
        this.#_elChampSelect.addEventListener('change', function() {

            let elExpedition = this.#_elChampSelect.options[this.#_elChampSelect.selectedIndex];
            let elExpeditionId = elExpedition.dataset.jsExpedition;

            this.#_elPrixTotal.value = '';
            this.#_elExpeditionTax.value = '';

            // Appeler le comportement de mis a jour les informations
            this.#updateInfos(elExpeditionId);
        }.bind(this));
    }

    /**
     * 
     * @param {*} provence_id
     * @param {*} valeurSansTaxes
     * @param {*} valeurLivraison
     * Calculer les montants des impôts et taxes selon le choix d'expédition de l'utilisateur
     */
    requeteAsync(provence_id, valeurSansTaxes, valeurLivraison) {
        let taxFederal = document.querySelector('[data-js-input="federal_tax"]');
        let taxProvincial = document.querySelector('[data-js-input="provincial_tax"]');
        let prixFinale = document.querySelector('[data-js-input="prix_finale"]');

        // Effacer les champs s'ils contiennent déjà une valeur
        taxFederal.value = '';
        taxProvincial.value = '';
        prixFinale.value = '';

        let oOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({provence_id: provence_id, action: 'affichageTaxProvince'})
        }

        fetch('/requetes/requeteAsync.php', oOptions)
            .then(function(response) {
                if(response.ok) return response.json();
                else throw new Error('La réponse n\'est pas OK');
            })
            .then(function(data) {
                let valeurTaxFederal = 0;
                let valeurTaxProvincial = 0;
                let infos = document.querySelector('[data-js-infos]');
                let dom = infos.innerHTML;
                console.log(infos);

                for (let i = 0, l = data.length; i < l; i++) {
                    // 3.1. Ajuster la taxe fédérale
                    if (data[i]['nom'] == 'GST/HST') {
                        taxFederal.value = data[i]['valeur'];
                        valeurTaxFederal = (data[i]['valeur'] / 100) * valeurSansTaxes;
            
                        // Envoyer tax id comme input hidden 
                        dom += `<input type="hidden" name="federal_tax_id" value="${data[i]['id']}">`;
                    // 3.2. Ajuster la taxe provinciale
                    } else {
                        taxProvincial.value = data[i]['valeur'];
                        valeurTaxProvincial = (data[i]['valeur'] / 100) * valeurSansTaxes;

                        // Envoyer tax id comme input hidden
                        dom += `<input type="hidden" name="provincial_tax_id" value="${data[i]['id']}">`;
                    }
                }

                // 4. Calculer le prix finale avec les taxes
                let valeurFinale = (valeurSansTaxes + valeurTaxFederal + valeurTaxProvincial + valeurLivraison).toFixed(2);
                prixFinale.value = valeurFinale;

                infos.innerHTML = dom;
            })
    }

    /**
     * 
     * @param {*} expedition
     * Gestion du champ expedition
     */
    #updateInfos(expedition) {
        let elPrix = document.querySelectorAll('[data-js-prix]');

        let valeurTotal = 0;

        for (let i = 0, l = elPrix.length; i < l; i++) {
            let elPrixValeur = parseInt(elPrix[i].dataset.jsPrix);
            valeurTotal += elPrixValeur;
        }

        if (expedition == 1) {
            // 1. Ajuster le prix - livraison
            this.#_elPrixTotal.value = valeurTotal;

            // 2. Ajuster les frais de livraison
            let valeurLivraison = 1000;
            this.#_elExpeditionTax.value = valeurLivraison;

            let valeurSansTaxes = valeurTotal;

            // 3. Ajuster les taxes de la commande
            let provence_id = provence_user_id;

            // Appel fonction async
            this.requeteAsync(provence_id, valeurSansTaxes, valeurLivraison);

        } else if (expedition == 2) {
            // 1. Ajuster le prix - pick up
            this.#_elPrixTotal.value = valeurTotal;

            // 2. Ajuster les frais de livraison
            let valeurLivraison = 0;
            this.#_elExpeditionTax.value = valeurLivraison;

            let valeurSansTaxes = valeurTotal;

            // 3. Ajuster les taxes de la commande
            let provence_id = 9;

            // Appel fonction async
            this.requeteAsync(provence_id, valeurSansTaxes, valeurLivraison);
        } else {
            console.log('none');
        }
    }
}