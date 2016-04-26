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
			<table>
			
<?php 
	if(isset($_GET['search'])){
		require_once("db_const.php");
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		# check connection
		if ($mysqli->connect_errno) {
			echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
			exit();
		}
		$user_keyword = $_GET['key'];
		$get_key = "select * from customer where customer_name like '%$user_keyword%'";
		$run_key = mysqli_query($db, $get_key);
		$count = mysqli_num_rows($run_key);
		if ($count==0) {
			echo"<h2>Customer does not exist</h2>";
		}
		while ($row_key=mysqli_fetch_array($run_key)) {
			$c_id = $row_key['customer_id'];
			$c_name = $row_key['customer_name'];
			$c_email = $row_key['customer_email'];
			$c_phone = $row_key['customer_phone'];
			$c_address = $row_key['customer_address'];
		}
	}
?>

			</table>
		</div>
	</div>
</body>
</html>
