<?php
include "header.php";
?>
<section id="main-content">
	<div class="cards">
		<div class="card">
			<div id="full-card">
				<div id="animation-circle"></div>
			</div>
		</div>
	</div>
</section>
<script>
	const animation = document.getElementById('animation-circle');
	const makeAnimation = () => {
		for (let i = 0; i < count; i++) {
			const node = document.getElementsByClassName('ball')[i];
			const random = Math.floor(Math.random() * 80) + 1;
			node.style.width = `${random}px`;
			node.style.height = `${random}px`;
			node.style.top = `${Math.floor(Math.random() * 350)}px`;
			node.style.left = `${Math.floor(Math.random() * 800)}px`;
			node.style.backgroundColor = `rgb(${Math.floor(
				Math.random() * 250,
			)}, 
            ${Math.floor(Math.random() * 250)}, 
            ${Math.floor(Math.random() * 250)})`;
		}
	};
	const count = 40;
	for (let i = 1; i <= count; i++) {
		const node = document.createElement('DIV');
		node.classList.add('ball');
		animation.appendChild(node);
	}
	makeAnimation();
	setInterval(() => {
		makeAnimation();
	}, 500);
</script>
<?php
include "footer.php";
?>
