<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Дневник 2.0</title>

	<!-- Bootstrap Core CSS -->
	<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div id="wrapper">
	<?php session_start();?>
	
        <!-- Navigation -->
	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html">Дневник 2.0</a>
		</div>
		<!-- /.navbar-header -->

		<?php
			include('php/get_tests.php');
		
if(isset($_SESSION['username'])) {
				echo '<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
					<ul class="dropdown-menu dropdown-messages">';
								$test_count = count(get_tests());
								$test_shown = 1;

								foreach(get_tests() as $test) {
									echo '<li>';
									$json = json_decode(file_get_contents('json/'. $test . '.json'), true);
									$link = "test.php?id=" . $test;
									echo '<a href="'. $link .'">
											<div>
												<strong>Тест по '.$json['subject'].'</strong>
											</div>
										<div>';
										
									if($test_count != $test_shown++) {
										echo '<li class="divider"></li>';
									}
									
									echo '</li>';
								}
						
						echo '</a></li>';
						
						echo '</ul>
							<!-- /.dropdown-messages -->
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li><a href="php/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
								</li>
							</ul>
							<!-- /.dropdown-user -->
						</li>
						<!-- /.dropdown -->
					</ul>
					<!-- /.navbar-top-links -->';
			} else {
				echo '<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown">
							<button onclick="window.location.href=\'login.html\'" type="button" class="btn btn-success">Влез</button>
						</li></ul>';
			}
		?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-home fa-fw"></i> Начало</a>
                        </li>
						<?php

						if(isset($_SESSION['username'])) {
							echo '<li>
								<a href="#"><i class="fa fa-book fa-fw"></i> Дневник<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="dnevnik_marks.html">Оценки</a>
									</li>
									<li>
										<a href="dnevnik_notes.html">Забележки и отсъствия</a>
									</li>
								</ul>';
					
							if($_SESSION['username'] == 'uchitel' &&
								$_SESSION['password'] == 'uchitel') {
									echo '<li>
											<a href="testove.html"><i class="fa fa-edit fa-fw"></i> Тестове</a>
											</li>';
							}
								
							echo '</li>';
						}
						
						?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-lg-12">
							<h1 class="page-header">Тест</h1>
						</div>
						
						<?php
							$id = $_GET['id'];
							$q = 1;
							$options = 1;
							
							$json = json_decode(file_get_contents('json/'. $test . '.json'), true);
							
							foreach($json as $key => $val) {
								if(is_array($val)) {
									echo '<h3><b>'. $q++ . '. ' . $key. '</h3>';
									foreach($val as $v) {
										echo '<div class="radio">
													<label>
														<input type="radio" name="optionsRadios" id="optionsRadios'. $options . '" value="option'. $options++ . '" checked>'. $v . '
													</label>
												</div>';
									}
								}
							}
						?>
						
						<br><button type="button" class="btn btn-success">Предай</button>
				  </div>
				</div>
			    <!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		  <!-- /#page-wrapper -->

	</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>