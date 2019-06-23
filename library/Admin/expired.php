<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Expired List</title>
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
    <?php
      if(isset($_SESSION['login_usr']))
      {
        ?>
          <div class="srch">
          <br>
          <form method="post" action="" name="form1">
            <input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
            <input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
            <button class="btn btn-default" name="submit" type="submit" style="text-align:center;">Return</button><br>
          </form>
        </div>
        <?php

        if(isset($_POST['submit']))
        {
          $var1='<p style="color:yellow; background-color:green; text-align:center;">RETURNED</p>';
          mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");
		  $res=mysqli_query($db,"SELECT quantity from books where bid='$_POST[bid]';");

			while($row=mysqli_fetch_assoc($res))
			{
			  if($row['quantity']==0)
			  {
				mysqli_query($db,"UPDATE books SET status='Available' where bid='$_POST[bid]';");
			  }
			}
		  mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ;");
        }
      }
    ?>
    <h3 style="text-align: center; font-family:Forte">Expired List</h3><br>
    <?php
   
      if(isset($_SESSION['login_usr']))
      {
        
        $sql="SELECT student.username,roll,books.bid,name,authors,edition,approve,issuedate,issue_book.returndate FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' and issue_book.approve !='No' ORDER BY `issue_book`.`returndate` ASC";

        $res=mysqli_query($db,$sql);
        
        
        echo "<table class='table table-bordered' style='width:100%;' >";
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
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
          echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issuedate']; echo "</td>";
          echo "<td>"; echo $row['returndate']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";
       
      }
      else
      {
        ?>
          <h3 style="text-align: center;">Login to see information of Borrowed Books</h3>
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