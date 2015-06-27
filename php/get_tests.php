<?php
	function get_user_class() {
		$username = $_SESSION['username'];				

		$connection = mysql_connect("localhost", "root", "lorempass")or die("cannot connect"); 
		$select_db = mysql_select_db('users');
		mysql_query("set names 'utf8'");
		$query = "SELECT class FROM `members` WHERE username='$username'";
		$result = mysql_query($query) or die(mysql_error());
		$info = mysql_fetch_row($result);
		
		return $info[0];
	}
	
	function get_tests() {
		$tests = array();
	
		$class = get_user_class();
		$files = glob('json/*.json');
		foreach($files as $file) {
			//json/00000.json
			$testname = explode("/", $file)[1];
			$testname = explode(".", $testname)[0];
			$json = json_decode(file_get_contents($file), true);
			if($json['class'] == $class) {
				array_push($tests, $testname);
			}
		}
		
		return $tests;
	}
?>