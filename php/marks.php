<table>
	<?php
		$query = "SELECT `data`, `predmet`, `ocenka` FROM  `marks`
		WHERE `name` = `$_SESSION['name']` "; 

		$result = mysql_query($query);
		while($row = mysql_fetch_row($result)) 
		{
			echo "<tr>";
			for($i = 0; $i < 9;++$i) {
	    			echo "<td>" . $row[$i] . "</td>"; 
	    	}

			echo "</tr>";			
		}

	?>
<table>