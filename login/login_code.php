<?php	
if(isset($_POST['login'])) {
	$db_name="users"; // Database name 
	$tbl_name="members"; // Table name 

	// Connect to server and select databse.
	$connection = mysql_connect("localhost", "root", "lorempass")or die("cannot connect"); 

	// username and password sent from form 
	$username=$_POST['username']; 
	$password=$_POST['pass']; 

	// To protect MySQL injection (more detail about MySQL injection)
	$username = stripslashes($username);
	$password = stripslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	
	$select_db = mysql_select_db('users');
	$query = "SELECT * FROM `members` WHERE username='$username' and password='$password'";
	$result = mysql_query($query) or die(mysql_error());
	$count = mysql_num_rows($result);
	if ($count == 1){
		$_SESSION['username'] = $username;
		header( "Location: http://localhost/CardBazarBg/index.php" );
	}else{
		echo "<p style=\" color:red; font-size: 10px\">Username и Парола не съвпадат!</p>";
	}
}
?>