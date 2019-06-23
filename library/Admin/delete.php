<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ACE Library | Delete Books</title>
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
				<br><br>
				<h2 style="color:white;font-family:Viner Hand ITC;text-align: center;">Delete Books</h2><br>
				<form class="book" action="" method="post">
					<input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
					<input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
					<input type="text" name="authors" class="form-control" placeholder="Author's Name" required=""><br>
	
					<button style="text-align: center;background-color:green; font-weight:bold; color:white; width:90px; height:30px; margin-left:150px;" class="btn btn-default" type="submit" name="submit">DELETE</button>
				</form>
		</div>
		<?php
			if(isset($_POST['submit']))
			{
				if(isset($_SESSION['login_usr']))
				{
					$q=mysqli_query($db,"SELECT * from books where bid = '$_POST[bid]' and name = '$_POST[name]' and authors='$_POST[authors]'; ");
					$res = mysqli_query($db,"DELETE from books where bid = '$_POST[bid]' and name = '$_POST[name]' and authors='$_POST[authors]'; ");
					if(mysqli_num_rows($q)!=0){
					?>
						<script type="text/javascript">
							alert("Book Deleted Successfully ...");
						</script>
					<?php
					}
					else{
						?>
						<script type="text/javascript">
							alert("Wrong Input! Please Try Again ...");
						</script>
					<?php
					}
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

		<br><br><br><br><br><br>
		<footer>
				<br>
				<p style="color:white;text-align:center;">ACE LIBRARY, Copyright &copy 2019</p>
		</footer>

	</body>
</html>