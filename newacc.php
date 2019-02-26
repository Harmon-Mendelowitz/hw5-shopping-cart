<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<body>

<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pword = $_POST['password'];

$servername = "localhost";
$username = "mendelowitz";
$password = "HmanHman8$";
$dbname = "mendelowitz";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
}

$query = "insert into users(fname,lname,username,password) values ('$fname','$lanme','$uname','$pword')";

$result = mysqli_query($conn,$query);
if($result){
	$_SESSION["newaccount"] = "New account created successfully";
}
else{
	$_SESSION["newaccount"] = "There was an error creating this account";
}
$_SESSION["loginerror"] = null;
mysqli_close($conn);
header("Location: http://gwupyterhub.seas.gwu.edu/~mendelowitz/hw5-HarmonMendelowitz/front.php");
?>

</body>
</html>

