<!DOCTYPE html>
<html>
<head>
	<title>Flemasys | Fleet Management System</title>
	<link rel="stylesheet" href="" media="all" />
</head>
<body>
	<div id="option"> 
		<p>Log in</p> 
	</div>
<?php
if (!isset($_POST['submit'])){
?>
	<form method="post">
		<div id="block">
			<label id="user" for="username">Userame</label>
			<input type="text" name="username" id="name" placeholder="Username" required/>
			<label id="pass" for="password">Password</label>
			<input type="password" name="password" id="password" placeholder="Password" required />
			<input type="submit" id="submit" name="submit" value="Log in"/>
		</div>
	</form>
<?php
} else {
	require_once("db_const.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
 
	$username = $_POST['username'];
	$password = $_POST['password'];
 
	$sql = "SELECT * from users WHERE username LIKE '{$username}' LIMIT 1";
	$result = $mysqli->query($sql);
	if (!$result->num_rows == 1) {
		echo "<p>Invalid username</p>";
	} else {
		while($row = $result->fetch_assoc()) {
        	if (password_verify ( $password , $row['password'] )) {
				header("Location: c_search.php");
    			exit;
    		}
    		else {
    			echo "<p>Invalid Password</p>";
    		}
    	}
	}
}
?>		
</body>
</html>