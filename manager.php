<!DOCTYPE html>
<?php session_start(); ?>
<html>
	<head>
		<meta charset="utf-8">
		<title>ofo小黄车管理系统</title>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>

		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">
				        <img alt="Brand" src="icon.jpg" style="height:100%">
				    </a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<p class="navbar-text">
						<?php
							$servername = "localhost";
							$username = "root";

							$conn = new mysqli($servername, $username, "", "ofo");

							if($conn->connect_error) {
								die("Connection failed! " . $conn->connect_error);
							}


							if($_POST["User_name"] != "" && $_POST["Password"] != "") {
								$sql = "select * from User where User_name=" . $_POST["User_name"] . " and Password=" . $_POST["Password"];
								$result = $conn->query($sql);
								if($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									print $row["User_name"];
									$_COOKIE["user_id"] = $row["User_ID"];
								} else {
									print "<script>alert(\"Wrong password!\");window.location.assign(\"http://47.92.92.228/ofo/index.html\");</script>\n";
								}
							} else if($_SESSION["user_id"] != "") {
								$sql = "select * from User where User_ID=" . $_SESSION["user_id"];
								$result = $conn->query($sql);

								if($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									print $row["User_name"];
								} else {
									print "<script>alert(\"The user does not exist!\");window.location.assign(\"http://47.92.92.228/ofo/index.html\");</script>\n";
								}
							} else if($_GET["user_id"] != "") {
								$user_id = $_GET["user_id"];
								$_SESSION["user_id"] = $_GET["user_id"];
								$sql = "select * from User where User_ID=" . $user_id;
								$result = $conn->query($sql);

								if($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									print $row["User_name"];
								} else {
									print "<script>alert(\"The user does not exist!\");window.location.assign(\"http://47.92.92.228/ofo/index.html\");</script>\n";
								}
							} else {
								print "<script>alert(\"No user specified!\");window.location.assign(\"http://47.92.92.228/ofo/index.html\");</script>\n";
							}

						?>
						</p>
						<li><a href="#">Profile</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">Logout</a></li>
						<li><a href="register.php">Register</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<div class="jumbotron" style="background-image:url('usebike.jpg');background-size:100% 100%;margin:5%">
			<h1 style="color:#8080ff;text-align:center">You can use bikes right now!</h1>
			<p style="text-align:center"><a class="btn btn-primary btn-lg" <?php print "href=\"location.php?user_id=" . $_SESSION["user_id"] . "\""; ?> role="button">Use Bikes</a></p>
		</div>

		<div class="jumbotron" style="background-image:url('route.jpg');background-size:100% 100%;margin:5%">
			<h1 style="color:#8080ff;text-align:center">Where have I gone by using ofo?</h1>
			<p style="text-align:center"><a class="btn btn-primary btn-lg" <?php print "href=\"account.php?user_id=" . $_SESSION["user_id"] . "\""; ?> role="button">Check history routes</a></p>
		</div>

		<div class="jumbotron" style="background-image:url('recharge.jpg');background-size:100% 100%;margin:5%">
			<h1 style="color:#8080ff;text-align:center">My balance is not enough for another trip?</h1>
			<p style="text-align:center"><a class="btn btn-primary btn-lg" <?php print "href=\"balance.php?user_id=" . $_SESSION["user_id"] . "\""; ?> role="button">Recharge &amp; History recharge</a></p>
		</div>

	</body>
</html>