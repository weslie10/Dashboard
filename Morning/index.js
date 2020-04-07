const down = document.getElementById('down');
const up = document.getElementById('up');
const nav = document.getElementsByClassName('nav')[0];
const path = window.location.pathname;
const page = path.split('/').pop();
const PageArray = ['index', 'about', 'contact'];

down.addEventListener('click', () => {
	window.scrollTo(0, window.innerHeight);
});

up.addEventListener('click', () => {
	window.scrollTo(0, 0);
});

//Addition
for (let i = 0; i < 5; i++) {
	const trans = document.getElementsByClassName('trans')[i];
	trans.style.top = `${i * 20}vh`;
}
window.addEventListener('scroll', () => {
	const pageTransition = document.getElementById('page-transition');
	pageTransition.style.transform = `translateY(${window.pageYOffset}px)`;
});
const movePage = index => {
	if (PageArray[index] + '.html' !== page) {
		const trans = document.getElementsByClassName('trans');
		const time = 4000;
		for (let i = 0; i < trans.length; i++) {
			trans[i].style.animation = `move-in ${4000 / 2000}s ${i /
				2}s ease-in-out forwards`;
		}
		setTimeout(() => {
			setTimeout(() => {
				//hide loader
				document.getElementsByClassName('center')[0].style.display =
					'none';
				document.getElementById('loader').style.display = 'none';
				//after animation
				location.href = `${PageArray[index]}.html`;
			}, time / 2);
			//show loader
			document.getElementsByClassName('center')[0].style.display = 'flex';
			document.getElementById('loader').style.display = 'block';
		}, time);
	}
};
if (history.length > 1) {
	const trans = document.getElementsByClassName('trans');
	for (let i = 0; i < trans.length; i++) {
		trans[i].style.animation = `move-out 2s ${i / 2}s ease-in-out forwards`;
	}
	setTimeout(() => {
		for (let i = 0; i < trans.length; i++) {
			trans[i].style.transform = 'translateX(-100vw)';
		}
	}, 4000);
} else {
	const trans = document.getElementsByClassName('trans');
	for (let i = 0; i < trans.length; i++) {
		trans[i].style.transform = 'translateX(-100vw)';
	}
}

//End of Addition

if (page === 'index.html' || page === '') {
	const backgroundCard = ['#ffe500', '#abdcfb', 'black'];
	for (let i = 0; i < 3; i++) {
		const smallCircle = document.getElementsByClassName('small-circle')[i];
		smallCircle.style.background = `${backgroundCard[i]}`;
	}
	window.addEventListener('scroll', () => {
		const shape = document.getElementsByClassName('shape')[0];
		const text = document.getElementsByClassName('text')[0];
		if (window.pageYOffset == 0) {
			up.style.animation = 'up-default 1s ease-in-out forwards';
			shape.style.removeProperty('animation');
			text.style.removeProperty('animation');
			for (let i = 0; i < 3; i++) {
				const card = document.getElementsByClassName('card')[i];
				card.style.removeProperty('animation');

				const cardText = document.getElementsByClassName('card-text')[
					i
				];
				cardText.style.opacity = '0';
			}
		} else if (window.pageYOffset <= window.innerHeight - 60)
			nav.style.background = 'transparent';
		else {
			up.style.animation = 'up-active 1s ease-in-out forwards';
			nav.style.background = 'linear-gradient(to left, green, #62CB62)';
		}

		//content1
		if (window.pageYOffset >= 400) {
			shape.style.animation = 'shadow 1s ease-in-out forwards';
			text.style.animation = 'text 1s ease-in-out forwards';
		}
		//content2
		if (window.pageYOffset >= 1100) {
			for (let i = 0; i < 3; i++) {
				const card = document.getElementsByClassName('card')[i];
				card.style.animation = `card 0.5s ease-in-out forwards ${i /
					2}s`;

				const cardText = document.getElementsByClassName('card-text')[
					i
				];
				cardText.style.opacity = '1';
			}
		}
	});
} else {
	window.addEventListener('scroll', () => {
		if (window.pageYOffset == 0) {
			up.style.animation = 'up-default 1s ease-in-out forwards';
		} else if (window.pageYOffset <= window.innerHeight - 60)
			nav.style.background = 'transparent';
		else {
			up.style.animation = 'up-active 1s ease-in-out forwards';
			nav.style.background = 'linear-gradient(to left, green, #62CB62)';
		}
	});
}
