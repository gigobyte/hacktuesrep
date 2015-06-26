<?php
	if(isset($_POST['submit'])) {
		include_once "../mysql_connect.php";
		
		$username = $_POST['username'];
		$password = $_POST['pass'];
		$repeat_password = $_POST['repeat_pass'];
		$email = $_POST['email'];
		
			// To protect MySQL injection
			$username = stripslashes($username);
			$password = stripslashes($password);
			$email = stripslashes($email);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			$email = mysql_real_escape_string($email);
			

		if ($repeat_password == $password) {
			mysql_query("INSERT INTO members (username, password, email )
			VALUES ('$username', '$password', '$email')") or die(mysql_error());
		} elseif ($repeat_password != $password) {
			echo "<script type='text/javascript'>alert('Грещна Парола!');</script>";;
		}
		
	}
?>