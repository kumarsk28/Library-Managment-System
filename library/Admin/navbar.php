<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

	<nav class="navbar navbar-inverse">
			<div style="border-bottom:#e8491d 3px solid; background-color:black;" class="container-fluid ">
			<div class="navbar-header">
				<h4 style="color:#e8491d;" class="navbar-brand active">&nbsp &nbsp &nbsp ACE LIBRARY &nbsp &nbsp &nbsp </h4>
			</div>
				<ul class="nav navbar-nav"> 
					<li><a href="index.php">HOME</a></li>
					<li><a href="books.php">BOOKS</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li>
				</ul>
				<?php
					if(isset($_SESSION['login_usr'])){
						?>
						<ul class="nav navbar-nav"> 
							<li><a href="student.php">STUDENT-INFORMATION </a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
										<span class="caret"></span></a>
								<ul class="dropdown-menu">
										<li><a href="add.php">Add Books</a></li>
										<li><a href="delete.php">Delete Books</a></li>
										<li><a href="request.php">Request Books</a></li>
										<li><a href="issue_info.php">Issue Information</a></li>
										<li><a href="expired.php">Expired List</a></li>
								</ul>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
						<li><a href="profile.php">
						<div style="color:white">
							<?php
								echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
								echo " ".$_SESSION['login_usr'];
								?>
						</div></a></li>
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT &nbsp</span></a></li>
						</ul>
						<?php
					}
					else{
						?>
						<ul class="nav navbar-nav navbar-right">
						<li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
						<li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN IN &nbsp </span></a></li>
						</ul>
						<?php
					}
				?>	
				
			</div>
			</nav>
		

</body>
</html>