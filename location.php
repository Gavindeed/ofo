<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ofo小黄车管理系统</title>
		<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

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
						<li class="active"><a href="#">Locations <span class="sr-only">(current)</span></a></li>
						<li><a href="#">Back to manager</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Logout</a></li>
						<li><a href="#">Register</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		<ul class="list-group" style="padding:2% 10% 2% 10%">
			<?php
				$servername = "localhost";
				$username = "root";

				$conn = new mysqli($servername, $username, "", "ofo");

				if($conn->connect_error) {
					die("Connection failed! " . $conn->connect_error);
				}

				$user_id = $_GET["user_id"];

				$sql = "select * from Location";
				$result = $conn->query($sql);

				$locations = new array();

				if($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$locations[$row["Location_ID"]] = $row["Location_name"];
					}
				}

				foreach($locations as $id=>$name) {
					$sql = "select count(Bike_ID) from Bike where Location_ID=" . $id;
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					$number = $row["count(Bike_ID)"];
					print "<li class=\"list-group-item\">\n";
					print "<span class=\"badge\">" . $number . "</span>\n";
					print $name . "\n";
					print "</li>\n";
				}

				$conn->close();

			?>
  			<li class="list-group-item">
    			<span class="badge">14</span>
    			Cras justo odio
  			</li>
		</ul>

	</body>
</html>