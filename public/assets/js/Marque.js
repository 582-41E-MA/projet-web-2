export default class Marque {

    constructor(el) {
        // Recuperer les champs du formulaire
        this._el = el;
        this._elChampSelect = this._el.querySelector('[data-js-select]');
        this._elChampSelectionne = this._elChampSelect.options[this._elChampSelect.selectedIndex];
        this._elChampSelectionneIndex = this._elChampSelectionne.dataset.jsMarque;
        
        // Si le formulaire contient des erreurs, il conservera les champs précédemment sélectionnés
        if (this._elChampSelectionneIndex != undefined) this.afficheModeles(this._elChampSelectionneIndex);
        
        this.init();
    }
    

    /**
     * Initialiser les comportements
     */
    init() {
        this._elChampSelect.addEventListener('change', function() {
            console.log('entrei no change do campo select');

            let elMarque = this._elChampSelect.options[this._elChampSelect.selectedIndex];
            let elMarqueId = elMarque.dataset.jsMarque;

            // Appel la fonction que gere l'affichage des modèles appartenant à une marque
            this.afficheModeles(elMarqueId);
        }.bind(this));
    }

    /**
     * 
     * @param {*} id marque_id
     * Afficher les modèles que la marque sélectionnée possède
     */
    afficheModeles(id) {
        fetch(`../requetes/requeteFetch.php?marqueId=${id}`)
            .then(function(response) {
                if (response.ok) return response.json();
                else throw new Error('La réponse n\'est pas OK');
            })
            .then(function(data) {
                console.log(data);
                let elModeles = document.querySelector('[data-js-modeles]');
                elModeles.innerHTML = '';
                
                let dom = `<option value="0">${translations.select_model}</option>`;

                let oldModeleId = elModeles.dataset.oldModeleId;

                data.forEach(function(modele) {
                    dom += `<option value="${modele.id}" ${oldModeleId == modele.id ? 'selected' : ''}>${modele.nom}</option>`;
                });

                //dom += `</select>`;

                elModeles.innerHTML = dom;
            })
            .catch(function(error) {
                console.log(`Il y a eu un problème avec l'opération fetch: ${error.message}`);
            });
    }
}