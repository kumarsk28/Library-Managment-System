<?php
	include "connection.php";
	include "navbar.php";
	?>

<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Registration </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style type="text/css">
	section{
		margin-top: -20px;
		}	
		.box2{
			height:525px;
		}
	</style>
</head>
<body>
		
		<section> 
		<div class="reg_img">
			<br>
			<div class="box2">
				<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">
				USER REGISTRATION </h1><br>
				<form name="Registration" action="" method="post">
					<div class="login">
					<input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>
					<input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>
					<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
					<input class="form-control" type="password" name="password" placeholder="Password" required=""><br>
					<input class="form-control" type="text" name="roll" placeholder="Roll No" required=""><br>
					<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
					<input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>
					<input class="btn btn-default" type="submit" name="submit" value="SignUp" style="background-color:red; color:white; width:70px; height:30px;margin-left:75px;">
					</div>
				</form>
				
			</div>
		</div>
		</section>
		
		<?php 
		
			if(isset($_POST['submit'])){
				$count = 0;
				$sql = "SELECT username from `student`";
				$res = mysqli_query($db,$sql);
				
				while($row = mysqli_fetch_assoc($res)){
					if($row['username']==$_POST['username']){
						$count = $count + 1;
					}
				}
				
				if($count==0)
				{
				mysqli_query($db,"INSERT INTO `STUDENT` VALUES('$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[roll]','$_POST[email]','$_POST[contact]','p.jpg')");
			?>
			<script type="text/javascript">
				alert("Registered Sucessfully ... ");
			</script>
			
		<?php
			}
				else{
					?>
					<script type="text/javascript">
						alert("The username already exists ");
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