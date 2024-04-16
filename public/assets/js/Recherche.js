export default class Recherche {

    constructor(el) {
        // Recuperer les champs du formulaire
        this._el = el;
        this._elRecherche = document.getElementById('recherche');

        this._elTemplateVoiture = document.querySelector('[data-template-voiture]');
        this._elVoitures = document.querySelector('[data-js-catalogue]');

        
        console.log("Current Locale:", currentLocale);
        
        this.init();
    }
    init() {
        
        this._elRecherche.addEventListener('change', function(){
            let recherche = this._elRecherche.value;
            console.log(recherche)
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
                    this._elVoitures.innerHTML = `<p> Il n'y a pas de résultats pour '${propriete}'</p>`;
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
                            carDetail.querySelector('h2').textContent = `${voitureData.marque_nom} ${voitureData.modele_nom}`;
                            // carDetail.querySelectorAll('p')[1].textContent += ` ${voitureData.transmission_nom}`;

                            carDetail.querySelectorAll('p')[1].textContent += ` ${voitureData.transmission_nom[currentLocale] ?? voitureData.transmission_nom['en']}`;

                            console.log('voitureData.transmission_nom:', voitureData.transmission_nom);
                            carDetail.querySelectorAll('p')[2].textContent += ` ${voitureData.carburant_nom}`;carPrix.textContent = voitureData.prix_vente;
    
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

