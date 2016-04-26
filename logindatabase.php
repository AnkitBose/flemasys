<html>
 <head>
 <link rel="stylesheet" type="text/css" href="../includes/style.css" media="screen" />
 </head>
 <body>

<?php
 if($_SERVER["REQUEST_METHOD"] == "POST")
 {
 session_start(); //Its better to Start session at the beginning of code

$username = $_POST["username"]; // as the method type in the form is "post" so you gave to use post otherwise it wud be $_GET[]
 $password = $_POST["password"];

$username = stripslashes($username); // To prevent SQL injection
$password = stripslashes($password);
 //$username = mysql_real_escape_string($username);
 //$password = mysql_real_escape_string($password);

//Establishing connection to the database

$conn = mysql_connect('localhost','root','your database password');
mysql_select_db('DatabaseName',$conn) or die("Error in Connection");

if (empty($_POST["username"]) && empty($_POST["password"])) //This is the way to check validations using PHP code but here we are using JS validations so it is not necessary
 {
 echo " Please enter the correct Username and Password ";
 include 'login.php';
 exit();
 }

$query = "select * from profile where username='$username'" or die("can't select"); //Where profile is the table name
$result = mysql_query($query,$conn);

if($result)  // if result is not null
{
     echo "Incorrect Username/Password";
     $row = mysql_fetch_assoc($result) or die(""); //This function return single row at a time
     $uname = $row['username']; // copying the usernames and passwords present in database into temporary variables
     $pwd   = $row['password']

    if ($username==$uname && $password == $pwd) //if username and password entered are exactly as same as present in database, which means this user has already registered so we will direct him to profile page
    {
     //session_start();
     $_SESSION['username']=$username;  //Holding the username value in session variable so that it can be used later within the same session reference

     /* This is the extra line of code if you want to mentain records of logged in users then it would be helpful.
     $q = "UPDATE profile SET loggedin=1 WHERE username='$username' "; // Just to maintain Logged-in Status
     $res = mysql_query($q,$conn);
      */

     header('Location: userProfile.php');  // in success case user will be redirected to profile page
    }
 else
 {
 echo " Incorrect Username or Password <br/><a href=\"krazytech.com/wp-login.php\">Go Back </a><br/>";
 }
}
?>
 </body>
 </html>