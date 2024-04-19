export default class RechercheUser {

    constructor(el) {
        // Recuperer les champs du formulaire
        this._el = el;
        this._elRecherche = document.getElementById('recherche');
        console.log(this._elRecherche)

        this._elTemplateListe = document.querySelector('[data-template-liste]');
        this._elListe = document.querySelector('[data-js-liste]');

        // console.log(currentLocale)
        
        this.init();
    }
    init() {
        
        this._elRecherche.addEventListener('change', function(){

            let recherche = this._elRecherche.value;
            console.log(recherche)
            this.rechercheUser(recherche);

        }.bind(this));
    }

    rechercheUser(propriete) {
        let user = {
            action: 'rechercheUtilisateurs',
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
                console.log(data)
                if (data.length === 0) {
                    this._elListe.innerHTML = `<p> Il n'y a pas de résultats pour '${propriete}'</p>`;
                    
                } else {
                for (let i = 0, l = data.length; i < l; i++) {
                    let elCloneTemplate = this._elTemplateListe.cloneNode(true);

                    for (const cle in data[i]) {
                        let regex = new RegExp('{{' + cle + '}}');
                        elCloneTemplate.innerHTML = `<article class="item-catalogue">
                            <h2 class="titre-catalogue">${data[i].nom}</h2>
                            <form method="post" action="{{ route('user.delete', ${data[i].id}) }}">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="user_id" value="{{ ${data[i].id} }}">
                            <button type="submit">@lang('Delete')</button>
                        </form> 
        
                        </article>`;
                    }

                    let elNouvelleEncheres = document.importNode(elCloneTemplate.content, true);
                    this._elListe.appendChild(elNouvelleEncheres);
                }
            }
            }.bind(this))
            
            
    }
    
        
    }

