<?php
	include "connection.php";
	include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Request Books</title>
	<style type="text/css">
		.srch{
			padding-left:820px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3 style="text-align: center; font-family:Forte">Student Request</h3><br>
		<?php
		if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' ;");

			if(mysqli_num_rows($q)==0)
			{
				?>
					<script type="text/javascript">
					alert (" There Is No Pending Request ");
					window.location = "books.php";
					</script>
				
				<?php
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				
				echo "<th>"; echo "Book-ID";  echo "</th>";
				echo "<th style='text-align: center;'>"; echo "Approve Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td style='text-align: center;'>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issuedate']; echo "</td>";
				echo "<td>"; echo $row['returndate']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
		else
		{	
			?>
			<script type="text/javascript">
			alert (" Please Login First To See The Request Information ");
			window.location = "books.php";
			</script>
			<?php
		}
		?>
	
	</div>
</body>
</html>