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
if (isset($_POST['submit'])){	
	if ($_POST['username'] == "admin" && $_POST['password'] == "admin") {
 			header("Location: d_search.php");
 			exit;
    } else {
    	echo "<p>Invalid Password</p>";
	}
}
?>		
</body>
</html>