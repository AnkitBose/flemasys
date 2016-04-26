<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		Flemasys
	</div>
	<div>
		<div>
			<a href="c_search.php">Customers</a>
			<a href="booking.php">Booking</a>
		</div>
		<form method="post" action="c_show.php">
		<div id="block">
			<input type="text" name="search" id="key" placeholder="Enter email" required />
			<input type="submit" id="submit" name="submit" value="Search"/>
		</div>
		</form>
		<div>
		<?php
		static $id;static  $name;static  $email;static  $phone;static  $address;
		if (isset($_POST['submit'])) {
			require_once("db_const.php");
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			# check connection
			if ($mysqli->connect_errno) {
				echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
				exit();
			}
			$userkey = $_POST['search'];
			$sql = "SELECT * from customers WHERE customer_email LIKE '{$userkey}'";
			$result = $mysqli->query($sql);
			if (!$result->num_rows > 0) {
				echo "<p>Invalid customer email</p>";
			} else {
				while($row_key = $result->fetch_assoc()) {
					$GLOBALS['$id'] = $row_key['customer_id'];
					$GLOBALS['$name']	= $row_key['customer_name'];
					$GLOBALS['$email']	= $row_key['customer_email'];
					$GLOBALS['$phone']	= $row_key['customer_phone'];
					$GLOBALS['$address'] = $row_key['customer_address'];
					echo "<form method='post' action='c_update.php'>
				<input type='hidden' name='id' value = '{$GLOBALS['$id']}'/><br />
				Name: <input type='text' name='name' value = '{$GLOBALS['$name']}' /><br />
				Email: <input type='text' name='email' value = '{$GLOBALS['$email']}' /><br />
				Phone: <input type='text' name='phone' value = '{$GLOBALS['$phone']}' /><br />
				Address: <input type='text' name='address' value = '{$GLOBALS['$address']}' /><br />
				<input type='submit' name='update' value='Update' />
			</form>";
		    }}
		}
		?>		
		</div>
	</div>
</body>
</html>
