<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ACE Library | Profile</title>
		<style>
			.wrapper{
				width:300px;
				margin: 0 auto;
				color:white;
			}
		</style>
	</head>
	<body style="background-color: #632544;">
		<div class="container">
			<form action="" method="post">
				<button class="btn btn-default" style="float:right; width:70px;" name="submit1">Edit</button>
			</form>
			<div class="wrapper">
				<?php
					$q = mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_usr]';");
				?>
				<br><br>
				<h2 style="text-align: center;">My Profile</h2><br>
				
				<?php
					$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
 				</div>";
 			?>
			<br>
 			<div style="text-align: center;"> 
	 			<h4>
					Welcome,
	 				<b style="color:orange;"><?php echo $_SESSION['login_usr']; ?></b>
	 			</h4>
 			</div>
			<br>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> First Name: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['first'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Last Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['last'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> User Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['username'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Contact: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['contact'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
	
			</div>
		</div>
		<footer>
				<br>
				<p style="color:white;text-align:center;">ACE LIBRARY, Copyright &copy 2019</p>
		</footer>

	</body>
</html>