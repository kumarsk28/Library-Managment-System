<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Change Password</title>
	
	<style type="text/css">
		body{
			height: 650px;
			background-image:url("images/7.jpg");
			background-repeat: no-repeat;
		}
		.wrapper{
			width: 400px;
			height: 400px;
			margin: 70px auto;
			background-color: black;
			opacity: .8;
			color: white;
			padding:27px 15px;
		}
		.form-control{
			width:300px;
		}
		footer{
			margin-top : -45px;
		}
	</style>
</head>
	<body>
	<div class="wrapper">
		<div style="text-align: center;">
		<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">
				CHANGE YOUR PASSWORD </h1><br>
		</div>
		<div style="padding-left:35px;">
		<form action="" method="post">
			<input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
			<input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
			<input class="form-control" type="password" name="password" placeholder="New Password" required=""><br><br>
			<input class="btn btn-default" type="submit" name="submit" value="Update" style="background-color:red; color:white; width:70px; height:30px; margin-left:100px;">
		</form>	
		</div>
	</div>
	
	<?php
		
			if(isset($_POST['submit'])){
				$count = 0;
				$res = mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && email='$_POST[email]' ;");
				$row = mysqli_fetch_assoc($res);
				$count = mysqli_num_rows($res);
				
				if($count!=0){
					
				$sql = mysqli_query($db,"UPDATE student SET password='$_POST[password]'
				WHERE username='$_POST[username]' AND email='$_POST[email]';");
				
					?>
					<script type="text/javascript">
						alert(" The Password Has Been Updated Sucessfully ");
					</script>
					
					<?php
				}
				else
				{
					?>
					<script type="text/javascript">
						alert("Some Error Occured...Please Try Again");
						window.location="update_password.php";
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
				