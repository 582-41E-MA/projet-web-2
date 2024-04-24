export default class Recherche {

    constructor(el) {

        this._el = el;
        this._elRecherche = document.getElementById('recherche');

        this._elTemplateVoiture = document.querySelector('[data-template-voiture]');
        this._elVoitures = document.querySelector('[data-js-catalogue]');
        this._elsCheckbox = document.querySelectorAll('input[type=checkbox]');

        
        const params = new URLSearchParams(window.location.search);
        const marque = params.get('marque');
    
        if (marque) {
            this.rechercheVoiture(marque);
        } else {
            
            this.rechercheVoiture('');
        }

        this.init();
    }

    init() {
    
        this._elRecherche.addEventListener('change', () => {
            let recherche = this._elRecherche.value;
            this.rechercheVoiture(recherche);
            this.supprimeFiltre();

            
            this.actualiserURL(recherche);
        });
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

        let host = window.location.host;
    
        this._elVoitures.innerHTML = '';

        fetch(`http://${host}/requetes/requeteAsync.php`, oOptions)
            .then(response => {
                if (!response.ok) {
                    throw new Error('La reponse n\'est pas ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.length === 0) {
                    if(currentLocale == "fr"){
                        this._elVoitures.innerHTML = `<p class="message"> Il n'y a pas de résultats pour '${propriete}'</p>`;
                    } else {
                        this._elVoitures.innerHTML = `<p class="message"">There are no results for '${propriete}'</p>`;
                    }
                } else {
                    const template = document.querySelector('[data-template-voiture]');

                    // contrôler les véhicules déjà imprimés
                    const vehiculesImpresses = {}; 
    
                    for (let i = 0; i < data.length; i++) {
                        const voitureData = data[i];

                        console.log(voitureData);

                        // Vérifiez si la voiture a déjà été ajoutée
                        if (!vehiculesImpresses[voitureData.id]) { 

                            // Identifiez la voiture comme ajoutée
                            vehiculesImpresses[voitureData.id] = true; 
                            const voitureTemplate = template.content.cloneNode(true);
                            const carDetail = voitureTemplate.querySelector('.car-detail');
                            const carImage = voitureTemplate.querySelector('.car-image img');
                            const carPrix = voitureTemplate.querySelector('.p_text_prix');
                            const carBtn = voitureTemplate.querySelector('.car-btn');
                            
                            carImage.src = `http://${host}/assets/img/voitures/${voitureData.photo_nom}`;
                            carDetail.querySelector('a').href = `http://${host}/voiture/${voitureData.id}`;

                            carDetail.querySelector('h2').textContent = `${voitureData.marque_nom} ${voitureData.modele_nom} ${voitureData.annee_valor}`;

                            let tractionData = JSON.parse(voitureData.traction_nom);
                            carDetail.querySelectorAll('span')[0].textContent += `${currentLocale !== 'en' ? tractionData.fr : tractionData.en}`;

                            let transmissionData = JSON.parse(voitureData.transmission_nom);
                            carDetail.querySelectorAll('span')[1].textContent += `${currentLocale !== 'en' ? transmissionData.fr : transmissionData.en}`;

                            let carburantData = JSON.parse(voitureData.carburant_nom);
                            carDetail.querySelectorAll('span')[2].textContent += `${currentLocale !== 'en' ? carburantData.fr : carburantData.en}`;
                            
                            carPrix.textContent = voitureData.prix_vente;
                            carBtn.href = `http://${host}/voiture/${voitureData.id}`;
                            
                            this._elVoitures.appendChild(voitureTemplate);
                          
                            
                        }
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    actualiserURL(recherche) {
     
        if (recherche.includes('%')) {
            
            recherche = decodeURIComponent(recherche);
        }
        
        let url = new URL(window.location.href);
        url.searchParams.set('marque', recherche);
       
        window.history.replaceState({}, '', url);
    }
    

    supprimeFiltre() {
    {
        for (let i = 0, l = this._elsCheckbox.length; i < l; i++) 
        {
            if (this._elsCheckbox[i].checked) 
            {
                this._elsCheckbox[i].checked = false;
            }
        }
    }
        
}
}
