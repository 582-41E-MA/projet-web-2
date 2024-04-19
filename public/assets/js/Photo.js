export default class Photo
{
    #_el;
    #_elsThumbnail;
    #_elPhoto;
    #_urlRacine;

    constructor(el)
    {
        this.#_el = el;
        this.#_elsThumbnail = this.#_el.querySelectorAll('[data-js-thumbnail]');
        this.#_elPhoto = this.#_el.querySelector('[data-js-photo]');
        this.#_urlRacine = 'http://localhost:8000/';
        this.#init();
    }

    #init()
    {
        // Gestion d'evenement au clic sur une thumbnail d'image
        for (let i = 0, l = this.#_elsThumbnail.length; i < l; i++) 
        {  
            this.#_elsThumbnail[i].addEventListener('click', this.#afficherPhoto.bind(this),true);
        }
    }

    
    /**
     * Afficher image 
     * @param {*} evenement 
     */
    #afficherPhoto(e)
    {
        // Creer et inserer le dom de l'image 
        let nomPhoto = e.currentTarget.dataset.jsThumbnail,
            dom = `
                    <img src="${this.#_urlRacine}assets/img/voitures/${nomPhoto}" alt="${nomPhoto}">
                `;

        this.#_elPhoto.innerHTML = dom;
    }




}