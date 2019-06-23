<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

		.srch
		{
			padding-left: 800px;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
		}
		body {
			background-image: url("images/ttr.jpg");
			background-repeat: no-repeat;
		}
		.container
		{
			height: 600px;
			background-color: black;
			margin: 0px auto;
			opacity: .8;
			color: white;
		}

	</style>
</head>
<body>
	<div class="container">
	<div class="srch">
		<br>
		<form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
			<button class="btn btn-default" name="submit" type="submit" style="text-align: center;background-color:green; font-weight:bold; color:white; ">Approve</button>&nbsp
			<button class="btn btn-default" name="submit1" type="submit" style="text-align: center;background-color:red; font-weight:bold; color:white; ">Decline</button><br>
		</form>
	</div>

	<h3 style="text-align: center; font-family:Forte">Request of Book</h3>

	<?php
	
	if(isset($_SESSION['login_usr']))
	{
		$sql= "SELECT student.username,roll,books.bid,name,authors,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
		$res= mysqli_query($db,$sql);

		if(mysqli_num_rows($res)==0)
			{
				echo "<h2 style='text-align: center;font-family:Kristen ITC;color: blue;'><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		}
	}
	else
	{
		?>
		<br>
			<h4 style="text-align: center;color: yellow;">You Need To Login To See The Request.</h4>
			
		<?php
	}

	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['username'];
		$_SESSION['bid']=$_POST['bid'];

		?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
		<?php
	}
	else if(isset($_POST['submit1']))
	{	
		mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  'No' WHERE username='$_POST[username]' and bid='$_POST[bid]' and approve='' ;");
		
		?>
			<script type="text/javascript">
				window.location="request.php"
			</script>
		<?php

	}

	?>
	</div>
	<br>
	<footer>
			<br>
			<p style="color:white;text-align:center;">ACE LIBRARY, Copyright &copy 2019</p>
	</footer>
	
	
</body>
</html>

		