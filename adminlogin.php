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