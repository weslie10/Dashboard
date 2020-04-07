<?php
include "header.php";
?>
<section id="main-content">
	<div class="cards">
		<div class="card">
			<div id="full-card">
				<div id="calendar"></div>
			</div>
		</div>
	</div>
</section>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		let calendarEl = document.getElementById('calendar');

		let calendar = new FullCalendar.Calendar(calendarEl, {
			plugins: ['dayGrid', 'timeGrid', 'list', 'interaction'],
		});

		calendar.on('dateClick', (info) => {
			console.log(`clicked on ${info.dateStr}`);
			// console.log(`Coordinates: ${info.jsEvent.pageX},${info.jsEvent.pageY}`);
			// console.log(`Current view: ${info.view.type}`);
			// change the day's background color just for fun
			// info.dayEl.style.backgroundColor = 'red';
		});
		calendar.render();
	});
</script>
<link href="fullcalendar/packages/core/main.css" rel="stylesheet" />
<link href="fullcalendar/packages/daygrid/main.css" rel="stylesheet" />
<script src="fullcalendar/packages/core/main.js"></script>
<script src="fullcalendar/packages/daygrid/main.js"></script>
<script src="https://unpkg.com/@fullcalendar/interaction/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/timegrid@4.4.0/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/list@4.4.0/main.min.js"></script>
<?php
include "footer.php";
?>
