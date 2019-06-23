<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Home </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		nav
		{
		float:right;
		word-spacing:30px ;
		padding:30px;
		}
		nav li
		{
		display: inline-block;
		line-height:80px;
		}
		a:hover
		{
		color:#ff69b4;
		font-weight:bold;
		}
		.current a	
		{
		color:#e8491d;
		font-weight:bold;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		
		<header>
			<div class="logo">
				<img src="images/1.png" width="30%"><br/>
				<h1 style="color:#e8491d;">ACE LIBRARY</h1>
			</div>
			
			<?php
				if(isset($_SESSION['login_usr']))
			{
				?>
				<nav>
				<ul>
					<li class="current"><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>
				</nav>

				<?php
			}
				else
			{
				?>
				<nav>
				<ul>
					<li class="current"><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="admin_login.php">LOGIN</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>
				</nav>
		
			<?php
			}
			
			?>
			
		</header>
		
		<section>
		<div class="sec_img">
		</div>
		</section>
		
		<footer>
			<br>
			<p style="color:white;text-align:center;">ACE LIBRARY, Copyright &copy 2019</p>
		</footer>
	</div>
	
</body>
</html>