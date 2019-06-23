<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ACE LIBRARY | Issue Info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

		.srch
		{
			padding-left: 850px;

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
			height: 800px;
			background-color: black;
			opacity: .8;
			color: white;
		}
		.scroll
		{
		  width: 100%;
		  height: 400px;
		  overflow: auto;
		}
		th,td
		{
		  width: 10%;
		}
		
	</style>

</head>
<body>
  <div class="container">
    <h3 style="text-align: center; font-family:Forte">Information Of Borrowed Books</h3><br>
    <?php

      if(isset($_SESSION['login_user']))
      {
		$var='<p style="color:yellow; background-color:red; text-align:center;">EXPIRED</p>';
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,issuedate,issue_book.returndate FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='No' and issue_book.approve !='$var' and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`returndate` ASC";
        $res=mysqli_query($db,$sql);
        if(mysqli_num_rows($res)==0){
			echo "<h1 style='text-align: center; font-family:Viner Hand ITC; color:orange;'>No Books Found </h1><br>";
		}
		else{
			echo "<table class='table table-bordered' style='width:100%;' >";
        
			echo "<tr style='background-color: #6db6b9e6;'>";
			echo "<th>"; echo "Username";  echo "</th>";
			echo "<th>"; echo "Roll No";  echo "</th>";
			echo "<th>"; echo "BID";  echo "</th>";
			echo "<th>"; echo "Book Name";  echo "</th>";
			echo "<th>"; echo "Authors Name";  echo "</th>";
			echo "<th>"; echo "Edition";  echo "</th>";
			echo "<th>"; echo "Issue Date";  echo "</th>";
			echo "<th>"; echo "Return Date";  echo "</th>";

			echo "</tr>"; 
			echo "</table>";

			echo "<div class='scroll'>";
			echo "<table class='table table-bordered' >";
		  while($row=mysqli_fetch_assoc($res))
		  {
			echo "<tr>";
			  echo "<td>"; echo $row['username']; echo "</td>";
			  echo "<td>"; echo $row['roll']; echo "</td>";
			  echo "<td>"; echo $row['bid']; echo "</td>";
			  echo "<td>"; echo $row['name']; echo "</td>";
			  echo "<td>"; echo $row['authors']; echo "</td>";
			  echo "<td>"; echo $row['edition']; echo "</td>";
			  echo "<td>"; echo $row['issuedate']; echo "</td>";
			  echo "<td>"; echo $row['returndate']; echo "</td>";
			echo "</tr>";
		  }
			echo "</table>";
			echo "</div>";
				
		}
      }
      else
      {
        ?>
          <h3 style="text-align: center;">Login To See Information Of Borrowed Books</h3>
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