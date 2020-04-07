<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Dashboard</title>
		<link rel="stylesheet" href="./index.css" />
	</head>
	<body>
		<section id="side-bar">
			<div id="side-logo">Dashboard</div>
			<nav>
				<a href="index.php"><i class="fas fa-home"></i>Home</a>
				<a href="table.php"><i class="fas fa-table"></i>Table</a>
				<a href="animation.php"
					><i class="far fa-circle"></i>Animation</a
				>
				<a href="schedule.php"
					><i class="far fa-calendar-check"></i>Schedule</a
				>
				<a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
				<a href="register.php"
					><i class="fas fa-user-plus"></i>Register</a
				>
			</nav>
		</section>
		<main>
			<header>
				<span class="header-text">Welcome</span>
				<div class="user-content">
					<span class="user-text">Hello, weslie10</span>
					<div class="dropdown">
						<button class="user-logo">
							<i class="fas fa-user" id="user-button"></i>
						</button>
						<div class="dropdown-content">
							<a href="#">Your Data</a>
							<a href="#">Logout</a>
						</div>
					</div>
				</div>
			</header>