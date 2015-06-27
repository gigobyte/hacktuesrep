<html>
<head>
	<?php include('test_code.php') ?>

	<!-- Bootstrap Core CSS -->
	<meta charset="utf-8">
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
	<form action="" method="POST">
		<button type="button" onclick="generate()" class="btn btn-primary">Добавете въпрос</button>
		<div id = "form">
		</div>
		<input type="submit" class="btn btn-outline btn-primary btn-lg btn-block" value = "Създай документ" name="submit"/>
		<input type= "text" name="number_of_questions"  id="number_of_questions" value="1" style = "display:none;"/>
		<br>
	</form>
</body>
</html>

<script>
	var n = 0;
	function generate() {
		n++;
		document.getElementById("number_of_questions").value = n;
		var delimiter = document.createElement("br");
		document.getElementById("form").appendChild(delimiter);
		document.getElementById("form").appendChild(delimiter);
		for(var i = 0;i < 5;++i) {
			var wraper = document.createElement("div");
			var value = document.createElement("span");
			var element = document.createElement("input");
			element.type = "text";
			element.setAttribute("class", "form-control");
			value.setAttribute("class", "input-group-addon");
			wraper.setAttribute("class", "form-group input-group");
			if(i > 0) {
				element.name = n + '_' + i;
			} else {
				element.name = n;
			}
			var id = wraper.id = element.name;
			switch(i) {
				case 0:
					value.innerHTML = n;
					break;
				case 1:
					value.innerHTML = "а";
					break;
				case 2:
					value.innerHTML = "б";
					break;
				case 3:
					value.innerHTML = "в";
					break;
				case 4:
					value.innerHTML = "г";
					break;
			}
			document.getElementById("form").appendChild(wraper);
			document.getElementById(id).appendChild(value);
			document.getElementById(id).appendChild(element);
		}
		document.getElementById("form").appendChild(delimiter);
		document.getElementById("form").appendChild(delimiter);
	}
</script>