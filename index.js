const loadBtn = document.querySelector('.load-more-btn');
const cardsList = document.querySelector('.cards-list');
const spinner = document.querySelector('.spinner');

let fragment = document.createDocumentFragment();

let page = 2;
let perPage = 4;
let items = [];
let amountLoadedItems = 4;
let total = 0;

const createCardElement = (item) => {
	const liEl = document.createElement('li');
	liEl.classList.add('card');
	//	liEl.classList.add('temp');
	const linkEl = document.createElement('a');
	linkEl.setAttribute('href', '#');
	liEl.appendChild(linkEl);

	const divEl = document.createElement('div');
	divEl.classList.add('card-image');
	liEl.appendChild(divEl);

	const imgEl = document.createElement('img');
	imgEl.setAttribute('src', item.img);
	imgEl.setAttribute('alt', item.description);
	divEl.appendChild(imgEl);

	if (item.discountCost) {
		const saleEl = document.createElement('div');
		saleEl.classList.add('sale');
		saleEl.textContent = 'Sale';
		divEl.appendChild(saleEl);
	}

	if (item.new) {
		const newEl = document.createElement('div');
		newEl.classList.add('new');
		newEl.textContent = 'New';
		divEl.appendChild(newEl);
	}

	/*details  block*/
	const detailsEl = document.createElement('div');
	detailsEl.classList.add('details');
	liEl.appendChild(detailsEl);

	const detailsLinkEl = document.createElement('a');
	detailsLinkEl.setAttribute('href', '#');
	detailsEl.appendChild(detailsLinkEl);

	const cardTitleEl = document.createElement('div');
	cardTitleEl.classList.add('card-title');
	cardTitleEl.textContent = item.title;
	detailsLinkEl.appendChild(cardTitleEl);

	const cardDescriptionEl = document.createElement('p');
	cardDescriptionEl.classList.add('description');
	cardDescriptionEl.textContent = item.description;
	detailsLinkEl.appendChild(cardDescriptionEl);

	/*prices block*/
	const pricesEl = document.createElement('div');
	pricesEl.classList.add('prices');
	liEl.appendChild(pricesEl);

	const currentCostEl = document.createElement('span');
	currentCostEl.classList.add('current-cost');
	pricesEl.appendChild(currentCostEl);

	if (item.discountCost) {
		currentCostEl.textContent = item.discountCost;
		const oldCostEl = document.createElement('span');
		oldCostEl.classList.add('old-cost');
		currentCostEl.textContent = item.cost;
		pricesEl.appendChild(oldCostEl);
	} else {
		currentCostEl.textContent = item.cost;
	}

	/*buttons block */
	const buttonsEl = document.createElement('div');
	buttonsEl.classList.add('buttons-container');
	liEl.appendChild(buttonsEl);

	const addToCarBtntEl = document.createElement('a');
	addToCarBtntEl.setAttribute('href', '#');
	addToCarBtntEl.classList.add('add-to-cart');
	addToCarBtntEl.textContent = 'Add to cart';
	buttonsEl.appendChild(addToCarBtntEl);

	const viewBtnEl = document.createElement('a');
	viewBtnEl.setAttribute('href', '#');
	viewBtnEl.classList.add('view-card');
	viewBtnEl.textContent = 'View';
	buttonsEl.appendChild(viewBtnEl);

	return liEl;
};
const appendToList = () => {
	const fragment = document.createDocumentFragment();
	items.forEach((item) => {
		const elem = createCardElement(item);
		fragment.appendChild(elem);
	});
	spinner.style.display = 'none';
	fragment.style;
	cardsList.appendChild(fragment);
	items = [];
};

function getCards(url) {
	return fetch(url).then((r) => r.json());
}
const getMoreCards = async (pageNumber, itemsPerPage) => {
	const url = `./list.php?page=${pageNumber}&perPage=${itemsPerPage}`;
	const answer = await getCards(url);
	page++;
	perPage += 4;
	items.push(...answer.entities);
	total = answer.total;
	amountLoadedItems += answer.entities.length;
	return answer;
};

let promise = getMoreCards(page, perPage); //preload

const clickHandler = () => {
	spinner.style.display = 'block';
	if (items.length) {
		appendToList();
		if (amountLoadedItems >= total) {
			loadBtn.style.display = 'none';
		} else {
			promise = getMoreCards(page, perPage);
		}
	} else {
		promise
			.then((data) => {
				appendToList();
				if (amountLoadedItems === total) {
					loadBtn.style.display = 'none';
					return false;
				}
				return true;
			})
			.then((i) => {
				if (i) {
					promise = getMoreCards(page, perPage);
				} else {
					return;
				}
			});
	}
};

loadBtn.addEventListener('click', clickHandler);
