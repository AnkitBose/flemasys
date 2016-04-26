<?php
if (isset($_POST['submit'])) {
  require_once("db_const.php");
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    # check connection
    if ($mysqli->connect_errno) {
      echo "<p>MySQL error no {$mysqli->connect_errno} : {$mysqli->connect_error}</p>";
      exit();
  }
  $address = $_POST['pickup'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sql = "INSERT  INTO `bookings` (`booking_id`, `booking_pickup_add`, `booking_date`, `booking_time`, `booking_name`, `booking_email`) 
        VALUES (NULL, '{$address}', '{$date}', '{$time}', '{$name}', '{$email}')";
 
  if ($mysqli->query($sql)) {
    //echo "New Record has id ".$mysqli->insert_id;
    echo "<p>Booked successfully!<a href='booking.php'>Back</a></p>";
  } else {
    echo "<p>MySQL error no {$mysqli->errno} : {$mysqli->error}</p>";
    exit();
  }
 }   
?>