<?php
	$servername = "localhost";
	$username = "root";

	$conn = new mysqli($servername, $username, "", "ofo");

	if($conn->connect_error) {
		die("Connection failed! " . $conn->connect_error);
	}

	$sql = "select * from User where User_name=\"" . $_POST["User_name"] . "\"";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		print "<script>alert(\"The username has been used!\");window.location.assign(\"http://47.92.92.228/ofo/index.html\");</script>\n";
	} else {
		$sql = "select max(User_ID) from User";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$newid = $row["max(User_ID)"] + 1;
		$sql = "insert into User(User_ID, Bike_ID, User_name, Password, Balance) values(" . $newid . ", null, \"" . $_POST["User_name"] . "\", \"" . $_POST["Password"] . "\", 0)";
		$conn->query($sql);
		print "<script>alert(\"Register succeed!\");window.location.assign(\"http://47.92.92.228/ofo/index.html\");</script>\n";
	}

	$conn->close();
?>