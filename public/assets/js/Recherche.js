export default class Recherche {

    constructor(el) {
        // Recuperer les champs du formulaire
        this._el = el;
        this._elRecherche = document.getElementById('recherche');

        this._elTemplateVoiture = document.querySelector('[data-template-voiture]');
        this._elVoitures = document.querySelector('[data-js-catalogue]');

        console.log(currentLocale)
        
        this.init();
    }
    init() {
        
        this._elRecherche.addEventListener('change', function(){

            let recherche = this._elRecherche.value;
            this.rechercheVoiture(recherche);

        }.bind(this));
    }

    rechercheVoiture(propriete) {
        let voiture = {
            action: 'rechercheVoitures',
            recherche: propriete
        };
    
        let oOptions = {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(voiture)
        };
    
        this._elVoitures.innerHTML = '';
    
        fetch('requetes/requeteAsync.php', oOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('La reponse n\'est pas ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.length === 0) {
                    if(currentLocale == "fr"){
                        
                        this._elVoitures.innerHTML = `<h2 class="ml-xl mt-lg"> Il n'y a pas de résultats pour '${propriete}'</h2>`;
                    
                    } else {
                
                        this._elVoitures.innerHTML = `<h2 class="ml-xl mt-lg">There are no results for '${propriete}'</h2>`;
                    }
                } else {
                    const template = document.querySelector('[data-template-voiture]');

                    // contrôler les véhicules déjà imprimés
                    const vehiculesImpresses = {}; 
    
                    for (let i = 0; i < data.length; i++) {
                        const voitureData = data[i];

                        // Vérifiez si la voiture a déjà été ajoutée
                        if (!vehiculesImpresses[voitureData.id]) { 

                            // Identifiez la voiture comme ajoutée
                            vehiculesImpresses[voitureData.id] = true; 
                            const voitureTemplate = template.content.cloneNode(true);
                            const carDetail = voitureTemplate.querySelector('.car-detail');
                            const carImage = voitureTemplate.querySelector('.car-image img');
                            const carPrix = voitureTemplate.querySelector('.p_text_prix');
    
                            carImage.src = `assets/img/voitures/${voitureData.photo_nom}`;
                            carDetail.querySelector('h2').textContent = `${voitureData.marque_nom} ${voitureData.modele_nom} ${voitureData.annee_valor}`;

                            let transmissionData = JSON.parse(voitureData.transmission_nom);
                            carDetail.querySelectorAll('p')[1].textContent += `${currentLocale !== 'en' ? transmissionData.fr : transmissionData.en}`;

                            let carburantData = JSON.parse(voitureData.carburant_nom);
                            carDetail.querySelectorAll('p')[2].textContent += `${currentLocale !== 'en' ? carburantData.fr : carburantData.en}`;
                            
                            carPrix.textContent = voitureData.prix_vente;
    
                            this._elVoitures.appendChild(voitureTemplate);
                        }
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
    
        
    }

