<?php
	if(isset($_POST['submit'])) {
		include_once "../mysql_connect.php";

		$name =  $_POST['name'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$class = $_POST['class'];
		$classnum = $_POST['classnum'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password2 = $_POST['password2'];
		$email = $_POST['email'];

		
			// To protect MySQL injection
			$name = stripslashes($name);
			$middlename = stripslashes($middlename);
			$lastname = stripslashes($lastname);
			$class = stripslashes($class);
			$classnum = stripslashes($classnum);
			$username = stripslashes($username);
			$password = stripslashes($password);
			$password2 = stripslashes($password2);
			$email = stripslashes($email);

			$name = mysql_real_escape_string($name);
			$middlename = mysql_real_escape_string($middlename);
			$lastname = mysql_real_escape_string($lastname);
			$class = mysql_real_escape_string($class);
			$classnum = mysql_real_escape_string($classnum);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$password2 = mysql_real_escape_string($password2);
			$email = mysql_real_escape_string($email);
			

		if ($password2 == $password) {
			mysql_query("INSERT INTO members (name, middlename, lastname, class, classnum, username, password, email )
			VALUES ('$name', '$middlename', '$lastname', '$class', '$classnum', '$username', '$password', '$email')") or die(mysql_error());
		} elseif ($repeat_password != $password) {
			echo "<script type='text/javascript'>alert('Грещна Парола!');</script>";
		}
		
	}
?>