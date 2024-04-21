import { classesMapping } from './classMapping.js';

(function() {

	let elComponents = document.querySelectorAll('[data-js-component]');

	for (let i = 0, l = elComponents.length; i < l; i++) {

		let datasetComponent = elComponents[i].dataset.jsComponent,
			elComponent = elComponents[i];

        // console.log(datasetComponent);
        // console.log(elComponent);
		for (let key in classesMapping) {
			if (datasetComponent == key) new classesMapping[datasetComponent](elComponent);
		}
	}

})();
