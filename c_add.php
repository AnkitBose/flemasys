<!DOCTYPE html>
<html>
<head>
	<title>Flemasys | Fleet Management System</title>
	<link rel="stylesheet" href="" media="all" />
</head>
<body>
	<?php
require_once("db_const.php");
if (!isset($_POST['submit'])) {
?>	<!-- The HTML registration form -->
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		Name: <input type="text" name="name" /><br />
		Email: <input type="text" name="email" /><br />
		Phone: <input type="text" name="phone" /><br />
		Address: <input type="text" name="address" /><br />
 
		<input type="submit" name="submit" value="Register" />
	</form>
<?php
} else {
## connect mysql server
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}
## query database
	# prepare data for insertion
	$name	= $_POST['name'];
	$email	= $_POST['email'];
	$phone	= $_POST['phone'];
	$address	= $_POST['address'];	
 
	# check if email exist else insert
		$result = $mysqli->query("SELECT customer_email from customers WHERE customer_email = '{$email}' LIMIT 1");
	if ($result->num_rows == 1) {echo "<p>Email already exists!</p>";} 
	else {
		# insert data into mysql database
		$sql = "INSERT  INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`) 
				VALUES (NULL, '{$name}', '{$email}', '{$phone}', '{$address}')";
 
		if ($mysqli->query($sql)) {
			//echo "New Record has id ".$mysqli->insert_id;
			echo "<p>Registred successfully!<a href='c_search.php'>Back</a></p>";
		} else {
			echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
			exit();
		}
	}
}
?>		
</body>
</html>