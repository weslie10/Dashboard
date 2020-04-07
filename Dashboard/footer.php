</main>
	</body>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script>
		const page = ['index','table','animation','schedule','login','register'];
		const cards = document.getElementsByClassName("cards");
		//to make flexible cards
		for(let i = 0; i < cards.length; i++){
			const child = cards[i].children.length;
			cards[i].style.gridTemplateColumns = `repeat(${child},1fr)`;	
		}
		//To make active page
		let loc = location.href;
		loc = loc.replace("http://localhost/Leo/Project/Dashboard/","");
		for(let i  = 0; i < loc.length; i++)
			if(loc[i] === '.')
				loc = loc.substring(0,i);
		
		loc = loc ? loc : "index";

		const nav = document.querySelectorAll('nav a');
		page.map((data,index)=>{
			const nav = document.querySelectorAll('nav a')[index];
			if(nav.className === 'active')
				nav.classList.remove('active');
		});
		page.map((data,index)=>{
			if(data === loc)
				document.querySelectorAll('nav a')[index].classList.add('active');
		});

		//to make dropdown display
		const userButton = document.getElementsByClassName('dropdown')[0];
		userButton.addEventListener('click',()=>{
			let userContent = document.getElementsByClassName('dropdown-content')[0];
			if(userContent.style.display === "none" || getComputedStyle(userContent).display === "none")
				userContent.style.display = "flex";
			else
				userContent.style.display = "none";
		});
	</script>
</html>