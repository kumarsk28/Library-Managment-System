<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Books</title>
	<style type="text/css">
		.srch{
			padding-left:820px;
		}
	</style>
</head>
<body>
	<div class="container">
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
		
			<input class="form-control" type="text" name="search" placeholder="Search Books..." required="">
			<button style="background-color:#e8491d;" type="submit" name="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-search"></span>
			</button>
		</form>
	</div>
	<div style="padding-left:820px;">
		<form class="navbar-form" method="post" name="form1">
		
			<input class="form-control" type="text" name="bid" placeholder="Enter Book ID..." required="">
			<button style="background-color:#e8491d;color:white;" type="submit" name="submit1" class="btn btn-default">Request
			</button>
		</form>
	</div>
	
	<h2 style="font-family:Lucida Handwriting;font-weight:bold;">&nbsp List Of Books</h2>
	<br>
			
	<?php
	
		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				?>
					<script type="text/javascript">
						alert("Sorry! No book found. Try searching again.");
						window.location="books.php";
						</script>
					<?php
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #e8491d;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Author's Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `books`;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #e8491d;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Author's Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}
		
			if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				$q=mysqli_query($db,"SELECT bid from books where bid='$_POST[bid]' ;");
				$res=mysqli_query($db,"SELECT quantity from books where bid='$_POST[bid]';");
				$row=mysqli_fetch_assoc($res);
				if(mysqli_num_rows($q)==0)
				{
					?>
					<script type="text/javascript">
					alert (" Invalid Book ID ");
					window.location = "books.php";
					</script>
				
					<?php
				}
				else if($row['quantity']==0)
				{
					?>
					<script type="text/javascript">
					alert (" The Entered Book Is Not Available Right Now ... ");
					window.location = "books.php";
					</script>
				
					<?php	
				}
				else
				{
					$q1=mysqli_query($db,"SELECT bid from issue_book where bid='$_POST[bid]' and username='$_SESSION[login_user]' and approve='';");
					if(mysqli_num_rows($q1)!=0)
					{
						?>
						<script type="text/javascript">
						alert ("You Have Already Requested This Book ...");
						window.location = "books.php";
						</script>
					
						<?php
					}
					else{
						mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
						?>
						<script type="text/javascript">
							window.location="request.php"
						</script>
						<?php
					}
						
				}
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You Must Login To Request A Book");
					</script>
				<?php
			}
		}

		?>
		</div>
</body>
</html>