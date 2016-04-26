<?php
if (isset($_POST['update'])) {
	require_once("db_const.php");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	# check connection
	if ($mysqli->connect_errno) {
		echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
		exit();
	}


	$sql = "UPDATE customers SET customer_name='{$_POST['name']}', customer_email='{$_POST['email']}', customer_phone='{$_POST['phone']}', customer_address='{$_POST['address']}' WHERE customer_id='{$_POST['id']}'";
	if ($mysqli->query($sql)) {
		//echo "New Record has id ".$mysqli->insert_id;
	echo "<p>Customer updated!<a href='c_search.php'>Back</a></p>";
	} else {
		echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
		exit();
	}
}
?>		