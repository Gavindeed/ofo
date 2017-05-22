<!DOCTYPE html>
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
	
		<script type="text/javascript">
			function check() {
				var x = document.forms["register"]["Password"];
				var y = document.forms["register"]["RePassword"];
				if(x != y) {
					alert("Retype a wrong password!");
					return false;
				} else if(x.length < 8) {
					alert("Password must have a length of at least 8!");
					return false;
				}
			}
		</script>

	</head>
	<body>
		
		<div class="panel panel-default" style="margin:10%">
			<div class="panel-heading">
				<h3 class="panel-title">Login</h3>
			</div>
			<div class="panel-body">
				<form name="register" action="getregister.php" method="post" onsubmit="return check()">
					<div class="input-group" style="margin:2%">
						<span class="input-group-addon" id="basic-addon1">@</span>
						<input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1" name="User_name">
					</div>
					<div class="input-group" style="margin:2%">
						<span class="input-group-addon" id="basic-addon1">*</span>
						<input type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1" name="Password">
					</div>
					<div class="input-group" style="margin:2%">
						<span class="input-group-addon" id="basic-addon1">**</span>
						<input type="password" class="form-control" placeholder="Password again" aria-describedby="basic-addon1" name="RePassword">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>

	</body>
</html>