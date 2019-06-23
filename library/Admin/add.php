<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ACE Library | Add Books</title>
		<style>
			.wrapper{
				width:300px;
				margin: 0 auto;
				color:white;
			}
			.book{
				width:400px;
				margin: 0px auto;
			}
			.form-control{
				height:40px;
			}
		</style>
	</head>
	<body style="background-color: #632544;">
		<div class="container">
				<h2 style="color:white;font-family:Viner Hand ITC;text-align: center;">Add New Books</h2><br>
				<form class="book" action="" method="post">
					<!--<input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>-->
					<input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
					<input type="text" name="authors" class="form-control" placeholder="Author's Name" required=""><br>
					<input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
					<input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
					<input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
					<input type="text" name="department" class="form-control" placeholder="Department" required=""><br>

					<button style="text-align: center;background-color:green; font-weight:bold; color:white; width:70px; height:30px; margin-left:150px;" class="btn btn-default" type="submit" name="submit">ADD</button>
				</form>
		</div>
		<?php
			if(isset($_POST['submit']))
			{
				if(isset($_SESSION['login_usr']))
				{
					mysqli_query($db,"INSERT INTO books VALUES ('', '$_POST[name]', '$_POST[authors]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]') ;");
				?>
						<script type="text/javascript">
							alert("Book Added Successfully ...");
						</script>

				<?php

				}
				else
				{
				?>
						<script type="text/javascript">
							alert("Error! Please Login First ...");
						</script>
				<?php
				}
			}
		?>

		<br><br>
		<footer>
				<br>
				<p style="color:white;text-align:center;">ACE LIBRARY, Copyright &copy 2019</p>
		</footer>

	</body>
</html>