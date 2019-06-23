<?php
	session_start();
	if(isset($_SESSION['login_usr']))
	{
		unset($_SESSION['login_usr']);
	}
	header("location:index.php");
?>