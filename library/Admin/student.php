<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Student Info</title>
	<style type="text/css">
		.srch{
			padding-left:850px;
		}
	</style>
</head>
<body>
	<div class="container">
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
		
			<input class="form-control" type="text" name="search" placeholder="Student Username..." required="">
			<button style="background-color:#e8491d;" type="submit" name="submit" class="btn btn-default">
			<span class="glyphicon glyphicon-search"></span>
			</button>
		</form>
	</div>
	<h2>&nbsp List Of Students</h2>
	<br>
			
	<?php
	
		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,roll,email,contact from student where username like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				?>
					<script type="text/javascript">
						alert("Sorry! No Student found. Try searching again.");
						window.location="student.php";
						</script>
					<?php
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #e8491d;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "User Name";  echo "</th>";
				echo "<th>"; echo "Roll";  echo "</th>";
				echo "<th>"; echo "E-Mail";  echo "</th>";
				echo "<th>"; echo "Contact";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT first,last,username,roll,email,contact from student;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #e8491d;'>";
				//Table header
				echo "<th>"; echo "First Name";	echo "</th>";
				echo "<th>"; echo "Last Name";  echo "</th>";
				echo "<th>"; echo "User Name";  echo "</th>";
				echo "<th>"; echo "Roll";  echo "</th>";
				echo "<th>"; echo "E-Mail";  echo "</th>";
				echo "<th>"; echo "Contact";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['first']; echo "</td>";
				echo "<td>"; echo $row['last']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['email']; echo "</td>";
				echo "<td>"; echo $row['contact']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}
		?>
		</div>
</body>
</html>