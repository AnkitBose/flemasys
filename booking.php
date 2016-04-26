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
		<div>
		<form method="post" action="print.php">
		<div id="block">
			Booking ID: <input type="text" name="pickup" id="pickup" placeholder="Enter pickup address" required /><br/>
			Date of Journey: <input type="date" name="date" id="date" placeholder="Enter date" required /><br/>
			Time: <input type="time" name="time" id="time" placeholder="Enter time" required /><br/>
			Customer Name: <select name="name">
			<?php
				require_once("db_const.php");
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				# check connection
				if ($mysqli->connect_errno) {
					echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
					exit();
				}

				$sql = "SELECT * from customers";
				$result = $mysqli->query($sql);
				while ($row = $result->fetch_assoc()) {
					$name = $row['customer_name'];
					echo '<option value="'.$name.'">'.$name.'</option>';
				}
			?>
			</select><br/>
			Customer Email: <select name="email">
			<?php
				require_once("db_const.php");
				$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
				# check connection
				if ($mysqli->connect_errno) {
					echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
					exit();
				}

				$sql = "SELECT * from customers";
				$result = $mysqli->query($sql);
				while ($row = $result->fetch_assoc()) {
					$email = $row['customer_email'];
					echo '<option value="'.$email.'">'.$email.'</option>';
				}
			?>
			</select><br/>
			<input type="submit" id="submit" name="submit" value="Print"/>
		</div>
		</form>
	</div>
</body>
</html>