<?php	

if(isset($_POST['submit'])) {
	session_start();
	// Connect to server and select databse.
	$connection = mysql_connect("localhost", "root", "lorempass")or die("cannot connect"); 

	// username and password sent from form 
	$username=$_POST['username']; 
	$password=$_POST['password']; 

	// To protect MySQL injection
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$select_db = mysql_select_db('users');
	$query = "SELECT * FROM `members` WHERE username='$username' and password='$password'";
	$result = mysql_query($query) or die(mysql_error());

	if(mysql_num_rows($result) > 0){
		$_SESSION['username'] = $username;
		if(isset($_POST['username']) && isset($_POST['password'])){
			header( "Location: ../index.html" );
		}
		
	}else{
		echo "<p style=\" color:red; font-size: 10px\">Username и Парола не съвпадат!</p>";
	}
}
?>