<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>ACE Library | Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
	
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
		.Approve
		{
		  margin-left: 420px;
		}

	</style>

</head>
<body>

  <div class="container">
    <br><h3 style="text-align: center;font-family:Forte">Approve Request</h3><br><br>
    
    <form class="Approve" action="" method="post">
	
        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>
        <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br><br>
        <button class="btn btn-default" type="submit" name="submit" style="text-align: center;background-color:green; font-weight:bold; color:white; width:100px; height:40px; margin-left:90px;">Approve</button>
    </form>
  
  </div>
</div>
<br>
	<footer>
			<br>
			<p style="color:white;text-align:center;">ACE LIBRARY, Copyright &copy 2019</p>
	</footer>
	

<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  'Yes', `issuedate` =  '$_POST[issue]', `returndate` =  '$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]' and approve='' ;");

    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid]';");

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='Not-Available' where bid='$_SESSION[bid]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }
?>
</body>
</html>