<html>
<head>
<?php include('test_code.php') ?>
</head>
<body>
	
	<form action="" method="POST">
		<input type = "button" onclick = "generate()"/><br>
		<input type="text" name="1" value="Whatever"/><br>
		<input type="text" name="1_1" value="a"/>
		<input type="text" name="1_2" value="b"/>
		<input type="text" name="1_3" value="c"/>
		<input type="text" name="1_4" value="d"/><br>
		<input type="text" name="2" value="Whatever"/><br>
		<input type="text" name="2_1" value="a"/>
		<input type="text" name="2_2" value="b"/>
		<input type="text" name="2_3" value="c"/>
		<input type="text" name="2_4" value="d"/><br>
		<input type="text" name="3" value="Whatever"/><br>
		<input type="text" name="3_1" value="a"/>
		<input type="text" name="3_2" value="b"/>
		<input type="text" name="3_3" value="c"/>
		<input type="text" name="3_4" value="d"/><br>
		<input class= "button" type="submit" name="submit" value="Generate_PDF"/>
		<input type= "text" name="number_of_questions" value="3"/>
	</form>
		
		
</body>
</html>

<script>
	var n = 1;
	function generate() {
		n++;
		for(var i = 0;i < 5;++i) {
			var element = document.createElement("input");
			element.type = "text";
			if(i > 0) {
				element.name = n + '_' + i;
			} else 
				element.name = n;
			}
			switch(i) {
				case 0:
					element.value = "Whatever";
					break;
				case 1:
					element.value = "a";
					break;
				case 2:
					element.value = "b";
					break;
				case 3:
					element.value = "c";
					break;
				case 4:
					element.value = "d";
					break;
			}
			document.getElementById("form").appendChild(element);
		}
	}





</script>