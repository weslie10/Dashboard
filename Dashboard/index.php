<?php
include "header.php";
?>

<section id="main-content">
	<div class="cards">
		<div class="card">
			<span class="center">Corona Virus</span>
		</div>
	</div>
	<div class="cards">
		<div class="card">
			<span class="card-title">Confirmed</span>
			<span class="number"></span>
			<span class="card-description"></span>
		</div>
		<div class="card">
			<span class="card-title">Recovered</span>
			<span class="number"></span>
			<span class="card-description"></span>
		</div>
		<div class="card">
			<span class="card-title">Deaths</span>
			<span class="number"></span>
			<span class="card-description"></span>
		</div>
		<div class="card">
			<span class="card-title">Indonesia</span>
			<span class="card-description"></span>
		</div>
	</div>
	<div class="cards">
		<div class="card">
			<canvas id="myChart" width="800" height="400"></canvas>
		</div>
	</div>
	<div class="cards">
		<div class="card">
			<span class="center">Corona Virus in Indonesia (Province) </span>
		</div>
	</div>
	<div class="indo"></div>
	<!-- <div class="cards">
		<div class="card">1</div>
		<div class="card">2</div>
	</div> -->
</section>

<!-- For Chart JS -->
<link rel="stylesheet" type="text/css" href="chartjs/dist/Chart.min.css" />
<script src="chartjs/dist/Chart.js"></script>

<script>
	//API
	const center = document.getElementsByClassName('center');
	const printDash = (n) => {
		let temp = '';
		for (let i = 0; i < n; i++) temp += '-';
		return temp;
	};
	for (let i = 0; i < center.length; i++) {
		const dash = 60 - center[i].textContent.length;
		center[i].textContent = `${printDash(dash / 2)} ${
			center[i].textContent
		} ${printDash(dash / 2)}`;
	}

	/* Get Url API using cors */
	const cors = 'https://cors-anywhere.herokuapp.com/';
	const uri = cors + 'https://api.kawalcorona.com/';

	/* fetch api for global */
	const ket = ['positif', 'sembuh', 'meninggal'];
	for (let i = 0; i < ket.length; i++) {
		const number = document.getElementsByClassName('number')[i];
		const desc = document.getElementsByClassName('card-description')[i];
		fetch(uri + ket[i])
			.then((res) => {
				return res.json();
			})
			.then((data) => {
				number.textContent = data.value;
				desc.textContent = 'People';
			})
			.catch((err) => console.log(err));
	}

	/* fetch api for indonesia */
	const desc = document.getElementsByClassName('card-description')[3];
	fetch(uri + 'indonesia')
		.then((res) => {
			return res.json();
		})
		.then((data) => {
			desc.innerHTML = `<span class="bigger">${data[0].positif}</span> Positif, 
			<span class="bigger">${data[0].sembuh}</span> Sembuh, 
			<span class="bigger">${data[0].meninggal}</span> Meninggal`;
		})
		.catch((err) => console.log(err));

	/* fetch api for indonesia province */
	fetch(uri + 'indonesia/provinsi/')
		.then((res) => {
			return res.json();
		})
		.then((data) => {
			const indo = document.getElementsByClassName('indo')[0];
			for (let i = 0; i < data.length; i++) {
				const div = document.createElement('DIV');
				div.classList.add('card');

				const city = document.createElement('span');
				city.classList.add('card-title');
				city.textContent = data[i].attributes.Provinsi;

				const positif = document.createElement('span');
				positif.classList.add('card-description');
				positif.textContent = `Positive: ${data[i].attributes.Kasus_Posi} people`;

				const sembuh = document.createElement('span');
				sembuh.classList.add('card-description');
				sembuh.textContent = `Recovered: ${data[i].attributes.Kasus_Semb} people`;

				const meninggal = document.createElement('span');
				meninggal.classList.add('card-description');
				meninggal.textContent = `Deaths: ${data[i].attributes.Kasus_Meni} people`;

				div.appendChild(city);
				div.appendChild(positif);
				div.appendChild(sembuh);
				div.appendChild(meninggal);
				indo.appendChild(div);
			}
		})
		.catch((err) => console.log(err));

	/* fetch API for global Chart JS */
	var global = [];
	fetch(uri)
		.then((res) => {
			return res.json();
		})
		.then((data) => {
			for (let i = 0; i < data.length; i++)
				global.push({
					Country: data[i].attributes.Country_Region,
					Confirmed: data[i].attributes.Confirmed,
					Recovered: data[i].attributes.Recovered,
					Deaths: data[i].attributes.Deaths,
				});
			makeChart();
		})
		.catch((err) => console.log(err));

	const makeChart = () => {
		const labels = [],
			data = [],
			backgroundColor = [],
			borderColor = [];
		for (let i = global.length - 82; i >= 0; i--) {
			labels.push(global[i].Country);
			data.push(global[i].Confirmed);
			if (i % 5 == 0 && i != 100) {
				backgroundColor.push(
					'rgba(255, 99, 132, 0.5)',
					'rgba(54, 162, 235, 0.5)',
					'rgba(255, 206, 86, 0.5)',
					'rgba(75, 192, 192, 0.5)',
					'rgba(153, 102, 255, 0.5)',
				);
				borderColor.push(
					'rgba(255, 99, 132, 0.5)',
					'rgba(54, 162, 235, 0.5)',
					'rgba(255, 206, 86, 0.5)',
					'rgba(75, 192, 192, 0.5)',
					'rgba(153, 102, 255, 0.5)',
				);
			}
		}

		//Chart JS
		Chart.platform.disableCSSInjection = true;
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				// labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
				labels,
				datasets: [
					{
						label: '# of Positive',
						// data: [12, 19, 3, 5, 2, 3],
						data,
						borderColor,
						backgroundColor,
						borderWidth: 1,
					},
				],
			},
			options: {
				title: {
					display: true,
					text: 'Positive Corona in the World',
					fontSize: '16',
				},
				scales: {
					yAxes: [
						{
							type: 'logarithmic',
							ticks: {
								beginAtZero: true,
								padding: 30,
							},
						},
					],
				},
			},
		});
	};
</script>

<?php
include "footer.php";
?>
