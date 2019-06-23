<?php
	include "connection.php";
	include "navbar.php";
	?>
<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
	section{
		margin-top: -20px;
		}	
	</style>
</head>
<body>

		<section> 
		<div class="log_img">
			<br>
			<div class="box1">
				<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">
				USER LOGIN </h1>
				<form name="login" action="" method="post">
					<br>
					<div class="login">
					<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
					<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
					<input class="btn btn-default" type="submit" name="submit" value="LogIn" style="background-color:green; color:white; width:70px; height:30px; margin-left:100px;">				
					</div>
				</form>
				<p style="color:white; padding-left: 15px;">
					<br><br>
					<a style="color:white;" href="update_password.php">Forgot Password?</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					New To This Website ... <a style="color:white;" href="registration.php">Sign Up</a>
					</p>
			</div>
		</div>
		</section>
		
		<?php
		
			if(isset($_POST['submit'])){
				$count = 0;
				$res = mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]' ;");
				$row = mysqli_fetch_assoc($res);
				$count = mysqli_num_rows($res);
				
				if($count==0){
					?>
					<script type="text/javascript">
						alert("The Username and Password doesn't match.");
						</script>
					<?php
			}
			else{
				
				$_SESSION['login_usr'] = $_POST['username'];
				$_SESSION['pic'] = $row['pic'];
				?>
				
				<script type="text/javascript">
				alert("Logged In Sucessfully...");
				window.location="profile.php";
				</script>
				<?php
				}
			}
		?>
		
		<footer>
			<br>
			<p style="color:white;text-align:center;">ACE LIBRARY, Copyright &copy 2019</p>
		</footer>
	
	
</body>
</html>