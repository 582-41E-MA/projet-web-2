export default class RechercheClient {

    constructor(el) {
        // Recuperer les champs du formulaire
        this._el = el;
        this._elRechercheClient = document.getElementById('recherche');
        this._elTemplateListe = document.querySelector('[data-template-liste]');
        this._elListe = document.querySelector('[data-js-liste]');

        this.init();
    }
    init() {

        this._elRechercheClient.addEventListener('change', function(){

            let recherche = this._elRechercheClient.value;
            this.recherche(recherche);

        }.bind(this));
    }


    recherche(propriete) {
        let user = {
            action: 'rechercheClients',
            recherche: propriete
        };
    
        let oOptions = {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(user)
        };
    
        this._elListe.innerHTML = '';
    
        fetch('requetes/requeteAsync.php', oOptions)
        .then(function (reponse) {
            if (reponse.ok) return reponse.json();
            else throw new Error('La reponse n\'est pas ok');
        })
            
        .then(function (data) {
            if (data.length === 0) {
                this._elListe.innerHTML = `<p> Il n'y a pas de résultats pour '${propriete}'</p>`;
            } else {

                let contenidoHTML = '';

                contenidoHTML += `
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>Nom</th>
                                <th>Courriel</th>
                                <th class="privilege">Privilege</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">`;
        
                for (let i = 0, l = data.length; i < l; i++) {
                    let privilegeName = '';
        
                    if (data[i].privilege_id == 1) {
                        privilegeName = 'Client';
                    } else if (data[i].privilege_id == 2) {
                        privilegeName = 'Empleado';
                    } else {
                        privilegeName = 'admin';
                    }
        
                contenidoHTML += `
                    <tr>
                        <td class="nom">${data[i].nom}</td>
                        <td class="courriel">${data[i].courriel}</td>
                        <td class="privilege">${privilegeName}</td>
                        <td> 
                            <a href="/edit/user/${data[i].id}">
                                <img src="assets/img/svg/modifier.svg" alt="icone_modification">
                            </a>
                            <form method="post" action="/user/${data[i].id}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit">
                                    <img src="assets/img/svg/supprimer.svg" alt="icone_suppression">
                                </button>
                            </form>       
                        </td>
                    </tr>`;
            }
        
            contenidoHTML += `
                    </tbody>
                </table>`;
             this._elListe.innerHTML = contenidoHTML;

            }

        }.bind(this));
    }

}

